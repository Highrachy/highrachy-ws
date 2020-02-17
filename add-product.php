<?php $dashboard = true; $title = "dashboard_product"; $sub_title = "add_product"; ?>
<?php 
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//Check if the user clicks on the submit button
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	include('includes/add-product.inc.php');
} 

//Get all the products category
//Get a list of all the products in the database.
  $query = "SELECT id, name FROM category ORDER BY name";
  $categories = $db->fetch_all_row($query);

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
                          <h2>Add Product</h2>
                          <form method="post" id="custom" enctype="multipart/form-data"> 
									<?php 
										createFormInput('Product Name','name','text');
										createFormInput('Price','price','text');
									 ?>
                                     
                                     <label for="product_pics">Select Picture</label><input type="file" name="product_pics">
                                     <div class="clearfix"></div>
                                      <h5>Select suitable category for product</h5>
                                     <?php foreach ($categories as $category) { ?>
                                        <label><input type="checkbox" name="category[]" value="<?php echo $category['id'] ?>"> <?php echo $category['name'] ?></label>
                                    <?php } ?>
				      <br clear="all">		
                                     <div class="align-right pad30">
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
