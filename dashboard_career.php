<?php $dashboard = true; $title = "dashboard_content"; $sub_title= "dashboard_career";?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (isset($_GET['action'])){
$action = $_GET['action'];
if ($action == 'add') $success = "Your page has been successfully added";
else if ($action == 'update') $success = "Your page has been successfully updated";
else if ($action == 'delete') $success = "Your page has been successfully deleted";
}


//Fetch All rows to view the recent content
$query = "SELECT career.id
				, career.name as e_name
				FROM career
							WHERE link =0";
$rows = $db->fetch_all_row($query);
$content = "";
$count = 0;
foreach ($rows as $row){
	$content .= '<li class="span2"><div class="thumbnail"><div class="content">
                 <a href="career_content.php?s='.$row['id'].'"><i class="icon-briefcase"></i>'.$row['e_name'].'</a>
                 </div></div></li>';
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
                          <h2>Careers</h2>
                          <?php alert() ?>
                          <ul class="thumbnails">
                          <?php echo $content ?>
                              
                              <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                  		<a href="add-career.php"><i class="icon-plus-sign"></i>Add New Page</a>
                                  	</div>
                                </div>
                              </li>
                              
                             <li class="span2">
                                <div class="thumbnail">
                                	<div class="content">
                                  		<a href="delete-career.php"><i class="icon-remove-sign"></i>Delete Page</a>
                                  	</div>
                                </div>
                              </li>
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
