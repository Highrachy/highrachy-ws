<?php $dashboard = true; $title = "dashboard_content"; $sub_title= "dashboard_solutions"; $sub_title2="solutions-content";$sub_title3="delete-solutions-content"; ?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


$showInfo = false;
//Check if the solutions id is set
if (isset($_GET['s'])){
	$showInfo = true;
	$id = $_GET['s'];
	
	//If the solutions id is set but it is not defined
	if ($id == ""){
		$errors[] = "Please select the page you wish to delete";
		$showInfo = false;
	}  else {
		
		//Check if the user has posted the result
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			if (isset($_POST['Delete'])){
				$id = $_POST['Delete'];
				$query = "SELECT link FROM solutions WHERE id = '$id'";
				$rows = $db->fetch_first_row($query);
				$link_id = $rows['link'];
				$total_rows = $db->total_affected_rows();
				
				if ($total_rows == 1) { // No problems! You can delete, file exist;
					//To Delete
					$query = "DELETE FROM solutions WHERE id = '$id' LIMIT 1";
					$result = $db->delete_row($query);
					if ($result == 1) { // If it ran OK.
						redirect('solutions_content.php?s='.$link_id.'&action=delete');
						exit();
					}
				}
			}
			
		}//End of if post
		
		//Display information to the user.
		$query = "SELECT name FROM solutions WHERE solutions.id = '$id'";
		$table = $db->fetch_first_row($query);
		$total_rows = $db->total_affected_rows();
		$name = $table['name'];
		
		//Construct the warning 
		$warning = "Are you sure you want to delete this content ($name)";
		
		
		//Check if the total_rows is less than 1
		if ($total_rows < 1) {
			$errors[] = "The selected content is not in the database";
			$showInfo = false;
		}
	}
}


if (!$showInfo) {
	//Get a list of all the pages in the database.
	$query = "SELECT id, name FROM solutions WHERE link <> 0 ORDER BY solutions.name ASC";
	$table = $db->fetch_all_row($query);
	$option = "<option>- Select solutions Content-</option>";
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
                          <h2>Delete Content</h2> 
                          <form method="post">
                                <input type="hidden" name="Delete" value="<?php echo $id ?>">
                                
                                  <?php alert() ?> 
                                  <div class="align-right">
                                    <input type="submit" class="btn" value="Yes">
                              		<a href="solutions_content.php" class="btn">No</a>
                                  </div>
                              <div class="clearfix"></div>
                            </fieldset>
                        </form>
                        <?php } else { ?>
                        <h2>Delete Content</h2>                      	
                        <form id="custom" action="" method="get" enctype="multipart/form-data">
                            <label for="s">Select Page</label>
                                 <select name="s">
                                    <?php echo $option ?>
                                </select>
                            
                           <div class="align-right pad30">
                                    <input type="submit" class="btn" value="Delete Page">
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
    </body>
</html>
