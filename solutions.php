<?php $title = "solutions"; ?>
<?php
include('includes/config.inc.php');
require(DB);
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


if (isset($_GET['page']))
	$id = $_GET['page'];
else {
	//Get the first id from the database
	$query = "SELECT id FROM solutions LIMIT 1";
     $table = $db->fetch_first_row($query);
	 $id = $table['id'];
}




$query = "SELECT solutions.name as page_name,pics,content FROM solutions WHERE solutions.id ='$id' AND link=0";
$rows = $db->fetch_all_row($query);
$page_name = $icons_name = "";
if ($db->total_affected_rows() >= 1){
	foreach($rows as $row){
	$page_name=$row['page_name'];
	$tagline = $row['content'];
	 $pics = $row['pics'];
	}
} else {
	//If the current id cant be found in the database
	$query = "SELECT id,name,pics,content FROM solutions WHERE link=0 LIMIT 1";
     $table = $db->fetch_first_row($query);
	 $id = $table['id'];
	 $page_name= $table['name'];
	 $tagline = $table['content'];
	 $pics = $table['pics'];
}



//Fetch All rows to view the recent content
$query = "SELECT id, name, content FROM solutions  WHERE link=$id  ORDER BY priority DESC,name";
$rows = $db->fetch_all_row($query);
$total = $db->total_affected_rows();
$content = "";
$count = 0;

//This is for the inner content of the page
foreach ($rows as $row){

  $content .= '<h3>'.$row['name'].'</h3><article>'.$row['content'].'</article>';

  
	// if ($total == 1)
	// $content .= '<h3>'.$row['name'].'</h3><article>'.$row['content'].'</article>';
	// else {
	// $count++;
	// $content .= '<div class="col-sm-6';
	// if ($count % 2 == 1) $content .= ' pad30';
	// $content .= '"><h3>'.$row['name'].'</h3><p>'.$row['content'].'</p></div>';

	// }

}

//This is for the side link
$query = "SELECT solutions.id,solutions.name as name,icons.name as icons_name FROM solutions INNER JOIN icons ON solutions.icons_id = icons.id WHERE link = 0 ORDER BY priority DESC,name";
$table = $db->fetch_all_row($query);
$option = "";
$count = 0;
foreach ($table as $row){
	$count++;
	$option .= '<li class="';
	if ($row['id'] == $id) $option .= 'active';
	$option .= '"><a href="solutions.php?page='.$row['id'].'"';
	$option .= '><span><i class="'.str_replace("icon-", "fa fa-", $row['icons_name']).'"></i>&nbsp;'.$row['name'].'</span></a></li>';
}
?>
<?php include('includes/header2.inc.php'); ?>
     </div>
     <!--End of Top Container-->

     <section>
     	<div class="container">
            <div id="content" class="row">
                <?php include('includes/breadcrumb2.inc.php'); ?>
                <div class="clearfix"></div>
                <div class="maincontent">
                    <div id="tab-one">

                      <div class="col-md-3"> <!-- required for floating -->
                          <!-- Nav tabs -->
                          <ul class="nav nav-tabs tabs-left">
                            <li class="side-bar hidden-md hidden-lg"><a href="#"><span><i class="fa fa-list"></i>&nbsp;Side Menu</span></a></li>
                            <?php echo $option ?>
                          </ul>
                      </div>


                      <div class="col-md-9">
                          <!-- Tab panes -->
                          <div class="tab-content">
                           <!-- Enter the page name here -->
                          <h2><?php echo $page_name?></h2>
                            <!-- Tagline is here -->
                            <div class="lead"><?php echo $tagline ?></div>
                             <p>
                            <?php if ($pics != ""): ?>
                            <!--Add the Picture here if it exists-->
                            <img src="img/solutions/<?php echo $pics ?>" alt="Picture of <?php echo $page_name?>">
                           <?php endif; ?>
                           </p>
                            <div class="break"></div>
                            <!--Add the Content of the page here-->
                            <div><?php echo $content ?></div>
                            <div class="clearfix"></div>

                          </div>
                      </div>



                    </div>
                      <!-- END Tab One -->


                </div>
                <!-- End of Main Content -->
            </div>
    	</div>
     </section>

        <?php include('includes/footer2.inc.php'); ?>
    </body>
</html>
