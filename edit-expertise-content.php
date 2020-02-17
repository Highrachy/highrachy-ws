<?php $dashboard = true; $title = "dashboard_content"; $sub_title= "dashboard_expertise"; $sub_title2="expertise-content"; $sub_title3="edit-expertise-content"; ?>
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
			
			if (empty($_POST['editText'])) {
			$errors[] = "The content of the page cannot be empty";
			} else {
				$data['content'] = $_POST['editText'];
			}
	
			
			$data['priority'] = $_POST['priority'];
			$data['modified'] = "NOW()";
	
			
			if (empty($errors)) { // If everything's OK...
		
			$value = $db->update_query("expertise",$data,"id=$id");
			
			if ($value >= 1) { // If it ran OK.
			
			//Get the parent page
			$query = "SELECT link FROM expertise WHERE id = '$id'";
			$table = $db->fetch_first_row($query);
			$link_id = $table['link'];
		
				redirect('expertise_content.php?s='.$link_id.'&action=update');	
			} else { // If it did not run OK.
				trigger_error('You could not be registered due to a system error. We apologize for any inconvenience.');
			}
			
		
		} // End of empty($errors) IF.

			
			}
		
		//Display information to the user.
		$query = "SELECT name,content as editText,content, priority FROM expertise WHERE expertise.id = '$id'";
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
			$content = $table['content'];
			$priority = $table['priority'];
			
		}
	}
}

if (!$showInfo) {
	//Get a list of all the products in the database.
	$query = "SELECT id, name FROM expertise WHERE link <> 0 ORDER BY expertise.name ASC";
	$table = $db->fetch_all_row($query);
	$option = "<option>- Select expertise Content-</option>";
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
                          <h2>Edit Content</h2>
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
                                 
                                <?php createFormInput('Content','editText','textarea') ?>
                                
                                
                              <div>
                                    <input type="submit" class="btn" value="Update Content">
								</div>
                              <div class="clearfix"></div>
                                
                                <?php alert() ?>
                            </fieldset>
                        </form>
                        <?php } else { ?>
                        <h2>Edit expertise Content</h2>                      	
                        <form id="custom" action="" method="get" enctype="multipart/form-data">
                            <label for="s">Select Content</label>
                                 <select name="s">
                                    <?php echo $option ?>
                                </select>
                            
                           <div class="align-right pad30">
                                    <input type="submit" class="btn" value="Edit Content">
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
