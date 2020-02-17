<?php $dashboard = true; $title = "dashboard_slideshow";$sub="all" ?>
<?php 
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');

$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//Fetch All rows
$query = "SELECT slideshow_id, name, description,show_home FROM slideshow ORDER BY name";
$rows = $db->fetch_all_row($query);
$tbody = "";
$count = 0;
foreach ($rows as $row){
	$count++;
	if ($count % 2==0)$tbody .= "<tr class='odd'>"; else $tbody .= "<tr>";
	$tbody .= "<td>$count</td><td>{$row['name']}</td><td>{$row['description']}</td><td>{$row['show_home']}</td><td><a href='view-slideshow.php?s={$row['slideshow_id']}'>View</a></td><td><a href='edit-slideshow.php?s={$row['slideshow_id']}'>Edit</a></td></tr>";
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
    
    	<article class="post-item post-detail">
        	        
        	<h1>All Slideshows</h1> 
            <?php top_link("slideshow"); ?>         
			<?php alert() ?>
            
			<div class="entry">
                
                <div class="styled_table table_dark">
                    <table>
                        <thead>
                            <tr>
                                <th style="width:5%">S/N</th>
                                <th style="width:25%">Image</th>
                                <th style="width:40%">Slogan</th>
                                <th style="width:10%">Show</th>
                                <th style="width:10%">View</th>
                                <th style="width:10%">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php echo $tbody ?>
                        </tbody>
                    </table>
                    </div>
                    
                    
                  
               
            	<div class="clear"></div>
            </div>
		</article>            
            
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