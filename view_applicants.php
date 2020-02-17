<?php $dashboard = true; $title = "dashboard_applicants";?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


if (isset($_GET['s']))
	$id = $_GET['s'];
else {
	//Get the first id from the database
	$query = "SELECT id FROM career LIMIT 1";
     $table = $db->fetch_first_row($query);
	 $id = $table['id'];
}


//Fetch All rows to view the recent content
$query = "SELECT applicants.name as applicants_name, phone, email, cv, career.name AS career_name
			FROM applicants
				INNER JOIN career ON career.id = career_id
				WHERE career.id = '$id'
			ORDER BY applicants.id DESC";
$rows = $db->fetch_all_row($query);
$tbody = "";
$count = 0;
$name = "";

//This is just a safety precaution in case of wrong id
if ($db->total_affected_rows() < 1){
	$tbody .= "<tr><td colspan='6'> You have no applicant for this job</td></tr>";
} else {
	foreach ($rows as $row){
		$count++;
		$name = $row['career_name'];
		$tbody .= "<tr><td";
		if ($count == 4) $tbody .= " class='last'";
		$tbody .= ">$count</td><td>".more($row['applicants_name'],80)."</td><td>{$row['email']}</td><td>{$row['phone']}</td><td><a href='img/cv/{$row['cv']}'><small>Download</small></a></td></tr>";
		
	}
}
$sub_title = $name;
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
                          <h2><?php echo ucfirst($name) ?> Applicants</h2>
                            <table>
                            	<tbody>
                                <tr>
                                  <th class="first-row" style="width :10%">S/N</th>
                                  <th class="first-row" style="width :35%">Name</th>
                                  <th class="first-row" style="width :25%">Email</th>
                                  <th class="first-row" style="width :15%">Phone</th>
                                  <th class="first-row" style="width :15%">CV</th>
                                  
                                </tr>
                                <?php echo $tbody ?>
                                </tbody>
                            </table>
                     
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
