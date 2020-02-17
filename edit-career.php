<?php $dashboard = true; $title = "dashboard_content"; $sub_title= "dashboard_career"; $sub_title2="edit-career"; ?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


$showInfo = false;
//Check if the services id is set
if (isset($_GET['s'])){
	$showInfo = true;
	$id = $_GET['s'];
	
	//If the services id is set but it is not defined
	if ($id == ""){
		$errors[] = "Please select the page you wish to edit";
		$showInfo = false;
	}  else {
		//The product id is defined
		
		//Check if the user has posted the result
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			if (preg_match ('/^[A-Z0-9 \'.-]{2,60}$/i', $_POST['name'])) {
				$data['name'] = $_POST['name'];
			} else {
				$errors[] = 'Please enter a valid name!';
			}
			
			$data['priority'] = $_POST['priority'];
			$data['modified'] = "NOW()";
	
			
			if (empty($errors)) { // If everything's OK...
		
			// Check if the document name is in the database
			$query = "SELECT name FROM career WHERE name='".$db->escape_data($data['name'])."' AND id <> '$id'  AND link=0";
			$rows = $db->total_affected_rows($query);
		
			if ($rows == 0) { // No problems! The services name is not in the database
					
			$value = $db->update_query("career",$data,"id=$id");
			
			if ($value >= 1) { // If it ran OK.
				redirect('dashboard_career.php?action=update');	
			} else { // If it did not run OK.
				trigger_error('You could not be registered due to a system error. We apologize for any inconvenience.');
			}
			
			} else { // The document name is already in the database			
					$errors[] = 'The page name you gave is already in the database';						
				
			} // End of $rows == 0 IF.
		
		} // End of empty($errors) IF.

			
			}
		
		//Display information to the user.
		$query = "SELECT career.name as name, icons_id,priority,icons.name as i_name FROM career INNER JOIN icons ON career.icons_id = icons.id WHERE career.id = '$id'";
		$table = $db->fetch_first_row($query);
		$total_rows = $db->total_affected_rows();
		
		//Check if the total_rows is less than 1
		if ($total_rows < 1) {
			$errors[] = "The selected page is not in the database";
			$showInfo = false;
		} else {
			
			//If What the user has posted is empty, assign result to the $_POST global variable
			if (empty($_POST))
			$_POST = $table;
			
			//Get All the information from the database.
			$name = $table['name'];
			$i_name = $table['i_name'];
			$icons_id = $table['icons_id'];
			$priority = $table['priority'];
						
			
		}
	}
}

//The id is not defined, force user to select the services image
if (!$showInfo) {
	//Get a list of all the products in the database.
	$query = "SELECT id, name FROM career WHERE link = 0 ORDER BY career.name ASC";
	$table = $db->fetch_all_row($query);
	$option = "<option>- Select career Page-</option>";
	foreach ($table as $row){
		$option .= "<option value='".$row['id']."'>".$row['name']."</option>";
	}

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
            			  <?php if ($showInfo) { ?> 
                          <h2>Edit <?php echo $name ?></h2> 
                          <form method="post" id="custom" enctype="multipart/form-data">                         
							  	 <?php 
										createFormInput('Name','name','text');
								 ?>
                                 <label>Priority</label>
                                 
                                 <select name="priority">
                                 	<?php for($i=1; $i<=10; $i++) { ?>
                                 	<option value="<?php echo $i ?>" <?php if ($priority == $i) echo " selected" ?>><?php echo $i ?></option>
                                    <?php } ?>
                                 </select>
                              <div class="align-right pad30">
                                    <input type="submit" class="btn" value="Update Page">
								</div>
                              <div class="clearfix"></div>
                                
                                <?php alert() ?>
                            </fieldset>
                        </form>
                        <?php } else { ?>
                        <h2>Edit career Page</h2>                      	
                        <form id="custom" action="" method="get" enctype="multipart/form-data">
                            <label for="s">Select Page</label>
                                 <select name="s">
                                    <?php echo $option ?>
                                </select>
                            
                           <div class="align-right pad30">
                                    <input type="submit" class="btn" value="Edit Page">
								</div>
                          <div class="clearfix"></div>
                        
                        </form>
                    <?php  alert(); } ?>
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
