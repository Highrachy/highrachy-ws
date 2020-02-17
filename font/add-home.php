<?php $dashboard = true; $title = "about"; $sub_title= "add-about"; $script=true; ?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//Check if the user clicks on the submit button
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if ($_POST['link'] == "")
		$errors[] = "Please select the expertise page you wish to link to";
	else
		$data['link'] = $_POST['link'];
		
	if (!isset($_FILES['pics']) || !(is_file($_FILES['pics']['tmp_name']))){
		$errors[] = 'Please Select a picture for Expertise';
	} else {
		if (!((preg_match('/^image\/p?jpeg$/i', $_FILES['pics']['type']) or
		preg_match('/^image\/gif$/i', $_FILES['pics']['type']) or
		preg_match('/^image\/(x-)?png$/i', $_FILES['pics']['type']))))
		{
		  $errors[] = 'Please submit a JPEG, GIF, or PNG image file.';
		}
	}

	
	if (empty($errors)) { // If everything's OK...
	
		// Check if the about name is in the database
		$query = "SELECT link FROM home WHERE link='".$db->escape_data($data['link'])."'";
		$rows = $db->total_affected_rows($query);
		if ($rows == 0) { // No problems! The product name is not in the database
			//Set the overall base name for the files
			$fileName ="";
	
			define('MIDDESTINATION', 'img/expertise/');
			define('RESIZEBY', 'w');	
			define('QUALITY', 100);
			define('MIDRESIZETO', 267);
			
			 /////////////////////////////////////////////////////////
			// Process the Image
			/////////////////////////////////////////////////////////
	
			//Get the file extension of the uploaded file
			$extension = "";
			//Get the name of the file in reversed order
			$nospaces = strrev($_FILES['pics']['name']);
			
			//Check if the file name contains a dot
			$dot = strrpos($nospaces, '.');
			
			//Get the extension if the fileName has a dot
			if ($dot) {
			  //Split the fileName using the space
			  $no = explode('.',$nospaces);
			  
			  //Add a dot to the file extension.
			  $extension  = '.' . strrev($no[0]);
			}
		
			//Set the overall base name for the files
			$base = 'expertise_'.time();
					
			$fileName = $base.$extension;
			//Set the Destination and scan if the file is present.
			$destination = MIDDESTINATION;
			$existing = scandir($destination);
			
			//If the file is present, rename the file by appending _1
			if (in_array($fileName, $existing)) {			
				$i = 1;
				do {
				  $fileName = $base.$i++.$extension;
				} while (in_array($fileName, $existing));
			}
							
	
			//Include the function for the image
			require_once 'functions/image.class.php';	
			
			//This creates the medium image
			$image_mid = new Image($_FILES['pics']['tmp_name']);		
			$image_mid->destination = MIDDESTINATION.$fileName;
			$image_mid->constraint = RESIZEBY;
			$image_mid->size = MIDRESIZETO;
			$image_mid->quality = QUALITY;
			$image_mid->render();
			$data['pics'] = $fileName;
			$value = $db->insert_query("home",$data);	
			if ($value == 1) { // If it ran OK.
				redirect('home-content.php?action=add');	
			} else { // If it did not run OK.
				trigger_error('You could not be registered due to a system error. We apologize for any inconvenience.');
			}
				
		} else { // The document name is already in the database			
			$errors[] = 'The expertise name you chose already has a name in the database';						
		
	    } // End of $rows == 0 IF.
		
	}// End of empty($errors) IF.
} 

//Get a list of all the products in the database.
$query = "SELECT expertise.id, name
					FROM home
					RIGHT OUTER JOIN expertise ON home.link = expertise.id
					WHERE home.link IS NULL 
					AND expertise.link <>0 ORDER BY name ASC";
$table = $db->fetch_all_row($query);
$option = "<option value=''>- Select Expertise-</option>";
foreach ($table as $row){
	$option .= "<option value='".$row['id']."'>".$row['name']."</option>";
}
?>
<?php include('includes/header.inc.php'); ?>      
     </div>
     <!--End of Top Container-->
     
     <section>
     	<div id="dashboard"  class="container">
            <div id="content" class="row">
                <?php include('includes/breadcrumb.inc.php'); ?>
                <div class="maincontent">
                    <div id="tab-one">
               			 <?php include('includes/dash-nav.inc.php'); ?>
                      <div class="list-wrap">
                          <h2>Add Expertise Picture</h2>
                          <form method="post" id="custom" enctype="multipart/form-data">                         
							  	  <label>Expertise</label>
                                  <select name="link"><?php echo $option ?></select>
								<label for="pics">Picture <small class="gray">(267 X 173)</small></label><input type="file" name="pics">
                              <div class="pull-right pad30">
                                    <input type="submit" class="btn" value="Add Picture">
								</div>
                              <div class="clearfix"></div>
                                
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
