<?php $dashboard = true; $title = "dashboard_team"; $sub = "add"  ?>
<?php 
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//Check if the user clicks on the submit button
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	include('includes/add_team.inc.php');
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
        	        
        	<h1>Add Team<p>Add a new member to the Team Page</p></h1> 
            <?php top_link("team") ?> 
                                                	<form method="post" id="custom" enctype="multipart/form-data"> 
													<?php 
														createFormInput('Name','name','text');
													?>	
                                                    <label for="post">Post</label><select name="post">
                                                        <option value='2'>Associate</option>
                                                    	<option value='1'>Managing Director</option>
                                                    </select>
													<?php createFormInput('Description','description','textarea'); ?>
													 
                                                     <p>&nbsp;</p>					
                                                    <label for="team_pics">Team Picture</label><input type="file" name="team_pics">
                                                     						
                                                   
                                                    <p>
                                                        <input type="submit" class="button_link" value="Add Team" tabindex="100">
                                                    </p>
                                                  <div class="clearfix"></div>
                                                    
                                                 </form>
                                               
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