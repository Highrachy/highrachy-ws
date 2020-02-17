<?php $dashboard = true; $title = "dashboard_testimonials" ?>
<?php 
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


if (isset($_GET['t'])){
	$testimonials_id = $_GET['t'];
	$query = "SELECT name FROM testimonials WHERE testimonials_id = '$testimonials_id'";
	$rows = $db->total_affected_rows($query);

	if ($rows == 1) {
		$data['approved'] = '1';
		$value = $db->update_query("testimonials",$data,"testimonials_id='$testimonials_id'");
		if ($value == 1) $success="Your Testimonial has successfully been approved";
	}

}


//Fetch All rows
$query = "SELECT testimonials_id, name,approved, testimonials FROM testimonials WHERE approved = '1' ORDER BY testimonials_id DESC";
$rows = $db->fetch_all_row($query);
$tbody = "";
$count = 0;
foreach ($rows as $row){
	$count++;
	if ($count % 2==0)$tbody .= "<tr class='odd'>"; else $tbody .= "<tr>";
	$tbody .= "<td>$count</td><td>{$row['testimonials']}</td>";
	$tbody .= "<td><a href='disapprove-testimonials.php?t={$row['testimonials_id']}'>Disapprove</a></td>";
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
        	        
        	<h1>All Approved Testimonials</h1>          
			<?php alert() ?>
            
			<div class="entry">
                <div class="styled_table table_dark">
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
		</testimonials>            
            
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