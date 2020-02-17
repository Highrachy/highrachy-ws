<?php $dashboard = true; $title = "change_password"; ?>
<?php 
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//Check if the user clicks on the submit button
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
// Check for a password and match against the confirmed password:

if (strlen($_POST['current_password']) >= 6)  {
	$current_password =  $_POST['current_password'];
} else {
	$errors[] = "Your current password must be more than 6 characters";
}
if (strlen($_POST['new_password']) >= 6)  {
	if ($_POST['new_password'] == $_POST['retype_password']) {
		$new_password = $_POST['new_password'];
	} else {
	$errors[] = "The new password does not match";
	}
} else {
	$errors[] = 'Your new password must be atleast 6 characters';
}

$admin_id = $_SESSION['admin_id'];

if (empty($errors)) { // If everything's OK...
	// Make sure the password given is correct
	$query = "SELECT email FROM admin WHERE password = '".md5($current_password)."' AND admin_id = '$admin_id'";
	$rows =$db->total_affected_rows($query);
	
	if ($rows == 1) { // No problem, the password match a row
	
		$data['password'] = md5($new_password);
		$data['modified'] = "NOW()";
		
		//Used to update
		$value = $db->update_query("admin",$data,"admin_id=$admin_id");
		
		if ($value >= 1) { // If it ran OK.
					redirect('dashboard.php?action=change');		
		} else { 
			$errors[] = 'The page could not be updated now, Please try again later';
		}
	} else { // The password is not matching
				
			$errors[] = 'You have entered an invalid current Password';	
	} // End of $rows == 0 IF.
	
} // End of empty($errors) IF.

} 
?>	

<?php include('includes/header.inc.php'); ?>      
     </div>
     <!--End of Top Container-->
     
     <section>
     	<div class="container">
            <div id="content" class="row">
                <?php include('includes/breadcrumb.inc.php'); ?>
                <div class="maincontent">
                    <div id="tab-one">
               			 <?php include('includes/dash-nav.inc.php'); ?>
                      <div class="list-wrap">
                          <h2>Change Password</h2>
                          <form id="custom" method="post">                            
							  	<?php 
														createFormInput('Current Password','current_password','password');
														createFormInput('New Password','new_password','password');
														createFormInput('Retype Password','retype_password','password');
								  ?>

									<div class="pull-right pad30">
									<input type="submit" class="btn" value="Change Password">
									</div>
                                <?php alert() ?>
                            </fieldset>
                        </form>
                        
                        
                      </div>
                      <!-- END List Wrap -->
                      <div class="list-wrap-bottom"></div>
                    </div>
                      <!-- END Tab One -->
                </div>
                <!-- End of Main Content -->
            </div>
    	</div>
     </section>
    
        <?php include('includes/footer.inc.php'); ?>

		<?php include('includes/tinymce.inc.php'); ?>
    </body>
</html>
