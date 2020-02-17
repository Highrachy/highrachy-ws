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
										createFormInput('Product Name','name','text');
										createFormInput('Price','price','text');
									 ?>
                                     
                                     <label for="slideshow_pics">Select Picture</label><input type="file" name="slideshow_pics">
                                     <div></div>
                                     <div>
									<input type="submit" class="btn" value="Add Product">
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
