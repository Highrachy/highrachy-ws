<?php $dashboard = true; $title = "dashboard_article"; $sub = "add" ?>
<?php 
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//Check if the user clicks on the submit button
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	include('includes/add_article.inc.php');
} 

//576*262

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
        	        
        	<h1>Add Article <p>Add a new article to the Article page</p></h1>
            <?php top_link("article") ?>          
			<form method="post" id="custom" enctype="multipart/form-data">                         
							  	 <?php 
								 		createFormInput('Article Name','doc_name','text');
										createFormInput('Article Title','title','text');
										createFormInput('Full Article','full_article','textarea');
									 ?>
                                     <br>
                                     <label for="documents">Upload Document</label><input type="file" name="documents"> 
                                     <div><label>&nbsp;</label><input name="no_document" type="checkbox" value="no_document" />I dont  need any document for this article<br></div>
                                     <br>
                              		 <label for="article_pics">Upload Picture</label><input type="file" name="article_pics">
                                    
                                     <div><label>&nbsp;</label><input name="no_image" type="checkbox" value="no_image" />I dont need any Picture for this article</div>
                                     <div class="clearfix"></div>
                              <p>
									<input type="submit" class="button_link" value="Add Article" tabindex="100">
								</p>
                              <div class="clearfix"></div>
                                
                                <?php alert() ?>
                            </fieldset>
                        </form>
            <div class="clearfix"></div>
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