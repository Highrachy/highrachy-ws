<?php $dashboard = true; $title = "dashboard_content"; $sub_title= "dashboard_expertise"; $sub_title2="add-expertise-content"; ?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


if (isset($_GET['s']))
	$id = $_GET['s'];
else redirect("expertise_content.php");

//Check if the id is truly a parent page.
$query = "SELECT name FROM expertise WHERE id='$id'";
$rows = $db->fetch_all_row($query);
if ($db->total_affected_rows() < 1)
redirect("expertise_content.php");

//Check if the user clicks on the submit button
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if (preg_match ('/^[A-Z0-9 \'.-]{2,60}$/i', $_POST['name'])) {
		$data['name'] = $_POST['name'];
	} else {
		$errors[] = 'Please enter a name!';
	}
	
	if (empty($_POST['editText'])) {
	$errors[] = "The content of the page cannot be empty";
	} else {
		$data['content'] = $_POST['editText'];
	}
	
	$data['priority'] = $_POST['priority'];
	$data['link'] = $id;
	
	if (empty($errors)) { // If everything's OK...

    // Check if the expertise name is in the database
	$query = "SELECT name FROM expertise WHERE name='".$db->escape_data($data['name'])."'";
	$rows = $db->total_affected_rows($query);

	if ($rows == 0) { // No problems! The expertise name is not in the database
			
	$value = $db->insert_query("expertise",$data);
	
	if ($value == 1) { // If it ran OK.
		redirect('expertise_content.php?s='.$id.'&action=add');	
	} else { // If it did not run OK.
		trigger_error('You could not be registered due to a system error. We apologize for any inconvenience.');
	}
	
	} else { // The document name is already in the database			
			$errors[] = 'The name you gave is already in the database';						
		
	} // End of $rows == 0 IF.

} // End of empty($errors) IF.
}
// Retrieve the content from the database
$query = "SELECT id, name from icons ORDER BY  `icons`.`name` ASC";
$rows = $db->fetch_all_row($query);
$option = "";
foreach ($rows as $row){
	$option .= "<option value='{$row['id']}'>{$row['name']}</option>";
}
// Retrieve the name of current page
$query = "SELECT  name from expertise WHERE id = $id";
$rows = $db->fetch_first_row($query);
$name = $rows['name'];
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
                          <h2>Add Content to <?php echo $name ?></h2>
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
                                 
                                <?php createFormInput('Content','editText','textarea') ?>
                                
                                
                              <div>
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
