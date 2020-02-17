<?php $title = "sitemap" ?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);



//Get all the pages under the expertise page
$query = "SELECT id,name from expertise where link = 0";
$e_link = "";
$rows = $db->fetch_all_row($query);
if ($db->total_affected_rows() > 0){
	$e_link .= "<ul>";
	foreach ($rows as $row){
		$e_link .= '<li><a href="expertise.php?page='.$row['id'].'">'.$row['name'].'</a></li>';
		$query = "SELECT id,name from expertise where link ={$row['id']}";
		$table = $db->fetch_all_row($query);
		if ($db->total_affected_rows() > 0){
			$e_link .= "<ul>";
			foreach ($table as $sub_row){
				$e_link .= '<li><a href="expertise.php?page='.$sub_row['id'].'">'.$sub_row['name'].'</a></li>';
			}
			$e_link .="</ul>";
		}
	}
	$e_link .="</ul>";
}



//Get all the pages under the solutions page
$query = "SELECT id,name from solutions where link = 0";
$s_link = "";
$rows = $db->fetch_all_row($query);
if ($db->total_affected_rows() > 0){
	$s_link .= "<ul>";
	foreach ($rows as $row){
		$s_link .= '<li><a href="solutions.php?page='.$row['id'].'">'.$row['name'].'</a></li>';
		$query = "SELECT id,name from solutions where link ={$row['id']}";
		$table = $db->fetch_all_row($query);
		if ($db->total_affected_rows() > 0){
			$s_link .= "<ul>";
			foreach ($table as $sub_row){
				$s_link .= '<li><a href="solutions.php?page='.$sub_row['id'].'">'.$sub_row['name'].'</a></li>';
			}
			$s_link .="</ul>";
		}
	}
	$s_link .="</ul>";
}



//Select all the products in the database
$query = "SELECT id,name from product";
$products = "";
$rows = $db->fetch_all_row($query);
if ($db->total_affected_rows() > 0){
	$products .= "<ul>";
	foreach ($rows as $row){
		$products .= '<li><a href="products.php?page='.$row['id'].'">'.$row['name'].'</a></li>';
	}
	$products .="</ul>";
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
                      <ul class="nav unstyled">
                        <li class="nav-li"><a href="career.php"><i class="icon-briefcase"></i>&nbsp;Careers</a></li>
                        <li class="nav-li"><a href="search.php"><i class="icon-search"></i>&nbsp;Search</a></li>
                      	<li class="nav-li first"><a href="sitemap.php" class="current"><i class="icon-tasks"></i>&nbsp;Sitemap</a></li>
                      </ul>
                      <div class="list-wrap">
                          <h2>Sitemap</h2>
                           <div>
						   	<ul class="sitemap">
                            	<li><a href="index.php">Homepage</a></li>
                                <li><a href="about.php">About Us</a></li>
                                <li><a href="expertise.php">Expertise</a></li><?php echo $e_link ?>
                                <li><a href="solutions.php">Solutions</a></li><?php echo $s_link ?>
                                <li><a href="products.php">Products</a></li><?php echo $products ?>
                                <li><a href="contact.php">Contact Us</a></li>
                                <li><a href="career.php">career</a></li>
                                
                            </ul>
                           </div>
                          <div class="clearfix"></div>
                        
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
