<?php $dashboard = true; $title = "dashboard_content"; $sub_title= "dashboard_solutions"; $sub_title2="solutions_content"; $sub_title3="edit-solutions-picture"; ?>
<?php 
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (isset($_GET['s']))
	$id = $_GET['s'];
else redirect("dashboard_solutions.php");

//Check if the user clicks on the submit button
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	include('includes/edit-solutions-picture.inc.php');
} 

//Select the old picture if it exists
$query = "SELECT name,pics FROM solutions WHERE id='$id'";
$rows = $db->fetch_first_row($query);
$old_pics = $rows['pics'];
$name = $rows['name'];


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
                          <form method="post" id="custom" enctype="multipart/form-data"> 
									<?php if ($old_pics == "") {//No image is available ?>
                          			 <h2>Add Picture to <?php echo $name ?></h2>
                                     <label for="pics">Add Picture</label><input type="file" name="pics">
                                    
                                    <div class="clearfix"></div>
                                    <div>
									<input type="submit" class="btn" value="Add Picture">&nbsp;&nbsp;<a href="solutions_content.php?s=<?php echo $id ?>" class="btn"> Back </a>
                                    </div>
                                    <?php } else { ?>
                          			 	<h2>Change <?php echo $name ?>'s Picture</h2>
                          				<img src="img/solutions/<?php echo $old_pics ?>" alt="The Current Picture used on the page">
                                        <label for="pics">Change Picture</label><input type="file" name="pics">
                                        <div class="clearfix"></div>
                                        <div>
                                        <input type="hidden" name="old_pics" value="<?php echo $old_pics ?>">
                                        <input type="submit" class="btn" value="Change Picture">&nbsp;&nbsp;<a href="solutions_content.php?s=<?php echo $id ?>" class="btn"> Back </a>
                                        </div>
                                    <?php } ?>

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
