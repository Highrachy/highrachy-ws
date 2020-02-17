<?php
include('includes/config.inc.php');
require(DB);	
require('functions/database.class.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);											
#-##########################################################
# Get the list of articles in the database
#-##########################################################
//Display information to the user.
		$query = "SELECT article_id,title, full_article,article_pics, doc_path,doc_name, DATE_FORMAT(date_added, '%b %d') AS date_added,name FROM article INNER JOIN admin WHERE added_by = admin_id ORDER BY  `article`.`article_id` DESC ";
		$table = $db->fetch_all_row($query);$article ="";
		if ($db->total_affected_rows() > 1){	
			foreach ($table as $rows){
				$article .= '<article class="post-item"><header><div class="date-box">'.$rows['date_added'].'</div>
							<h1><a href="article-details.php?a='.$rows['article_id'].'">'.$rows['title'].'</a></h1>
							</header><div class="entry">';
							
							//How to display the image
				if ($rows['article_pics'] != "")		
				$article .= '<figure><img src="images/article/'.$rows['article_pics'].'" alt="Picture of '.$rows['doc_name'].'" class="frame_box"></figure>'; 
				else $article .= '<figure><img src="images/article/no-image.png" alt="Picture of '.$rows['doc_name'].'" class="frame_box"></figure>';	
				
					
				$article .= '<p>'.more($rows['full_article'],380).'</p><div class="clear"></div></div> <div class="post-meta">
				<div class="alignleft"><br><a href="article-details.php?a='.$rows['article_id'].'" class="link-more">Read more</a></div>';
				$article .= '<em>Posted by <span class="author">'.$rows['name'].'</span> <span class="separator">|</span>';
				
				$query = "SELECT comments_id from comments where article_id = '{$rows['article_id']}'";
				$total_comments = $db->total_affected_rows($query);
				
				 $article .= '<a href="article-details.php?a='.$rows['article_id'].'" class="link-comments">'.$total_comments.' comments</a></em></div></article>';
					}
		}
#-#End Content
?>
<?php include('includes/header.inc.php'); ?>
</div>

<div class="container">
<!-- middle -->
<div id="middle" class="cols2 sidebar_right noimage">
		<div class="top_content">
            <p>We are committed to helping our clients succeed</p>  
            </div>
    <div class="content" role="main">       
            <?php echo $article ?>
    	
	</div>
    <!--/ content -->
    
       <?php include('includes/article_sidebar.inc.php'); ?>     
    <div class="clear"></div>	    
</div>
<!--/ middle --> 
</div>
<?php include('includes/footer.inc.php'); ?>