<?php $dashboard = true; $title = "dashboard_testimonials" ?>
<?php 
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (isset($_GET['action'])){
$action = $_GET['action'];
if ($action == 'add') $success = "Your testimonial has been successfully added";
else if ($action == 'update') $success = "Your testimonial has been successfully updated";
else if ($action == 'delete') $success = "Your testimonial has been successfully deleted";
}
//Fetch All rows
$query = "SELECT testimonials_id, name,approved, testimonials FROM testimonials ORDER BY testimonials_id DESC LIMIT 3";
$rows = $db->fetch_all_row($query);
$tbody = "";
$count = 0;
foreach ($rows as $row){
	$count++;
	if ($count % 2==0)$tbody .= "<tr class='odd'>"; else $tbody .= "<tr>";
	$tbody .= "<td>$count</td><td>{$row['testimonials']}</td>";
	
	if ($row['approved'] == '0')
		$tbody .= "<td><a href='approve-testimonials.php?t={$row['testimonials_id']}'>Approve</a></td>";
	else $tbody .= "<td><a href='disapprove-testimonials.php?t={$row['testimonials_id']}'>Disapprove</a></td>";
	 $tbody .="<td><a href='delete-testimonials.php?t={$row['testimonials_id']}'>Delete</a></td></tr>";
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
    
    	<testimonials class="post-item post-detail">
        	        
        	<h1>Client Testimonials</h1>          
			
            
			<div class="entry">
             <?php alert() ?>  
             <div class="row">
                    <div class="col col_1_4  alpha">
                        <div class="inner dashboard_item">
                        	<a href="add-testimonials.php">
      						<i class="icon-comments"></i>
                             Add Testi...
                             </a>
                        </div>
                    </div>
                    
                    <div class="col col_1_4 ">
                        <div class="inner dashboard_item">
                        	<a href="approve-testimonials.php">
                                <i class="icon-comments"></i> 
                                Approved
                            </a>
                        </div>
                    </div>
                    
                    <div class="col col_1_4 ">
                        <div class="inner dashboard_item">
                        	<a href="disapprove-testimonials.php">
                                <i class="icon-comments"></i> 
                                Disapproved
                            </a>
                        </div>
                    </div>
                    
                    <div class="col col_1_4 ">
                        <div class="inner dashboard_item omega">
                        	<a href="edit-testimonials.php">
                                <i class="icon-comments"></i> 
                                Edit Testimonial
                            </a>
                        </div>
                    </div>
                    
                </div>
                <div class="clearfix"></div>
                <div class="separator"><br></div> 

                <div class="styled_table table_dark">
                <h2>Recently Added testimonials</h2>
                    <table>
                        <thead>
                            <tr>
                                <th style="width:5%">S/N</th>
                                <th style="width:75%">Testimonial</th>
                                <th style="width:10%">Action</th>
                                <th style="width:10%">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php echo $tbody ?>
                        </tbody>
                    </table>
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