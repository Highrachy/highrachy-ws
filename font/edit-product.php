<?php $dashboard = true; $title = "dashboard_product"; $sub_title = "edit_product"; ?>
<?php 
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$showInfo = false;
//Check if the product id is set
if (isset($_GET['s'])){
	$showInfo = true;
	$product_id = $_GET['s'];
	
	//If the product id is set but it is not defined
	if ($product_id == ""){
		$errors[] = "Please select the product you wish to edit";
		$showInfo = false;
	}  else {
		//The product id is defined
		
		//Check if the user has posted the result
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		include('includes/edit-product.inc.php');
		
		//Display information to the user.
		$query = "SELECT name, price, product_pics FROM product WHERE id = '$product_id'";
		$table = $db->fetch_first_row($query);
		$total_rows = $db->total_affected_rows();
		
		//Check if the total_rows is less than 1
		if ($total_rows < 1) {
			$errors[] = "The selected product is not in the database";
			$showInfo = false;
		} else {
			
			//If What the user has posted is empty, assign result to the $_POST global variable
			if (empty($_POST))
			$_POST = $table;
			
			//Get All the information from the database.
			$name = $table['name'];
			$price = $table['price'];
			$pics = $table['product_pics'];
			
			
			
		}
	}
}

//The product_id is not defined, force user to select the product image
if (!$showInfo) {
	//Get a list of all the products in the database.
	$query = "SELECT id, name FROM product ORDER BY product.name ASC";
	$table = $db->fetch_all_row($query);
	$option = "<option>- Select product-</option>";
	foreach ($table as $row){
		$option .= "<option value='".$row['id']."'>".$row['name']."</option>";
	}

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
                      
                          <h2>Edit Product</h2>
                      	<?php if ($showInfo) { ?>
                          <form method="post" id="custom" enctype="multipart/form-data">   
                                                     
                                                    <label>Product Picture </label><img src="img/product/<?php echo $pics ?>" alt="Picture of <?php echo $name ?>" height="80" width="150">
                                                     <br><br>
                                                    <label for="product_pics">Change Picture</label><input type="file" name="product_pics">
                                                    <div class="clearfix"></div><br>
													<?php
														createFormInput('Image Name','name','text');
														createFormInput('Price','price','text');
													 ?>
                                                      
                                                     <input type="hidden" name="old_picture" value="<?php echo $pics ?>">
                                                    <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
                                     <div class="align-right pad30">
									<input type="submit" class="btn" value="Update Product">
                                    </div>

                                <?php alert() ?>
                            </fieldset>
                        </form>
                                                <?php } else { ?>
                                                	
                                                	<form id="custom" action="" method="get" enctype="multipart/form-data">
                                                        <label for="s">Select Product
                                                        </label>
                                                             <select name="s">
                                                                <?php echo $option ?>
                                                            </select>
                                                        <div class="align-right pad30">
                                                        <input type="submit" class="btn" value="Edit product">
                                                        </div>
                                                      <div class="clearfix"></div>
                                                    
												<?php alert(); ?>
                                                    </form>
                                                <?php } ?>
                        
                        
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
