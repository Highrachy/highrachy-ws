<?php 
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
require('functions/createFormInput.php');

//Check if the product id is set
if (isset($_GET['a']))
$article_id = $_GET['a'];
else $article_id="";
	
	//If the product id is set but it is not defined
	if ($article_id == ""){
		redirect('article.php');
	}  else {
		//Cheack if the article id is valid
		$query = "SELECT article_id,title, full_article,article_pics, doc_path,doc_name, DATE_FORMAT(date_added, '%b %d') AS date_added,name FROM article INNER JOIN admin WHERE added_by = admin_id AND article_id='$article_id'";
		$rows = $db->fetch_first_row($query);
		$total_rows = $db->total_affected_rows();
		
		//Check if the total_rows is less than 1
		if ($total_rows < 1) {
			redirect('article.php');
		} else {
			
			$article = "";
			
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			include('includes/add_comments.inc.php');
			
			$article .= '<header><div class="date-box">'.$rows['date_added'].'</div>
							<h1>'.$rows['title'].'</h1></header><div class="entry">';
							
							//How to display the image
				if ($rows['article_pics'] != "")		
				$article .= '<figure><img src="images/article/'.$rows['article_pics'].'" alt="Picture of '.$rows['doc_name'].'" class="frame_box"></figure>'; 
				else $article .= '<figure><img src="images/article/no-image.png" alt="Picture of '.$rows['doc_name'].'" class="frame_box"></figure>';	
				

				
				$query = "SELECT comments_id,name,comments,DATE_FORMAT(date_added, '%D %b %Y %h:%i%p') AS date from comments where article_id = '{$rows['article_id']}'";
				$c_rows = $db->fetch_all_row($query);
				$total_comments = $db->total_affected_rows();
				
				//List the comments
				$comments = "";
				foreach ($c_rows as $row){
					$comments .= '<li class="comment"><div class="comment-body">    
	                              <div class="comment-text"><div class="comment-author"><a href="#" class="link-author" hidefocus="true" style="outline: none; ">'.$row['name'].'</a> <span class="comment-date">'.$row['date'].'</span>
			                            </div><div class="comment-entry">'.$row['comments'].'</div></div>
                                    <div class="clear"></div></div> </li>';
				}
				
				
			
			
			
			  	$article .= '<div class="post-meta"><em class="alignleft">Posted by <span class="author">'.$rows['name'].'</span> </em><a href="#" class="link-comments" hidefocus="true" style="outline: none; ">'.$total_comments.' comments</a></div><div class="entry"><p>'.$rows['full_article'].'</p><div class="clear"></div></div>';
				
				if (isset($rows['doc_path']) && trim($rows['doc_path'] != ""))
				$article .=' <div class="post-meta-bot"><a href="document/'.$rows['doc_path'].'" hidefocus="true" style="outline: none; ">Download Document ('.$rows['doc_name'].')</a></div><!--/ post details -->';
			
				$article .=' <div class="post-meta-bot"><a href="#addcomments" class="link-more" hidefocus="true" style="outline: none; ">ADD A COMMENT</a></div><!--/ post details -->';
			
		}
		
		
	}	
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
    		<?php alert() ?>
    		<article class="post-item post-detail">
                <!-- post details -->
                	<?php echo $article ?>
                <!--/ post details -->
                
                <!-- post comments -->
					<div class="comment-list" id="comments">
                            
                            <ol>
                            	<h2>Comments</h2>
                            	<?php  echo $comments ?>
                            </ol>
                        </div>
				<!--/ post comments -->
                        
                <!-- add comment -->
                        <div class="add-comment" id="addcomments">
                            <h3>Leave a Comment</h3>
                            
                            <div class="comment-form">
                            <form action="#" method="post" id="commentForm">
                                
                                <div class="row alignleft infieldlabel">
                                    <label for="name"><strong>Name *</strong></label>
                                    <input type="text" name="name" id="name" value="" class="inputtext input_middle required">
                                </div>
                                
                                <div class="space"></div>
                                
                                <div class="row  alignleft infieldlabel">
                                    <label for="email"><strong>Email *</strong> (never published)</label>
                                    <input type="text" name="email" id="email" value="" class="inputtext input_middle required">
                                </div>
								
                                <div class="clear"></div>   
                                
                                <div class="row infieldlabel">
                                    <label for="comments"><strong>Comment *</strong></label>
                                    <textarea cols="30" rows="10" name="comments" id="comments" class="textarea textarea_middle required"></textarea>
                                </div>
                                
                                <div class="row rowSubmit">
                                <input type="submit" value="Add Comments" class="btn-submit">
                                <a onclick="document.getElementById('commentForm').reset();return false" href="#" class="link-reset" hidefocus="true" style="outline: none; ">reset all fields</a>
                                </div>
                            </form>
                            </div>
                        </div>
                <!--/add comment --> 
                
                
		  </article>    

    	
	</div>
    <!--/ content -->
    
    <?php include('includes/article_sidebar.inc.php'); ?>           
    <div class="clear"></div>	    
</div>
<!--/ middle --> 
</div>
<?php include('includes/footer.inc.php'); ?>