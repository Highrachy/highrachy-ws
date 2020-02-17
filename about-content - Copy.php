<?php $dashboard = true; $title = "dashboard_content"; $sub_title="about_content"; ?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (isset($_GET['action'])){
$action = $_GET['action'];
if ($action == 'add') $success = "Your content has been successfully added";
else if ($action == 'update') $success = "Your content has been successfully updated";
else if ($action == 'delete') $success = "Your content has been successfully deleted";
}


//Fetch All rows to view the recent content
$query = "SELECT id, name, content, priority FROM about ORDER BY priority, name DESC";
$rows = $db->fetch_all_row($query);
$total = $db->total_affected_rows();
$content = "";
$count = 0;


foreach ($rows as $row){
	$count++;
	$content .= '<div><h3>'.$row['name'].'</h3><p>'.$row['content'].'<small class="edit"><a href="edit-home-content.php?s='.$row['id'].'"><i class="icon-edit"></i> Edit</a> &nbsp;&nbsp; <a href="delete-home-content.php?s='.$row['id'].'"><i class="icon-remove-sign"></i> Delete</a></small></p></div>';	
	 
	}
                              

//Get the Tagline
$query = "SELECT content FROM edit where id='2'";
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
                          <h2>About Us</h2>
                          <div class="lead"><?php echo strip_tags($tagline) ?><small class="edit"><a href="edit-slogan.php?id=2"><i class="icon-edit"></i> &nbsp;Edit</a></small></div><hr>
                          
                          
                          
                          <?php echo $content ?>
                          <hr>
                          <div class="align-right"><a href="add-about-content.php" class="btn">Add New Content </a></div>
                          
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
