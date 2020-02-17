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
else if ($action == 'slogan') $success = "Your slogan has been successfully updated";
else if ($action == 'delete') $success = "Your content has been successfully deleted";
}

if (isset($_GET['pics'])){
$action = $_GET['pics'];
if ($action == 'add') $success = "Your Picture has been successfully added";
else if ($action == 'remove') $success = "Your Picture has been successfully removed";
}

if (isset($_GET['s']))
	$id = $_GET['s'];
else redirect("dashboard_solutions.php");



$query = "SELECT solutions.name as e_name,content,pics FROM solutions WHERE solutions.id =$id";
$rows = $db->fetch_all_row($query);
$e_name = $i_name = "";
if ($db->total_affected_rows() == 1){
	foreach($rows as $row){
	$page_name =$row['e_name'];
	$tagline = $row['content'];
	$pics = $row['pics'];
	}
}
else redirect("dashboard_solutions.php");

//Fetch All rows to view the recent content
$query = "SELECT id, name, content, priority FROM solutions WHERE link=$id ORDER BY priority DESC, name DESC";
$rows = $db->fetch_all_row($query);
$total = $db->total_affected_rows();
$content = "";
$count = 0;


foreach ($rows as $row){
	//If the total rows retrieved
	if ($total == 1)
	$content .= '<h3>'.$row['name'].'</h3><article>'.$row['content'].'<small class="edit"><a href="edit-solutions-content.php?s='.$row['id'].'"><i class="icon-edit"></i> Edit</a> &nbsp;&nbsp; <a href="delete-solutions-content.php?s='.$row['id'].'"><i class="icon-remove-sign"></i> Remove</a></small></article>';
	else if ($total >= 2) {
	$count++;
	$content .= '<div class="span4';
	if ($count % 2 == 1) $content .= ' pad30';
	$content .= '"><h3>'.$row['name'].'</h3><p>'.$row['content'].'<small class="edit"><a href="edit-solutions-content.php?s='.$row['id'].'"><i class="icon-edit"></i> Edit</a> &nbsp;&nbsp; <a href="delete-solutions-content.php?s='.$row['id'].'"><i class="icon-remove-sign"></i> Delete</a></small></p></div>';
	 
	}
	else {
	
		
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
                      <!--Add the Error and Success Alert-->
                      	<?php alert() ?>
                      	<!--Add the Page Name here-->
                         <h2><?php echo ucfirst($page_name) ?>
                         
                      	 <!--Add the Edit here-->
                         <small class="edit"><a href="edit-solutions.php?s=<?php echo $id ?>"><i class="icon-edit"></i> &nbsp;Edit Title</a></small></h2>
                          <div class="lead">
                      	 <!--Add the Tagline here-->
						  <?php echo $tagline ?>
                      	 <!--Add the Edit Tagline here-->
                          <small class="edit"><a href="solutions-slogan.php?id=<?php echo $id ?>"><i class="icon-edit"></i> &nbsp;<?php if ($tagline == "") echo "Add Slogan"; else echo "Edit Slogan"; ?></a></small>           
                          </div>
                          
                          <!-- This is the picture column -->
                          <p>
                          <?php if ($pics != ""): ?>
                          <!--Add the Picture here if it exists-->
                          <img src="img/solutions/<?php echo $pics ?>" alt="Picture of <?php echo $e_name ?>">
                          <small class="edit"><a href="edit-solutions-picture.php?s=<?php echo $id ?>"><i class="icon-picture"></i> &nbsp;Change Picture</a>&nbsp; &nbsp; <a href="remove-solutions-picture.php?s=<?php echo $id ?>"><i class="icon-remove-sign"></i> &nbsp;Remove Picture</a></small>
                         <?php endif; ?>
                          
                         <?php if ($pics == ""): ?>
                         <!--If Picture doesnt exist, Add Change Picture-->
                      	 <!--Add the Edit Tagline here-->
                          <small class="edit"><a href="edit-solutions-picture.php?s=<?php echo $id ?>"><i class="icon-picture"></i> &nbsp;Add Picture</a></small>
                         <?php endif; ?>
                          </p>
                          
                          
                          <!--Draw a horizontal line after the tagline-->
                          <hr>
                          
                          
                          
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
