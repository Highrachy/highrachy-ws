<?php $dashboard = true; $title = "dashboard_practise"; $sub = "add"; ?>
<?php 
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//Check if the user clicks on the submit button
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if (preg_match ('/^[A-Z0-9 \'.-]{2,60}$/i', $_POST['name'])) {
		$data['name'] = $_POST['name'];
	} else {
		$errors[] = 'Please enter name you wish to give the image!';
	}
	
	$data['content'] = $_POST['content'];
	$data['priority'] = $_POST['priority'];
	
	if (empty($errors)) { // If everything's OK...

    // Check if the document name is in the database
	$query = "SELECT name FROM practise WHERE name='".$db->escape_data($data['name'])."'";
	$rows = $db->total_affected_rows($query);

	if ($rows == 0) { // No problems! The practise name is not in the database
			
	$value = $db->insert_query("practise",$data);
	
	if ($value == 1) { // If it ran OK.
		redirect('dashboard_practise.php?action=add');	
	} else { // If it did not run OK.
		trigger_error('You could not be registered due to a system error. We apologize for any inconvenience.');
	}
	
	} else { // The document name is already in the database			
			$errors[] = 'The practise name you gave is already in the database';						
		
	} // End of $rows == 0 IF.

} // End of empty($errors) IF.

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
        	        
        	<h1>Add practise <p>Add a practise to the Practise Area Page</p></h1>            
			<?php top_link("practise"); ?>        
			<form method="post" id="custom" enctype="multipart/form-data">                         
							  	 <?php 
										createFormInput('Name','name','text');
								 ?>
                                 <label>Priority</label><select name="priority">
                                 	<?php for($i=1; $i<=10; $i++) { ?>
                                 	<option value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php } ?>
                                 </select>
								<?php	createFormInput('Description','content','textarea'); ?>
                              <p>
									<input type="submit" class="button_link" value="Add Practise" tabindex="100">
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