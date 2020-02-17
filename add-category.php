<?php $dashboard = true; $title= "dashboard_category"; $sub_title="add-category"; ?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//Check if the user clicks on the submit button
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if (!empty($_POST['name'])) {
		$data['name'] = $_POST['name'];
	} else {
		$errors[] = 'Please enter a valid name!';
	}

	
	if (empty($errors)) { // If everything's OK...

    // Check if the category name is in the database
  	$query = "SELECT name FROM category WHERE name='".$db->escape_data($data['name'])."' ORDER BY name";
  	$rows = $db->total_affected_rows($query);

  	if ($rows == 0) { // No problems! The category name is not in the database
  			
    	$value = $db->insert_query("category",$data);
    	
    	if ($value >= 1) { // If it ran OK.
        $products = $_POST['product'];
        if (isset($products)){
          $cat['category_id'] = $value;
          foreach ($products as $product){
            $cat['product_id'] = $product;
            $value =$db->insert_query("catproduct",$cat);
          }
        }
    		redirect('dashboard_category.php?action=add');	
    	} else { // If it did not run OK.
    		trigger_error('You could not be registered due to a system error. We apologize for any inconvenience.');
    	}
  	
  	} else { // The document name is already in the database			
  			$errors[] = 'The name you gave is already in the database';						
  		
  	} // End of $rows == 0 IF.

  } // End of empty($errors) IF.
} else {
  //Get a list of all the products in the database.
  $query = "SELECT id, name FROM product ORDER BY name";
  $products = $db->fetch_all_row($query);
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
                          <h2>Add a New Category</h2>
                          <form method="post" id="custom" enctype="multipart/form-data">                         
        							  	 <?php 
        										createFormInput('Name','name','text');
        								    ?>
                             <strong>Select suitable products for this category</strong>                            </p>
                             <?php foreach ($products as $product) { ?>
                                <label style="width:100%"><input type="checkbox" name="product[]" value="<?php echo $product['id'] ?>"> <?php echo $product['name'] ?></label>
                             <?php } ?>
                              <div class="clearfix"></div>
                              <div>
                                    <input type="submit" class="btn" value="Add Category">
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
    </body>
</html>
