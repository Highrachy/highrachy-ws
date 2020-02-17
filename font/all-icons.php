<?php $dashboard = true; $title = "all_icons"; ?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//Fetch All rows to view the recent content
$query = "SELECT icons.name FROM icons ORDER BY  `icons`.`name` ASC";
$rows = $db->fetch_all_row($query);
$tbody = "";
$count = 0;
$li = "";
foreach ($rows as $row){
	$li .= "<li><i class={$row['name']}></i> {$row['name']}</li>";
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
                          <h2>All Icons</h2>
                          <ul class="the-icons">
                          	<?php echo $li ?>
                          </ul>
						   
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
