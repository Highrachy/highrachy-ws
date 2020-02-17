<?php $dashboard = true; $title = "dashboard_slideshow";?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (isset($_GET['action'])){
$action = $_GET['action'];
if ($action == 'add') $success = "Your slideshow has been successfully added";
else if ($action == 'update') $success = "Your slideshow has been successfully updated";
else if ($action == 'delete') $success = "Your slideshow has been successfully deleted";
}



//Fetch All rows to view the recent content
$query = "SELECT slideshow_id, name, description,show_home FROM slideshow ORDER BY slideshow_id DESC LIMIT 3";
$rows = $db->fetch_all_row($query);
$tbody = "";
$count = 0;
foreach ($rows as $row){
	$count++;
	$tbody .= "<tr><td";
	if ($count == 4) $tbody .= " class='last'";
	$tbody .= ">$count</td><td>".$row['name']."</td><td>".more($row['description'],50)."</td><td>{$row['show_home']}</td><td><a href='view-slideshow.php?s={$row['slideshow_id']}'>View</a></td><td><a href='edit-slideshow.php?s={$row['slideshow_id']}'>Edit</a></td></tr>";
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
                          <h2>Slideshow</h2>
                      		<?php alert() ?>
                          <ul class="thumbnails">
                              <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                  		<a href="add-slideshow.php">
                                    	<i class="icon-picture"></i>Add Slideshow</a>
                                  	</div>
                                </div>
                              </li>
                              
                             <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                    	
                                  		<a href="edit-slideshow.php"><i class="icon-picture"></i>Edit Slideshow</a>
                                  	</div>
                                </div>
                              </li>
                              
                              <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                    	
                                  		<a href="view-slideshow.php"><i class="icon-picture"></i>View Slideshow</a>
                                  	</div>
                                </div>
                              </li>
                              
                              <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                    	
                                  		<a href="delete-slideshow.php"><i class="icon-picture"></i>Delete Slideshow</a>
                                  	</div>
                                </div>
                              </li>
                              
                            </ul>
                            <h3>Recently Added Slideshow</h3>
                            <table>
                            	<tbody>
                                <tr>
                                  <th class="first-row" style="width :10%">S/N</th>
                                  <th class="first-row" style="width :20%">Image</th>
                                  <th class="first-row" style="width :40%">Description</th>
                                  <th class="first-row" style="width :10%">Show</th>
                                  <th class="first-row" style="width :10%">View</th>
                                  <th class="last first-row" style="width :10%">Edit</th>
                                  
                                </tr>
                                <?php echo $tbody ?>
                                </tbody>
                            </table>
                            <p class="align-right"><a href="all_slideshow.php">View All Slideshows</a></p>
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
