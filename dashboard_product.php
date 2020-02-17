<?php $dashboard = true; $title = "dashboard_product";?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


if (isset($_GET['action'])){
$action = $_GET['action'];
if ($action == 'add') $success = "Your product has been successfully added";
else if ($action == 'update') $success = "Your product has been successfully updated";
else if ($action == 'delete') $success = "Your product has been successfully deleted";
}


//Fetch All rows to view the recent content
$query = "SELECT id, name, price FROM product ORDER BY id DESC LIMIT 3";
$rows = $db->fetch_all_row($query);
$tbody = "";
$count = 0;
foreach ($rows as $row){
	$count++;
	$tbody .= "<tr><td";
	if ($count == 4) $tbody .= " class='last'";
	$tbody .= ">$count</td><td>".more($row['name'],80)."</td><td>{$row['price']}</td><td><a href='view-product.php?s={$row['id']}'>View</a></td><td><a href='edit-product.php?s={$row['id']}'>Edit</a></td></tr>";
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
                          <h2>Product &nbsp; <small class="edit"><a href="edit-slogan.php?id=5"><i class="icon-edit"></i> &nbsp;Edit Slogan</a></small></h2>
                          <?php alert() ?>
                          <ul class="thumbnails">
                              <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                  		<a href="add-product.php">
                                    	<i class="icon-shopping-cart"></i>Add Product</a>
                                  	</div>
                                </div>
                              </li>
                              
                             <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                    	
                                  		<a href="edit-product.php"><i class="icon-shopping-cart"></i>Edit Product</a>
                                  	</div>
                                </div>
                              </li>
                              
                              <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                    	
                                  		<a href="view-product.php"><i class="icon-shopping-cart"></i>View Product</a>
                                  	</div>
                                </div>
                              </li>
                              
                              <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                    	
                                  		<a href="delete-product.php"><i class="icon-shopping-cart"></i>Delete Product</a>
                                  	</div>
                                </div>
                              </li>
                              
                            </ul>
                            <h3>Recently Added Products</h3>
                            <table>
                            	<tbody>
                                <tr>
                                  <th class="first-row" style="width :10%">S/N</th>
                                  <th class="first-row" style="width :50%">Name</th>
                                  <th class="first-row" style="width :20%">Price</th>
                                  <th class="first-row" style="width :10%">View</th>
                                  <th class="last first-row" style="width :10%">Edit</th>
                                  
                                </tr>
                                <?php echo $tbody ?>
                                </tbody>
                            </table>
                            <p class="align-right"><a href="all_product.php">View All Products</a></p>
                     
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
