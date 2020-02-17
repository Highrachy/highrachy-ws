<?php $dashboard = true; $title = "add_admin"; ?>
<?php 
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//Check if the user clicks on the submit button
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
// Check for the product name
if (preg_match ('/^[A-Z0-9 \'.-]{2,60}$/i', $_POST['name'])) {
	$data['name'] = $_POST['name'];
} else {
	$errors[] = 'Please enter a name for the admin!';
}

// Validate the email address:
if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	$data['email'] = $_POST['email'];
} else {
	$errors[] = 'Please enter an email address for the admin!';
}

if (strlen($_POST['password']) >= 6)  {
	if ($_POST['password'] == $_POST['retype_password']) {
		$data['password'] = md5($_POST['password']);
	} else {
	$errors[] = "The password does not match";
	}
} else {
	$errors[] = 'Your password must be atleast 6 characters';
}


if (empty($errors)) { // If everything's OK...

    // Check if the document name is in the database
	$query = "SELECT name FROM admin WHERE email='".$db->escape_data($data['email'])."'";
	$rows = $db->total_affected_rows($query);

	if ($rows == 0) { // No problems! The product name is not in the database
				
				$value = $db->insert_query("admin",$data);
				
		
				if ($value == 1) { // If it ran OK.
					redirect('dashboard.php?action=admin');	
				} else { // If it did not run OK.
					trigger_error('You could not be registered due to a system error. We apologize for any inconvenience.');
				}
			
		
		
	} else { // The document name is already in the database			
			$errors[] = 'The email address you gave is already in the database';						
		
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
                          <h2>Add Admin</h2>
                          <form method="post" id="custom" enctype="multipart/form-data"> 
													<?php 
														createFormInput('Name','name','text');
														createFormInput('Email','email','text');
														createFormInput('Password','password','password');
														createFormInput('Retype Password','retype_password','password');
													 ?>
									<div class="pull-right pad30">
									<input type="submit" class="btn" value="Add Admin">
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
