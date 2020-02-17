<?php $dashboard = true; $title = "dashboard_content"; $sub_title1="edit-contact"; ?>
<?php 
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (isset($_GET['id']))
$id = $_GET['id'];
else $id = 1;

//Check if the user clicks on the submit button
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	
	
	if (!(empty($_POST['land']))){
		$data['land'] = $_POST['land'];
	} else {
		$errors[] = 'Please enter a valid Phone(Land) number!';
	}
	if (!(empty($_POST['mobile1']))){
		$data['mobile1'] = $_POST['mobile1'];
	} else {
		$errors[] = 'Please enter a valid Phone(mobile 1) number!';
	}
	
	if (!(empty($_POST['facebook']))){
		$data['facebook'] = $_POST['facebook'];
	} else {
		$errors[] = 'Please enter a valid Facebook!';
	}
	if (!(empty($_POST['twitter']))){
		$data['twitter'] = $_POST['twitter'];
	} else {
		$errors[] = 'Please enter a valid Twitter!';
	}
	
	if (!(empty($_POST['linked']))){
		$data['linked'] = $_POST['linked'];
	} else {
		$errors[] = 'Please enter a valid Linked!';
	}
	
	if (!(empty($_POST['address']))){
		$data['address'] = $_POST['address'];
	} else {
		$errors[] = 'Please enter a valid Address!';
	}		
		$data['modified'] = "NOW()";
		
	if (empty($errors)){
		//Used to update
		$value = $db->update_query("contact",$data,"id=1");
		if ($value == 1) { // If it ran OK.
			redirect('dashboard_content.php?action=contact');
		} else { 
			$errors[] = 'The page could not be updated now, Please try again later';
		}
	
	} 
}  else {
	//Fetch First rows
	$query = "SELECT id, address,mobile1,land,facebook,twitter,linked FROM contact WHERE id = '1'";
	$rows = $db->fetch_first_row($query);
	$_POST = $rows;
}
?>	

<?php include('includes/header.inc.php'); ?>      
     </div>
     <!--End of Top Container-->
     
     <section>
     	<div class="container">
            <div id="content" class="row">
                <?php include('includes/breadcrumb.inc.php'); ?>
                <div class="maincontent">
                    <div id="tab-one">
               			 <?php include('includes/dash-nav.inc.php'); ?>
                      <div class="list-wrap">
                          <h2>Edit Contact</h2>
                          <form id="custom" method="post">                            
							  	<?php 
														createFormInput('Phone(land)','land','text');
														createFormInput('Mobile','mobile1','text');
														createFormInput('Facebook','facebook','text');
														createFormInput('Twitter','twitter','text');
														createFormInput('LinkedIn','linked','text');
														createFormInput('Address','address','textarea');
													 ?>

									<input type="submit" class="btn" value="Edit Contact">

                                <?php alert() ?>
                            </fieldset>
                        </form>
                        
                        
                      </div>
                      <!-- END List Wrap -->
                      <div class="list-wrap-bottom"></div>
                    </div>
                      <!-- END Tab One -->
                </div>
                <!-- End of Main Content -->
            </div>
    	</div>
     </section>
    
        <?php include('includes/footer.inc.php'); ?>

		<?php include('includes/tinymce.inc.php'); ?>
    </body>
</html>
