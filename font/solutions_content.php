<?php $dashboard = true; $title = "dashboard_content"; $sub_title= "dashboard_solutions"; $sub_title2="solutions_content"; ?>
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


if (isset($_GET['s']))
	$id = $_GET['s'];
else redirect("dashboard_solutions.php");



$query = "SELECT solutions.name as e_name FROM solutions WHERE solutions.id =$id";
$rows = $db->fetch_all_row($query);
$e_name = $i_name = "";
if ($db->total_affected_rows() == 1){
	foreach($rows as $row){
	$page_name =$row['e_name'];
	}
}
else redirect("dashboard_solutions.php");

//Fetch All rows to view the recent content
$query = "SELECT id, name, content, priority FROM solutions WHERE link=$id ORDER BY priority, name DESC";
$rows = $db->fetch_all_row($query);
$total = $db->total_affected_rows();
$content = "";
$count = 0;


foreach ($rows as $row){
	if ($total == 1)
	$content .= '<h3>'.$row['name'].'</h3><article>'.$row['content'].'<small class="edit"><a href="edit-solutions-content.php?s='.$row['id'].'"><i class="icon-edit"></i> Edit</a> &nbsp;&nbsp; <a href="delete-solutions-content.php?s='.$row['id'].'"><i class="icon-remove-sign"></i> Remove</a></small></article>';
	else {
	$count++;
	$content .= '<div class="span4';
	if ($count % 2 == 1) $content .= ' pad30';
	$content .= '"><h3>'.$row['name'].'</h3><p>'.$row['content'].'<small class="edit"><a href="edit-solutions-content.php?s='.$row['id'].'"><i class="icon-edit"></i> Edit</a> &nbsp;&nbsp; <a href="delete-solutions-content.php?s='.$row['id'].'"><i class="icon-remove-sign"></i> Delete</a></small></p></div>';
	 
	}
                              
}

//Get the Tagline
$query = "SELECT content FROM edit where id='4'";
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
                          <h2><?php echo $page_name ?><small class="edit"><a href="edit-solutions.php?s=<?php echo $id ?>"><i class="icon-edit"></i> &nbsp;Edit</a></small></h2>
                          <div class="lead"><?php echo $tagline ?><small class="edit"><a href="edit-slogan.php?id=4"><i class="icon-edit"></i> &nbsp;Edit</a></small></div><hr>
                          
                          
                          
                          <div <?php if ($total != 1) echo 'class="row"' ?>><?php echo $content ?></div>
                          <hr>
                          <div class="align-right"><a href="add-solutions-content.php?s=<?php echo $id ?>" class="btn">Add New Content </a></div>
                          
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
