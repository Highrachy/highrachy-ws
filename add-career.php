<?php $dashboard = true; $title = "dashboard_career"; $sub_title= "add-career"; $script=true; ?>
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
	
	$data['priority'] = $_POST['priority'];
	
	if (empty($errors)) { // If everything's OK...

    // Check if the career name is in the database
	$query = "SELECT name FROM career WHERE name='".$db->escape_data($data['name'])."' AND link=0";
	$rows = $db->total_affected_rows($query);

	if ($rows == 0) { // No problems! The career name is not in the database
			
	$value = $db->insert_query("career",$data);
	
	if ($value >= 1) { // If it ran OK.
		redirect('dashboard_career.php?action=add');	
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
                          <h2>Add career</h2>
                          <form method="post" id="custom" enctype="multipart/form-data">                         
							  	 <?php 
										createFormInput('Name','name','text');
								 ?>
                                 <label>Priority</label>
                                 
                                 <select name="priority">
                                 	<?php for($i=1; $i<=10; $i++) { ?>
                                 	<option value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php } ?>
                                 </select>
                              <div class="align-right pad30">
                                    <input type="submit" class="btn" value="Add Page">
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
