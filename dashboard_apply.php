<?php $dashboard = true; $title = "dashboard_Applicants";?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


if (isset($_GET['action'])){
$action = $_GET['action'];
if ($action == 'add') $success = "Your Applicants has been successfully added";
else if ($action == 'update') $success = "Your Applicants has been successfully updated";
else if ($action == 'delete') $success = "Your Applicants has been successfully deleted";
}


//Fetch All rows to view the recent content
$query = "SELECT id, name, phone,email,career,cv FROM applicants ORDER BY id DESC LIMIT 3";
$rows = $db->fetch_all_row($query);
$tbody = "";
$count = 0;
foreach ($rows as $row){
	$count++;
	$tbody .= "<tr><td";
	if ($count == 4) $tbody .= " class='last'";
	$tbody .= ">$count</td><td>".more($row['name'],80)."</td><td>{$row['email']}</td><td>{$row['phone']}</td><td>{$row['cv']}</td><td><a href='view-applicants.php?s={$row['id']}'>View</a></td><td><a href='edit-applicants.php?s={$row['id']}'>Edit</a></td></tr>";
	
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
                          <h2>Applicants</h2>
                          <?php alert() ?>
                          <ul class="thumbnails">
                              <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                  		<a href="new-applicants.php">
                                    	<i class="icon-briefcase"></i>New Applicants</a>
                                  	</div>
                                </div>
                              </li>
                              
                             <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                    	
                                  		<a href="view-applicants.php"><i class="icon-briefcase"></i>View Applicants</a>
                                  	</div>
                                </div>
                              </li>
                              
                              <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                    	
                                  		<a href="hire-applicants.php"><i class="icon-briefcase"></i>Hire Applicants</a>
                                  	</div>
                                </div>
                              </li>
                              
                              <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                    	
                                  		<a href="delete-applicants.php"><i class="icon-briefcase"></i>Delete Applicants</a>
                                  	</div>
                                </div>
                              </li>
                              
                            </ul>
                            <h3>Recently Added Applicantss</h3>
                            <table>
                            	<tbody>
                                <tr>
                                  <th class="first-row" style="width :10%">S/N</th>
                                  <th class="first-row" style="width :30%">Name</th>
                                  <th class="first-row" style="width :20%">Email</th>
                                  <th class="first-row" style="width :10%">Phone</th>
                                  <th class="first-row" style="width :10%">CV</th>
                                  <th class="first-row" style="width :10%">View</th>
                                  <th class="last first-row" style="width :10%">Edit</th>
                                  
                                </tr>
                                <?php echo $tbody ?>
                                </tbody>
                            </table>
                            <p class="align-right"><a href="all_Applicants.php">View All Applicantss</a></p>
                     
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
