<?php $dashboard = true; $title= "dashboard_category"; $sub_title="edit-category"; ?>
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
		$errors[] = "Please select the category you wish to edit";
		$showInfo = false;
	}  else {
		//The product id is defined
		
		//Check if the user has posted the result
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			if (!empty($_POST['name'])) {
				$data['name'] = $_POST['name'];
			} else {
				$errors[] = 'Please enter a valid name!';
			}

			$data['modified'] = "NOW()";
	
			
			if (empty($errors)) { // If everything's OK...
		
			// Check if the document name is in the database
			$query = "SELECT name FROM category WHERE name='".$db->escape_data($data['name'])."' AND id <> '$id'";
			$rows = $db->total_affected_rows($query);
		
			if ($rows == 0) { // No problems! The services name is not in the database
					
			$value = $db->update_query("category",$data,"id=$id");
			
			if ($value >= 1) { // If it ran OK.

				$products = $_POST['product'];
				$query = "DELETE FROM catproduct WHERE category_id = '$id'";
				$result = $db->delete_row($query);
				if (isset($products)){
					$cat['category_id'] = $id;
					foreach ($products as $product){
						$cat['product_id'] = $product;
						$value =$db->insert_query("catproduct",$cat);
					}
				}
						
				redirect('dashboard_category.php?action=update');	
			} else { // If it did not run OK.
				trigger_error('You could not be registered due to a system error. We apologize for any inconvenience.');
			}
			
			} else { // The document name is already in the database			
					$errors[] = 'The category name you gave is already in the database';						
				
			} // End of $rows == 0 IF.
		
		} // End of empty($errors) IF.

			
			}
		
		//Display information to the user.
		$query = "SELECT category.name as name FROM category WHERE category.id = '$id'";
		$table = $db->fetch_first_row($query);
		$total_rows = $db->total_affected_rows();
		
		//Check if the total_rows is less than 1
		if ($total_rows < 1) {
			$errors[] = "The selected category is not in the database";
			$showInfo = false;
		} else {
			
			//If What the user has posted is empty, assign result to the $_POST global variable
			if (empty($_POST))
			$_POST = $table;
			
			//Get All the information from the database.
			$name = $table['name'];

			//Get all the products category
			  $query = "SELECT p.id, p.name
							FROM product AS p
							INNER JOIN catproduct AS cp ON p.id = cp.product_id
							WHERE cp.category_id =$id
							ORDER BY name";
			  $chosen_products = $db->fetch_all_row($query);

			  $chosen_id = "";
			  foreach ($chosen_products as $prod)
			  	$chosen_id .= $prod['id'].",";
			  $chosen_id = substr($chosen_id,0, -1);
			  if (!empty($chosen_id)){
			  	$chosen_id = "WHERE id NOT IN ($chosen_id)";
			  }

			$query = "SELECT * FROM product $chosen_id";
			$unchosen_products = $db->fetch_all_row($query);
			
			

		}
	}
}

//The id is not defined, force user to select the services image
if (!$showInfo) {
	//Get a list of all the products in the database.
	$query = "SELECT id, name FROM category ORDER BY category.name ASC";
	$table = $db->fetch_all_row($query);
	$option = "<option>- Select category category-</option>";
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
                                 <strong>Select suitable category for product</strong>
				                                     <?php foreach ($chosen_products as $product) { ?>
				                                        <label style="width:100%"><input type="checkbox" name="product[]" value="<?php echo $product['id'] ?>" checked> <?php echo $product['name'] ?></label>
				                                    <?php } ?>
				                                     <?php foreach ($unchosen_products as $product) { ?>
				                                        <label style="width:100%"><input type="checkbox" name="product[]" value="<?php echo $product['id'] ?>"> <?php echo $product['name'] ?></label>
				                                    <?php } ?>
	                                    			<br clear="all">
                              <div>
                                    <input type="submit" class="btn" value="Update Category">
								</div>
                              <div class="clearfix"></div>
                                
                                <?php alert() ?>
                            </fieldset>
                        </form>
                        <?php } else { ?>
                        <h2>Edit category category</h2>                      	
                        <form id="custom" action="" method="get" enctype="multipart/form-data">
                            <label for="s">Select category</label>
                                 <select name="s">
                                    <?php echo $option ?>
                                </select>
                            
                           <div class="align-right pad30">
                                    <input type="submit" class="btn" value="Edit category">
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
