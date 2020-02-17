<?php $dashboard = true; $title = "dashboard_content"; $sub_title= "about_content"; $sub_title2="edit-about-content"; ?>
<?php
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


$showInfo = false;
//Check if the services id is set
if (isset($_GET['s'])){
	$showInfo = true;
	$id = $_GET['s'];
	
	//If the services id is set but it is not defined
	if ($id == ""){
		$errors[] = "Please select the page you wish to edit";
		$showInfo = false;
	}  else {
		//The product id is defined
		
		//Check if the user has posted the result
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			if ($_POST['link'] == "")
				$errors[] = "Please select the expertise page you wish to link to";
			else
				$data['link'] = $_POST['link'];
				
					
					
		//Check the pics that has been selected by the user
		if ((!isset($_FILES['pics'])) || !(is_file($_FILES['pics']['tmp_name']))){
			//A picture is not selected
			$change_pics = false;
		} else {
			$change_pics = true;
		}
		
		//Used for my hidden text
		if (isset($_POST['expertise_id'])){
			$expertise_id = $_POST['expertise_id'];
		} else {
			$errors[] = 'Your request could not be completed! Please try reloading the page';
		}
		
		//Used for my hidden text
		if (isset($_POST['old_picture'])){
			$old_picture = $_POST['old_picture'];
		} else {
			$errors[] = 'Your request could not be completed! Please try reloading the page';
		}
		
		//If the picture is not a valid image
		if (empty($errors)){
			if ($change_pics){
				if (!((preg_match('/^image\/p?jpeg$/i', $_FILES['pics']['type']) or
				preg_match('/^image\/gif$/i', $_FILES['pics']['type']) or
				preg_match('/^image\/(x-)?png$/i', $_FILES['pics']['type']))))
				{
					$errors[] = 'Please submit a JPEG, GIF, or PNG image file.';
				}
			}
		}
				
			
		
			
			if (empty($errors)) { // If everything's OK...
			
				// Check if the about name is in the database
				$query = "SELECT link FROM home WHERE id='".$db->escape_data($data['link'])."'";
				$rows = $db->total_affected_rows($query);
				if ($rows <= 1) { // No problems! The product name is not in the database
				
					if($change_pics){
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
						unlink('img/slideshow/'.$old_picture);
					}
					
					$value = $db->update_query("home",$data,"link=$id");	
					if ($value == 1) { // If it ran OK.
						redirect('home-content.php?action=update');	
					} else { // If it did not run OK.
						trigger_error('You could not be registered due to a system error. We apologize for any inconvenience.');
					}
						
				} else { // The document name is already in the database			
					$errors[] = 'The expertise name you chose already has a picture in the database';						
				
				} // End of $rows == 0 IF.
				
			}// End of empty($errors) IF.
		
		} // $request method

			
		//Display information to the user.
		$query = "SELECT  expertise.id,name, pics FROM expertise INNER JOIN home ON expertise.id = home.link  WHERE expertise.id = '$id'";
		$table = $db->fetch_first_row($query);
		$total_rows = $db->total_affected_rows();
		
		//Check if the total_rows is less than 1
		if ($total_rows < 1) {
			$errors[] = "The selected expertise page is not in the database";
			$showInfo = false;
		} else {
			
			//If What the user has posted is empty, assign result to the $_POST global variable
			if (empty($_POST))
			$_POST = $table;
			
			//Get All the information from the database.
			$name = $table['name'];
			$pics = $table['pics'];
			$expertise_id  = $table['id'];
			
			
		//Get a list of all the products in the database.
		$query = "SELECT expertise.id, name
					FROM home
					RIGHT OUTER JOIN expertise ON home.link = expertise.id
					WHERE home.link IS NULL 
					AND expertise.link <>0";
		$table = $db->fetch_all_row($query);
		$option = "<option value='$id'>$name</option>";
		foreach ($table as $row){
			$option .= "<option value='".$row['id']."'>".$row['name']."</option>";
		}
			
		}
		
	}
}

if (!$showInfo){
	$option = "<option value=''>-- Select Expertise -- </option>";
	//Get a list of all the products in the database.
	$query = "SELECT expertise.id, name FROM expertise INNER JOIN home ON home.link = expertise.id WHERE expertise.link<>0 ORDER BY name ASC";
	$table = $db->fetch_all_row($query);
	foreach ($table as $row){
		$option .= "<option value='".$row['id']."'>".$row['name']."</option>";
	}
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
            			  <?php if ($showInfo) { ?> 
                           <h2>Edit Expertise Picture</h2>
                          <form method="post" id="custom" enctype="multipart/form-data">  
                          			<label>Expertise Picture </label><img src="img/expertise/<?php echo $pics ?>" alt="Picture of <?php echo $name ?>" height="80" width="150">
                                     <br><br>                       
							  	  <label>Change Expertise</label>
                                  <select name="link"><?php echo $option ?></select>
								<label for="pics">Change Picture<br> <small class="gray">(267 X 173)</small></label><input type="file" name="pics">
                                 <input type="hidden" name="old_picture" value="<?php echo $pics ?>">
                                 <input type="hidden" name="expertise_id" value="<?php echo $expertise_id ?>">
                              <div class="pull-right pad30">
                                    <input type="submit" class="btn" value="Update Expertise">
								</div>
                              <div class="clearfix"></div>
                                
                                <?php alert() ?>
                            </fieldset>
                        </form>
                        <?php } else { ?>
                        <h2>Edit Expertise Picture</h2>                      	
                        <form id="custom" action="" method="get" enctype="multipart/form-data">
                            <label for="s">Select Expertise</label>
                                 <select name="s">
                                    <?php echo $option ?>
                                </select>
                            
                           <div class="align-right pad30">
                                    <input type="submit" class="btn" value="Edit Expertise">
								</div>
                          <div class="clearfix"></div>
                        
                        </form>
                    <?php  alert(); } ?>
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
    </body>
</html>
