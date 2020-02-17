<?php $title = "career"; ?>
<?php
define('PATH', 'img/cv/');
include('includes/config.inc.php'); 
require(DB);	
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


if (isset($_GET['page']))
	$id = $_GET['page'];
else {
	//Get the first id from the database
	$query = "SELECT id FROM career where id <> 1 LIMIT 1";
     $table = $db->fetch_first_row($query);
	 $id = $table['id'];
}

//Check if the user clicks on the submit button
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if (preg_match ('/^[A-Z0-9 \'.-]{2,60}$/i', $_POST['name'])) {
		$data['name'] = $_POST['name'];
	} else {
		$errors[] = 'Please enter a valid name!';
	}
	
	if (!empty($_POST['phone'])){
		$data['phone'] = $_POST['phone'];
	} else {
		$errors[] = 'Please enter a valid phone number!';
	}
	
	
	// Validate the email address:
	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$data['email'] = $_POST['email'];
	} else {
		$errors[] = 'Please enter a valid email address!';
	}
	
	//Check the cv
	if (!isset($_FILES['cv']) || !(is_file($_FILES['cv']['tmp_name']))){
		$errors[] = 'Please Select a cv';
	}
	
	if (empty($errors)) { // If everything's OK...
		//Get the file extension of the uploaded file
		$extension = "";
		//Get the name of the file in reversed order
		$nospaces = strrev($_FILES['cv']['name']);
		
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
		$base = $data['name'].time();
				
		$fileName = $base.$extension;
		//Set the Destination and scan if the file is present.
	    $existing = scandir(PATH);
		
		//If the file is present, rename the file by appending _1
	    if (in_array($fileName, $existing)) {			
			$i = 1;
			do {
			  $fileName = $base.'_'.$i++.$extension;
			} while (in_array($fileName, $existing));
		}
		
		//$path = PATH.$fileName;
		$path = PATH."$fileName";
		
		if (is_uploaded_file($_FILES['cv']['tmp_name'])){ 
			if (move_uploaded_file($_FILES['cv']['tmp_name'],$path)){
				$data['cv'] = $fileName;
				$data['career_id'] = $_POST['id'];
				$value = $db->insert_query("applicants",$data);
		
				if ($value >= 1) { // If it ran OK.
					$success = "Your application has been sucessfully submitted";
					unset($_POST);	
				} else { // If it did not run OK.
					trigger_error('You could not be registered due to a system error. We apologize for any inconvenience.');
				}
			} else {
				$errors[] = "Could not move the file!";
			}
		
		} else { // The file could not be uploaded
			$errors[] = "Could not save file as $fileName!";
		}
	}
}


$query = "SELECT career.name as page_name,pics,content FROM career WHERE career.id ='$id' AND career.id <> 1 AND link=0";
$rows = $db->fetch_all_row($query);
$page_name = $icons_name = "";
if ($db->total_affected_rows() >= 1){
	foreach($rows as $row){
	$sub_title = $page_name=$row['page_name'];
	$tagline = $row['content'];
	 $pics = $row['pics'];
	}
} else {
	//If the current id cant be found in the database
	$query = "SELECT id,name,pics,content FROM career WHERE link=0 AND career.id <> 1 LIMIT 1";
     $table = $db->fetch_first_row($query);
	 $id = $table['id'];
	 $sub_title = $page_name= $table['name'];
	 $tagline = $table['content'];
	 $pics = $table['pics'];
}



//Fetch All rows to view the recent content
$query = "SELECT id, name, content FROM career  WHERE link=$id  ORDER BY priority DESC,name";
$rows = $db->fetch_all_row($query);
$total = $db->total_affected_rows();
$content = "";
$count = 0;

//This is for the inner content of the page
foreach ($rows as $row){
	if ($total == 1)
	$content .= '<h3>'.$row['name'].'</h3><article>'.$row['content'].'</article>';
	else {
	$count++;
	$content .= '<div class="span4';
	if ($count % 2 == 1) $content .= ' pad30';
	$content .= '"><h3>'.$row['name'].'</h3><p>'.$row['content'].'</p></div>';
	 
	}
                              
}

//This is for the side link
$query = "SELECT career.id,career.name as name FROM career WHERE link = 0 AND career.id <> 1 ORDER BY priority DESC,name";
$table = $db->fetch_all_row($query);
$option = "";
$count = 0;
foreach ($table as $row){
	$count++;
	$option .= '<li class="nav-li';
	if ($count == 1) $option .= ' first';
	$option .= '"><a href="applicants.php?page='.$row['id'].'"';
	if ($row['id'] == $id) $option .= ' class="current"';
	$option .= '><i class="icon-briefcase"></i>&nbsp;'.$row['name'].'</a></li>';
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
                      <ul class="nav unstyled"><?php echo $option ?></ul>
                      <div class="list-wrap">
                     	 <?php alert() ?>
                      	  <!-- Enter the page name here -->
                          <h2><?php echo $page_name?></h2>
                      	  <!-- Tagline is here -->
                          <p class="lead"><?php echo strip_tags($tagline) ?></p> 
                           <p>
                          <?php if ($pics != ""): ?>
                          <!--Add the Picture here if it exists-->
                          <img src="img/career/<?php echo $pics ?>" alt="Picture of <?php echo $page_name?>">
                         <?php endif; ?>
                         </p>
                          <div class="break"></div>
                          <!--Add the Content of the page here-->
                          <div <?php if ($total != 1) echo 'class="row"' ?>><?php echo $content ?></div>
                          <div class="clearfix"></div>
                          
                          <!--Make people apply for the job here-->
                          <div class="break"></div>
                          
                          
                          <h3>Apply for this Job</h3>
                          <form method="post" id="custom" enctype="multipart/form-data">
                          <?php alert() ?> 
													<?php 
														createFormInput('Name','name','text');
														createFormInput('Phone','phone','text');
														createFormInput('Email','email','text');
														
													 ?>
                                                     <div><br></div>
                                     <input type="hidden" name="id" value="<?php echo $id ?>">
                                     <label for="cv">Upload CV</label><input type="file" name="cv">
                                    
                                    
                                    <div class="clearfix"></div>
                                    
									<div class="pull-right pad30">
									<input type="submit" class="btn" value="Apply">&nbsp;&nbsp;<input type="reset" class="btn" value="Clear">
                                    </div>
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
    </body>
</html>
