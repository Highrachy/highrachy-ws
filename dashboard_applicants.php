<?php $dashboard = true; $title = "dashboard_applicants";?>
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
$query = "SELECT career.id
				, career.name as e_name
				FROM career
							WHERE link =0 AND id<> 1";
$rows = $db->fetch_all_row($query);
$content = "";
$count = 0;
foreach ($rows as $row){
	$content .= '<li class="span2"><div class="thumbnail"><div class="content">
                 <a href="view_applicants.php?s='.$row['id'].'"><i class="icon-briefcase"></i>'.$row['e_name'].'</a>
                 </div></div></li>';
}


//Fetch All rows to view the recent content
$query = "SELECT applicants.id, applicants.name as applicants_name, phone, email, cv, career.name AS career_name
			FROM applicants
				INNER JOIN career ON career.id = career_id
			ORDER BY id DESC 
			LIMIT 3";
$rows = $db->fetch_all_row($query);
$tbody = "";
$count = 0;
foreach ($rows as $row){
	$count++;
	$tbody .= "<tr><td";
	if ($count == 4) $tbody .= " class='last'";
	$tbody .= ">$count</td><td>".more($row['applicants_name'],80)."</td><td>{$row['email']}</td><td>{$row['phone']}</td><td>{$row['career_name']}</td><td><a href='img/cv/{$row['cv']}'><small>Download</small></a></td></tr>";
	
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
                              <?php echo $content ?>
                              
                            </ul>
                            <h3>Recent Applicants</h3>
                            <table>
                            	<tbody>
                                <tr>
                                  <th class="first-row" style="width :10%">S/N</th>
                                  <th class="first-row" style="width :30%">Name</th>
                                  <th class="first-row" style="width :20%">Email</th>
                                  <th class="first-row" style="width :15%">Phone</th>
                                  <th class="first-row" style="width :15%">Career</th>
                                  <th class="first-row" style="width :10%">CV</th>
                                  
                                </tr>
                                <?php echo $tbody ?>
                                </tbody>
                            </table>
                            <p class="align-right"><a href="all_Applicants.php">View All Applicants</a></p>
                     
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
