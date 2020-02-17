<?php $title = "products"; $script = true; ?>
<?php
include('includes/config.inc.php');
include(DB);
include('functions/database.class.php');
include('functions/createFormInput.php');

$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$query = "SELECT c.name,cp.product_id AS id ,cp.category_id FROM category AS c INNER JOIN catproduct AS cp ON c.id = cp.category_id";
$cats = $db->fetch_all_row($query);
//Fetch All rows to view the recent content
$query = "SELECT id, name, price,product_pics FROM product ORDER BY id DESC";
$rows = $db->fetch_all_row($query);
$product = '<ul  id="portfolio-list" class="row list-unstyled">';
$count = 0; $p_count = 1;
foreach ($rows as $row){
    $class = "";
    foreach($cats as $cat){
        if ($cat['id'] == $row['id']){
            //$class .= " class".$cat['category_id'];
            //$class .= " ".str_replace(" ", "_", str_replace(",", "_", $cat['name']));
            $class .= " ".preg_replace("/[^a-zA-Z]+/", "", $cat['name']);
        }
    }
        $product .= '<li class="col-sm-6 col-xs-12 col-md-4 all'.$class .'"><div class="thumbnail"><img src="img/product/'.$row['product_pics'].'" alt="" class="img-responsive"><h4>'.$row['name'].'</h4><a href="contact.php#contact-us">Order Now &raquo;</a></div></li>';

}

$product .= "</ul>";

$query = "SELECT id,name FROM category ORDER BY name";
$categories = $db->fetch_all_row($query);


//Get the Tagline
$query = "SELECT content FROM edit where id='5'";
$rows = $db->fetch_first_row($query);
$tagline = $rows['content'];



?>
<?php include('includes/header2.inc.php'); ?>
     </div>
     <!--End of Top Container-->

     <section>
     	<div class="container">
            <div id="content" class="row">
                <?php include('includes/breadcrumb2.inc.php'); ?>
                <div id="products" class="maincontent">
                   <h2>Products</h2>
                   <?php echo $tagline ?>
                    <hr>
                    <ul id="portfolio-filter">
                        <li><a href="#"><strong>Category : </strong></a></li>
                        <li><a href="#all" title="" class="current" rel="all">All</a></li>
                        <?php foreach ($categories as $category) { ?>
                        <li><a href="#<?php echo preg_replace("/[^a-zA-Z]+/", "", $category['name']); ?>" title="<?php echo $category['name'] ?>" rel="<?php echo preg_replace("/[^a-zA-Z]+/", "", $category['name']); ?>"><?php echo $category['name'] ?></a></li>
                        <?php } ?>
                    </ul>
                    <hr>
                    <?php echo $product ?>
                </div>
                <!-- End of Main Content -->
            </div>
    	</div>
     </section>
        <?php include('includes/footer2.inc.php'); ?>
    </body>
</html>
