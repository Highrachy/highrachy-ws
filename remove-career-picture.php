<?php $dashboard = true; $title = "dashboard_content"; $sub_title= "dashboard_career"; $sub_title2="career_content"; $sub_title3="remove-career-picture"; ?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


$showInfo = false;
//Check if the home id is set
if (isset($_GET['s'])){
	$showInfo = true;
	$id = $_GET['s'];
	
	//If the home id is set but it is not defined
	if ($id == ""){
		redirect("dashboard_career.php");
	}  else {
		
		//Check if the user has posted the result
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			if (isset($_POST['Delete'])){
				$id = $_POST['Delete'];
				$query = "SELECT pics FROM career WHERE id = '$id'";
				$rows = $db->fetch_first_row($query);
				$total_rows = $db->total_affected_rows();
				
				if ($total_rows == 1) { // No problems! You can delete, file exist;
					//To Delete 
					$picture = $rows['pics'];
					$data['pics'] = "NULL";
					$result = $db->update_query("career",$data,"id=$id");
					if ($result == 1) { // If it ran OK.
						
						unlink('img/career/'.$picture);
						redirect('career_content.php?pics=remove&s='.$id);
						exit();
					}
				}
			}
			
		}//End of if post
		
		//Display information to the user.
		$query = "SELECT name,pics FROM career WHERE id = '$id'";
		$table = $db->fetch_first_row($query);
		$total_rows = $db->total_affected_rows();
		$name = $table['name'];
		$pics = $table['pics'];
		
		//Construct the warning 
		$warning = "Are you sure you want to remove this picture ($name)";
		
		
		//Check if the total_rows is less than 1
		if ($total_rows < 1) {
		redirect("dashboard_career.php");
		}
	}
} else {
		redirect("dashboard_career.php");
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
                          <h2>Delete Page Picture</h2> 
                          <form method="post">
                                <input type="hidden" name="Delete" value="<?php echo $id ?>">
                                <img src="img/career/<?php echo $pics ?>"><br><br>
                                  <?php alert() ?> 
                                  <div class="align-right">
                                    <input type="submit" class="btn" value="Yes">
                              		<a href="career_content.php?s=<?php echo $id ?>" class="btn">No</a>
                                  </div>
                              <div class="clearfix"></div>
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
    </body>
</html>
