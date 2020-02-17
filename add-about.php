<?php $dashboard = true; $title = "about"; $sub_title= "add-about"; $script=true; ?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//Check if the user clicks on the submit button
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if (preg_match ('/^[A-Z0-9 \'.-]{2,60}$/i', $_POST['name'])) {
		$data['name'] = $_POST['name'];
	} else {
		$errors[] = 'Please enter a valid name!';
	}
	
	$data['content'] = $_POST['editText'];
	$data['priority'] = $_POST['priority'];
	
	if (empty($errors)) { // If everything's OK...

    // Check if the about name is in the database
	$query = "SELECT name FROM about WHERE name='".$db->escape_data($data['name'])."'";
	$rows = $db->total_affected_rows($query);

	if ($rows == 0) { // No problems! The about name is not in the database
			
	$value = $db->insert_query("about",$data);
	
	if ($value >= 1) { // If it ran OK.
		redirect('dashboard_about.php?action=add');	
	} else { // If it did not run OK.
		trigger_error('You could not be registered due to a system error. We apologize for any inconvenience.');
	}
	
	} else { // The document name is already in the database			
			$errors[] = 'The name you gave is already in the database';						
		
	} // End of $rows == 0 IF.

} // End of empty($errors) IF.

}
?>
<?php include('includes/header.inc.php'); ?>      
     </div>
     <!--End of Top Container-->
     
     <section>
     	<div id="dashboard"  class="container">
            <div id="content" class="row">
                <?php include('includes/breadcrumb.inc.php'); ?>
                <div class="maincontent">
                    <div id="tab-one">
               			 <?php include('includes/dash-nav.inc.php'); ?>
                      <div class="list-wrap">
                          <h2>About Us</h2>
                          <form method="post" id="custom" enctype="multipart/form-data">                         
							  	 <?php 
										createFormInput('Name','name','text');
								 ?>
                                 <label>Priority</label><select name="priority">
                                 	<?php for($i=1; $i<=10; $i++) { ?>
                                 	<option value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php } ?>
                                 </select>
								<?php	createFormInput('Description','editText','textarea'); ?>
                              <div>
                                    <input type="submit" class="btn" value="Add Content">
								</div>
                              <div class="clearfix"></div>
                                
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
