<?php $dashboard = true; $title = "dashboard_category"; $sub_title="all_category"; ?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


//Fetch All rows to view the recent content
$query = "SELECT COUNT(category_id) as total_product , c.id, c.name
          FROM category c
          INNER JOIN catproduct ON c.id = category_id
          GROUP BY category_id ORDER BY name";
$rows = $db->fetch_all_row($query);
$tbody = "";
$count = 0;
foreach ($rows as $row){
	$count++;
	$tbody .= "<tr><td";
	if ($count == 4) $tbody .= " class='last'";
	$tbody .= ">$count</td><td>".$row['name']."</td><td>".$row['total_product']."</td><td><a href='edit-category.php?s={$row['id']}'>Edit</a></td></tr>";
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
                          <h2>All Categories</h2>
                            <table>
                            	<tbody>
                                <tr>
                                  <th class="first-row" style="width :10%">S/N</th>
                                  <th class="first-row" style="width :50%">Name</th>
                                  <th class="first-row" style="width :30%">Total Products</th>
                                  <th class="last first-row" style="width :10%">Edit</th>
                                  
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
