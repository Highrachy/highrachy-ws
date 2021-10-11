<?php $dashboard = true; $title = "dashboard_tenants";?>
<?php
include('includes/config.inc.php');
require(DB);
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//Fetch All rows to view the recent content
$query = "SELECT * FROM tenants ORDER BY id DESC";
$rows = $db->fetch_all_row($query);
$tbody = "";
$count = 0;
foreach ($rows as $row){
	$count++;
	$tbody .= "<tr><td";
	if ($count == 4) $tbody .= " class='last'";
	$tbody .= ">$count</td><td>".$row['tenant_full_name']."</td><td>{$row['personal_email']}</td><td>{$row['mobile']}</td><td><a href='dashboard_single_tenant.php?id={$row['id']}'><small>View</small></a></td></tr>";

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
                          <?php alert() ?>
                            <h3>Recent Tenants Applicants</h3>
                            <table>
                            	<tbody>
                                <tr>
                                  <th class="first-row" style="width :10%">S/N</th>
                                  <th class="first-row" style="width :35%">Name</th>
                                  <th class="first-row" style="width :25%">Email</th>
                                  <th class="first-row" style="width :20%">Mobile</th>
                                  <th class="first-row" style="width :10%"></th>

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
