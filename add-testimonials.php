<?php $title = "team" ?>
<?php
include('includes/config.inc.php');
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//Check if the user clicks on the submit button
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
// Check for the testimonial name
if (preg_match ('/^[A-Z0-9 \'.-]{2,60}$/i', $_POST['name'])) {
	$data['name'] = $_POST['name'];
} else {
	$errors[] = 'Please enter a name for the testimonial!';
}

// Validate the email address:
if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	$data['email'] = $_POST['email'];
} else {
	$errors[] = 'Please enter an email address for the testimonial!';
}

if (!(empty($_POST['testimonial'])))  {
	if (strlen($_POST['testimonial']) <= 399)
	$data['testimonials'] = $_POST['testimonial'];
	else $errors[] = "Your testimonial should be less than 400characters";
}
else {
	$errors[] = 'Your testimonial should not be empty';
}


if (empty($errors)) { // If everything's OK...

    // Check if the document name is in the database
	$query = "SELECT name FROM testimonials WHERE email='".$db->escape_data($data['email'])."'";
	$rows = $db->total_affected_rows($query);

	if ($rows == 0) { // No problems! The testimonial name is not in the database
				
				$value = $db->insert_query("testimonials",$data);
				
		
				if ($value == 1) { // If it ran OK.
					if (isset($_SESSION['name']))
					redirect('dashboard_testimonials.php?action=add');	
					$success = "Your testimonial has been successfully saved";	
					unset($_POST);
				} else { // If it did not run OK.
					trigger_error('You could not be registered due to a system error. We apologize for any inconvenience.');
				}
			
		
		
	} else { // The document name is already in the database			
			$errors[] = 'The email address you gave is already in our testimonial';						
		
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
        	        
        	<h1>Add Your Own Testimonial</h1>          
			
            
			<div class="entry">
                   <form method="post" id="custom" enctype="multipart/form-data"> 
						<?php 
                            createFormInput('Name','name','text');
                            createFormInput('Email','email','text');
                            createFormInput('Testimonial','testimonial','textarea');
							alert();
                         ?>
                                                
                       
                        <p class="alignright">
                            <input type="submit" class="button_link" value="Add Testimonial" tabindex="100">
                        </p>
                      <div class="clearfix"></div>
                        
                     </form>              
              
					<div class="clear"></div>

		
            </div>
		</article>            
            
		</div>

    <!--/ content -->
    
    <!-- sidebar -->
    <div class="sidebar">
    	
        <!-- widget_text -->
        <div class="widget-container widget_text">
			<h3 class="widget-title">About Our Law Firm:</h3>
            <div class="textwidget">
            	<p>Elvira Salleras & Associates founded in 1997, is a leading law firm involved in various practice areas of law with its principal office situated in Lagos.</p>
            </div>
		</div>
        <!--/ widget_text -->
        
        <div class="widget-container widget_nav_menu nav_style2">
			<ul>
				<li><a href="about.php">About Us</a></li>
                <li><a href="team.php">Meet Our Team</a></li>                              
				<li class="even"><a href="testimonial.php">View All Testimonials</a></li>    	 				
			</ul>
		</div>
        
                
    </div> 
    <!--/ sidebar -->
           
    <div class="clear"></div>	    
</div>
<!--/ middle --> 
</div>
<?php include('includes/footer.inc.php'); ?>