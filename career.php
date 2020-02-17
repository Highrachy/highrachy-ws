<?php $title = "career"; ?>
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
	$query = "SELECT id FROM career LIMIT 1";
     $table = $db->fetch_first_row($query);
	 $id = $table['id'];
}




$query = "SELECT career.name as page_name,pics,content FROM career WHERE career.id ='$id' AND link=0";
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
	$query = "SELECT id,name,pics,content FROM career WHERE link=0 LIMIT 1";
     $table = $db->fetch_first_row($query);
	 $id = $table['id'];
	 $page_name= $table['name'];
	 $tagline = $table['content'];
	 $pics = $table['pics'];
}



//Fetch All rows to view the recent content
$query = "SELECT id, name, content FROM career  WHERE link=$id  ORDER BY priority DESC,name";
$rows = $db->fetch_all_row($query);
$total = $db->total_affected_rows();
$content = "";
$count = 0;

//This is for the inner content of the page
foreach ($rows as $row){
	if ($total == 1)
	$content .= '<h3>'.$row['name'].'</h3><article>'.$row['content'].'</article>';
	else {
	$count++;
	$content .= '<div class="span4';
	if ($count % 2 == 1) $content .= ' pad30';
	$content .= '"><h3>'.$row['name'].'</h3><p>'.$row['content'].'</p></div>';
	 
	}
                              
}

//Fetch All rows to all the avaialable career
$career = "<ul>";
$query = "SELECT id, name FROM career  WHERE link=0 AND id <> 1  ORDER BY priority DESC,name";
$rows = $db->fetch_all_row($query);
foreach ($rows as $row){
	$career .= '<li><a class="career" href="applicants.php?page='.$row['id'].'">'.$row['name'].'</a></li>';
}
$career .="</ul>";
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
                        <li class="nav-li"><a href="career.php" class="current"><i class="icon-briefcase"></i>&nbsp;Careers</a></li>
                        <li class="nav-li"><a href="search.php"><i class="icon-search"></i>&nbsp;Search</a></li>
                      	<li class="nav-li first"><a href="sitemap.php"><i class="icon-tasks"></i>&nbsp;Sitemap</a></li>
                      </ul>
                      <div class="list-wrap">
                      	  <!-- Enter the page name here -->
                          <h2><?php echo $page_name?></h2>
                      	  <!-- Tagline is here -->
                          <p class="lead"><?php echo strip_tags($tagline) ?></p> 
                           <p>
                          <?php if ($pics != ""): ?>
                          <!--Add the Picture here if it exists-->
                          <img src="img/career/<?php echo $pics ?>" alt="Picture of <?php echo $page_name?>">
                         <?php endif; ?>
                         </p>
                          <div class="break"></div>
                          <!--Add the Content of the page here-->
                          <div <?php if ($total != 1) echo 'class="row"' ?>><?php echo $content ?></div>
                          
                          <!-- Add the career -->
                          <?php echo $career ?>
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
