<?php $dashboard = true; $title = "dashboard_content"; $sub_title="home_content"; ?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (isset($_GET['action'])){
$action = $_GET['action'];
if ($action == 'add') $success = "Your picture has been successfully added";
else if ($action == 'update') $success = "Your picture has been successfully updated";
else if ($action == 'delete') $success = "Your picture has been successfully deleted";
}


//Fetch All rows to view the recent content
$query = "SELECT home.id, pics, home.link, name FROM home INNER JOIN expertise ON home.link = expertise.id";
$rows = $db->fetch_all_row($query);
$total = $db->total_affected_rows();
$content = "";
$count = 0;


foreach ($rows as $row){
	$count++;
	$content .= '<div class="span4"><img src="img/expertise/'.$row['pics'].'" width="267" height="173" /><h4>'.$row['name'].'</h4><small class="edit"><a href="edit-home-content.php?s='.$row['link'].'"><i class="icon-edit"></i> Edit</a> &nbsp;&nbsp; <a href="delete-home-content.php?s='.$row['link'].'"><i class="icon-remove-sign"></i> Delete</a></small><p>&nbsp;</p></div>';
	}
                              

//Get the Tagline
$query = "SELECT content FROM edit where id='1'";
$rows = $db->fetch_first_row($query);
$tagline = $rows['content'];
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
                      	  <?php alert() ?>
                          <h2>The Solutions Expert </h2>
                          <div class="lead"><?php echo $tagline ?><small class="edit"><a href="edit-slogan.php?id=1"><i class="icon-edit"></i> &nbsp;Edit</a></small></div><hr>
                          
                          <h2>Our Expertise</h2>
                          <div class="row">
                          <?php echo $content ?>
                          </div><div class="clearfix"></div>
                          <hr>
                          <div class="align-right"><a href="add-home.php" class="btn">Add New Picture </a></div>
                          
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
