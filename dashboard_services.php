<?php $dashboard = true; $title = "dashboard_services"; $sub="" ?>
<?php 
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (isset($_GET['action'])){
$action = $_GET['action'];
if ($action == 'add') $success = "Your services has been successfully added";
else if ($action == 'update') $success = "Your services has been successfully updated";
else if ($action == 'delete') $success = "Your services has been successfully deleted";
}
//Fetch All rows
$query = "SELECT id, name, content, priority FROM services ORDER BY id DESC LIMIT 3";
$rows = $db->fetch_all_row($query);
$tbody = "";
$count = 0;
foreach ($rows as $row){
	$count++;
	if ($count % 2==0)$tbody .= "<tr class='odd'>"; else $tbody .= "<tr>";
	$tbody .= "<td>$count</td><td>".more($row['name'],50)."</td><td>{$row['priority']}</td><td><a href='edit-services.php?s={$row['id']}'>Edit</a></td></tr>";
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
    
    	<services class="post-item post-detail">
        	        
        	<h1>Services</h1>          
			
            
			<div class="entry">
             <?php alert() ?>  
             <div class="row">
                    <div class="col col_1_4  alpha">
                        <div class="inner dashboard_item">
                        	<a href="add-services.php">
      						<i class="icon-certificate"></i>
                             Add Services
                             </a>
                        </div>
                    </div>
                    
                    <div class="col col_1_4 ">
                        <div class="inner dashboard_item">
                        	<a href="edit-services.php">
                                <i class="icon-certificate"></i> 
                                Edit Services
                            </a>
                        </div>
                    </div>
                    
                    <div class="col col_1_4">
                        <div class="inner dashboard_item">
                        	<a href="view-services.php">
                                <i class="icon-certificate"></i> 
                                View Services
                            </a>
                        </div>
                    </div>
                    
                    <div class="col col_1_4 omega">
                        <div class="inner dashboard_item">
                        	<a href="delete-services.php">
                                <i class="icon-certificate"></i> 
                                Delete Services
                            </a>
                        </div>
                    </div>
                    
                </div>
                <div class="clearfix"></div>
                <div class="separator"><br></div> 

                <div class="styled_table table_dark">
                <h2>Recently Added services</h2>
                    <table>
                        <thead>
                            <tr>
                                <th style="width:5%">S/N</th>
                                <th style="width:75%">Name</th>
                                <th style="width:10%">Priority</th>
                                <th style="width:10%">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php echo $tbody ?>
                        </tbody>
                    </table>
                    <div class="alignright"><a href="all-services.php"> View All Services &raquo;</a></div>
                    </div>
                   
                    
                  
               
            	<div class="clear"></div>
            </div>
		          
            
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