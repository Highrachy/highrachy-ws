<?php $dashboard = true; $title = "dashboard_slideshow"; $sub_title = "add_slideshow"; ?>
<?php 
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//Check if the user clicks on the submit button
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	include('includes/add-slideshow.inc.php');
} 

$link_option = "";
// Retrieve the content from the database
$query = "SELECT id, name from expertise WHERE link=0 ORDER BY  `expertise`.`name` ASC";
$rows = $db->fetch_all_row($query);
foreach ($rows as $row){
	$link_option .= "<option value='expertise.php?page={$row['id']}'>{$row['name']}</option>";
}
$query = "SELECT id, name from solutions WHERE link=0 ORDER BY  `solutions`.`name` ASC";
$rows = $db->fetch_all_row($query);
foreach ($rows as $row){
	
	$link_option .= "<option value='solutions.php?page={$row['id']}'>{$row['name']}</option>";
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
                          <h2>Add Slideshow</h2>
                          <form method="post" id="custom" enctype="multipart/form-data"> 
									<?php
										createFormInput('Name','name','text');
										createFormInput('Link Text','link_text','text');
									 ?>
									  <label>Link Page</label>
										<select name="link_page">
										  <?php echo $link_option ?>
										</select>
										<label>Show on HomePage</label>
										<select name="show_home">
											<option value="YES">YES</option>
											<option value="NO">NO</option></select>
										<?php 
										createFormInput('Description','description','textarea'); ?>
					 
                                    	<div><br></div>
                                     <label for="slideshow_pics">Select Picture</label><input type="file" name="slideshow_pics">
                                    
                                    <div class="clearfix"></div>
                                    <div>
									<input type="submit" class="btn" value="Add Slideshow">
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
