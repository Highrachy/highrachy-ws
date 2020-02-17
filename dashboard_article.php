<?php $dashboard = true; $title = "dashboard_article"; $sub="" ?>
<?php 
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');

if (isset($_GET['action'])){
$action = $_GET['action'];
if ($action == 'add') $success = "Your article has been successfully added";
else if ($action == 'update') $success = "Your article has been successfully updated";
else if ($action == 'delete') $success = "Your article has been successfully deleted";
}
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//Fetch All rows
$query = "SELECT article_id,doc_name, title FROM article ORDER BY article_id DESC LIMIT 3";
$rows = $db->fetch_all_row($query);
$tbody = "";
$count = 0;
foreach ($rows as $row){
	$count++;
	if ($count % 2==0)$tbody .= "<tr class='odd'>"; else $tbody .= "<tr>";
	$tbody .= "<td>$count</td><td>{$row['title']}</td><td>{$row['doc_name']}</td><td><a href='view-article.php?a={$row['article_id']}'>View</a></td><td><a href='edit-article.php?a={$row['article_id']}'>Edit</a></td></tr>";
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
        	        
        	<h1>Articles</h1>          
			<?php alert() ?>
            
			<div class="entry">
                
            	<div class="row">
                    <div class="col col_1_4  alpha">
                        <div class="inner dashboard_item">
                        	<a href="add-article.php">
      						<i class="icon-file"></i>
                             Add Article
                             </a>
                        </div>
                    </div>
                    
                    <div class="col col_1_4 ">
                        <div class="inner dashboard_item">
                        	<a href="edit-article.php">
                                <i class="icon-file"></i> 
                                Edit Article
                            </a>
                        </div>
                    </div>
                    
                    <div class="col col_1_4 ">
                        <div class="inner dashboard_item">
                        	<a href="view-article.php">
                                <i class="icon-file"></i> 
                                View Article
                            </a>
                        </div>
                    </div>
                    
                    <div class="col col_1_4  omega">
                        <div class="inner dashboard_item">
                        	<a href="delete-article.php">
                                <i class="icon-file"></i> 
                                Delete Article
                            </a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="separator"><br></div>
                <div class="styled_table table_dark">
                <h2>Recently Added Article</h2>
                    <table>
                        <thead>
                            <tr>
                                <th style="width:10%">S/N</th>
                                <th style="width:45%">Article Title</th>
                                <th style="width:35%">Article Name</th>
                                <th style="width:10%">View</th>
                                <th style="width:10%">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php echo $tbody ?>
                        </tbody>
                    </table>
                    <div class="alignright"><a href="all-article.php"> View All Articles &raquo;</a></div>
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