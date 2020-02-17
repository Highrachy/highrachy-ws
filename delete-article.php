<?php $dashboard = true; $title = "dashboard_article"; $sub="delete" ?>
<?php 
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
require('functions/createFormInput.php');

$showInfo = false;

//Check if the product id is set
if (isset($_GET['a'])){
	$showInfo = true;
	$article_id = $_GET['a'];
	
	//If the product id is set but it is not defined
	if ($article_id == ""){
		$errors[] = "Please select the Article you wish to delete";
		$showInfo = false;
	}  else {
		
		//Display information to the user.
		$query = "SELECT title, doc_name,full_article, doc_path FROM article WHERE article_id = '$article_id'";
		
		$table = $db->fetch_first_row($query);
		$total_rows = $db->total_affected_rows();
		
		//Check if the total_rows is less than 1
		if ($total_rows < 1) {
			$errors[] = "The selected Article is not in the database";
			$showInfo = false;
		} else {
			
			//Check if the user has posted the result so that you can delete the product
			if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				if (isset($_POST['Delete'])){
					$article_id = $_POST['Delete'];
					$query = "SELECT doc_path FROM article WHERE article_id = '$article_id'";
					$rows = $db->fetch_first_row($query);
					$total_rows = $db->total_affected_rows();
					
					if ($total_rows == 1) { // No problems! You can delete, file exist;
						$document = $rows['doc_path'];
						//To Delete
						$query = "DELETE FROM article WHERE article_id = '$article_id' LIMIT 1";
						$result = $db->delete_row($query);
						if ($result == 1) { // If it ran OK.
							unlink('document/'.$document);
							redirect("dashboard_article.php?action=delete");
							exit();
						}
					}
				}
			}
			
			
			//Get All the information from the database.
			$title = $table['title'];
			$doc_name = $table['doc_name'];
			$full_article = $table['full_article'];
			$doc_path = $table['doc_path'];
			
		}
	}
}


//The article_id is not defined, force user to select the article image
if (!$showInfo) {
	//Get a list of all the products in the database.
	$query = "SELECT article_id, title FROM article ORDER BY article.title ASC";
	$table = $db->fetch_all_row($query);
	$option = "<option>- Select Article -</option>";
	foreach ($table as $row){
		$option .= "<option value='".$row['article_id']."'>".$row['title']."</option>";
	}

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
        	        
        	<h1>Delete Article <p>Delete a saved article in your database</p></h1>
            <?php top_link("article") ?> 
                                                <?php if ($showInfo) { ?>
                                                	<form method="post" id="custom" enctype="multipart/form-data">   
                                                     
                                                    <label>Document Name </label><input type="text" name="name" id="name" value="<?php echo $doc_name ?>" disabled>    
							  	 					<label for="name">Article Title</label><input type="text" name="name" id="name" value="<?php echo $title ?>" disabled>
                                                    <label>Full Article</label><textarea name="description" id="description" class="text-input" rows="10" cols="80" disabled><?php echo $full_article ?></textarea>
                                                      
                                     	<input type="hidden" name="Delete" value="<?php echo $article_id ?>">
                              <p class="alignright">
									<input type="submit" class="button_link" value="Delete" tabindex="100">
								</p>
                              <div class="clearfix"></div>
                                                    
                                                 </form>
                                                <?php } else { ?>
                                                	
                                                	<form id="custom" action="" method="get" enctype="multipart/form-data">
                                                        <label for="a">
                                                             <select name="a">
                                                                <?php echo $option ?>
                                                            </select>
                                                        </label>
                                                        <p class="alignright">
                                                            <input type="submit" class="button_link" value="Delete" tabindex="100">
                                                        </p>
                                                      <div class="clearfix"></div>
                                                    
                                                    </form>
                                                <?php } ?>
												<?php alert(); ?>
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
<?php include('includes/tinymce.inc.php'); ?>