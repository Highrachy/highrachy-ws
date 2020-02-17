<?php $dashboard = true; $title = "dashboard_team"; $sub = "" ?>
<?php 
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (isset($_GET['action'])){
$action = $_GET['action'];
if ($action == 'add') $success = "Your Executive Member has been successfully added";
else if ($action == 'update') $success = "Your Executive Member has been successfully updated";
else if ($action == 'delete') $success = "Your Executive Member has been successfully deleted";
}
//Fetch All rows
$query = "SELECT team_id, name, post FROM team ORDER BY team_id DESC LIMIT 3";
$rows = $db->fetch_all_row($query);
$tbody = "";
$count = 0;
foreach ($rows as $row){
	$count++;$post = "Associate";
	if ($row['post'] == 1) $post = "Managing Partner";
	if ($count % 2==0)$tbody .= "<tr class='odd'>"; else $tbody .= "<tr>";
	$tbody .= "<td>$count</td><td>{$row['name']}</td><td>$post</td><td><a href='view-team.php?t={$row['team_id']}'>View</a></td><td><a href='edit-team.php?t={$row['team_id']}'>Edit</a></td></tr>";
	}
?>
<?php include('includes/header.inc.php'); ?>
</div>

<div class="container">
<!-- middle -->
<div id="middle" class="cols2 sidebar_left">
	<div class="top_content">
<p>We are committed to helping our clients succeed</p>  
</div>
    <div class="content" role="main">
    
    	<team class="post-item post-detail">
        	        
        	<h1>Our Team</h1>          
			<?php alert() ?>
            
			<div class="entry">
                
            	<div class="row">
                    <div class="col col_1_4  alpha">
                        <div class="inner dashboard_item">
                        	<a href="add-team.php">
      						<i class="icon-user"></i>
                             Add Team
                             </a>
                        </div>
                    </div>
                    
                    <div class="col col_1_4 ">
                        <div class="inner dashboard_item">
                        	<a href="edit-team.php">
                                <i class="icon-user"></i> 
                                Edit Team
                            </a>
                        </div>
                    </div>
                    
                    <div class="col col_1_4 ">
                        <div class="inner dashboard_item">
                        	<a href="view-team.php">
                                <i class="icon-user"></i> 
                                View Team
                            </a>
                        </div>
                    </div>
                    
                    <div class="col col_1_4  omega">
                        <div class="inner dashboard_item">
                        	<a href="delete-team.php">
                                <i class="icon-user"></i> 
                                Delete Team
                            </a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="separator"><br></div>
                <div class="styled_table table_dark">
                <h2>Recently Added team</h2>
                    <table>
                        <thead>
                            <tr>
                                <th style="width:10%">S/N</th>
                                <th style="width:35%">Name</th>
                                <th style="width:35%">Post</th>
                                <th style="width:10%">View</th>
                                <th style="width:10%">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php echo $tbody ?>
                        </tbody>
                    </table>
                     <div class="alignright"><a href="all-team.php"> View All Team &raquo;</a></div>
                    
                    </div>
                    
                    
                  
               
            	<div class="clear"></div>
            </div>
		</team>            
            
		</div>

    <!--/ content -->
    
    <!-- sidebar -->
    <div class="sidebar">
    	
        <!-- widget_text -->
        <div class="widget-container widget_text">
            <div class="textwidget">
            	
            </div>
		</div>
        <!--/ widget_text -->
        
        <!-- widget_nav_menu, style2 -->
        <div class="widget-container widget_nav_menu nav_style2">
        	<?php include('includes/dash_nav.inc.php'); ?> 
		</div>
        <!--/ widget_nav_menu, style2  -->
        
                
    </div> 
    <!--/ sidebar -->
           
    <div class="clear"></div>	    
</div>
<!--/ middle --> 
</div>

<?php include('includes/footer.inc.php'); ?>