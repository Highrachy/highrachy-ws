<?php
define('PATH', 'img/slideshow/');
// Check for the product name
if (preg_match ('/^[A-Z0-9 \'.-]{2,60}$/i', $_POST['name'])) {
	$data['name'] = $_POST['name'];
} else {
	$errors[] = 'Please enter  a valid name for the image!';
}

if (strlen($_POST['link_text'])<50){
if (preg_match ('/^[A-Z0-9 \'.-]{2,50}$/i', $_POST['link_text'])) {
	$data['link_text'] = $_POST['link_text'];
} else {
	$errors[] = 'Please enter a valid Link Text for this Slideshow image!';
}
} else {
		$errors[] = 'Your Link Text should be less than 100 characters!';
	}

$data['link_page'] = $_POST['link_page'];

if (strlen($_POST['description'])<120){
		$data['description'] = $_POST['description'];
} else {
		$errors[] = 'Your description should be less than 120 characters!';
	}
	
$data['show_home'] = $_POST['show_home'];
//Added so that at least an update will be made
$data['modified'] = "NOW()";

//Check the pics that has been selected by the user
if ((!isset($_FILES['slideshow_pics'])) || !(is_file($_FILES['slideshow_pics']['tmp_name']))){
	//A picture is not selected
	$change_pics = false;
} else {
	$change_pics = true;
}

//Used for my hidden text
if (isset($_POST['slideshow_id'])){
	$slideshow_id = $_POST['slideshow_id'];
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
		if (!((preg_match('/^image\/p?jpeg$/i', $_FILES['slideshow_pics']['type']) or
		preg_match('/^image\/gif$/i', $_FILES['slideshow_pics']['type']) or
		preg_match('/^image\/(x-)?png$/i', $_FILES['slideshow_pics']['type']))))
		{
			$errors[] = 'Please submit a JPEG, GIF, or PNG image file.';
		}
	}
}

if (empty($errors)) { // If everything's OK...
	
	// Check if the document name is in the database
	$query = "SELECT name FROM slideshow WHERE name='".$db->escape_data($data['name'])."' AND slideshow_id <> '$slideshow_id'";
	$rows = $db->total_affected_rows($query);

	if ($rows == 0) { // No problems! The product name is not in the database
	
		if ($change_pics){
			$basename = 'slideshow_'.time();
			
			// Pick a file extension
			if (preg_match('/^image\/p?jpeg$/i', $_FILES['slideshow_pics']['type']))
			{
			  $ext = '.jpg';
			}
			else if (preg_match('/^image\/gif$/i', $_FILES['slideshow_pics']['type']))
			{
			  $ext = '.gif';
			}
			else if (preg_match('/^image\/(x-)?png$/i',
				$_FILES['slideshow_pics']['type']))
			{
			  $ext = '.png';
			}
			else
			{
			  $ext = '.unknown';
			}
			
			$path = PATH.$basename.$ext;
			
			if (is_uploaded_file($_FILES['slideshow_pics']['tmp_name'])){ 
				if (move_uploaded_file($_FILES['slideshow_pics']['tmp_name'],$path)){
					
					$data['slideshow_pics'] = $basename.$ext;
					
					$value = $db->update_query("slideshow",$data,"slideshow_id=$slideshow_id");
					
			
					if ($value == 1) { // If it ran OK.
						//delete the old_picture
						unlink('images/slideshow/'.$old_picture);
						redirect('dashboard_slideshow.php?action=update');
						exit();
					} else { // If it did not run OK.
						trigger_error('You could not be registered due to a system error. We apologize for any inconvenience.');
					}
				} else {
					$errors[] = "Could not move the file!";
				}
			
			} else { // The file could not be uploaded
				$errors[] = "Could not save file as $fileName!";
			}
			
			
		} else { //Update the file without the picture			
				$value = $db->update_query("slideshow",$data,"slideshow_id=$slideshow_id");
					
			
					if ($value == 1) { // If it ran OK.
						redirect('dashboard_slideshow.php?action=update');
					} else { // If it did not run OK.
						trigger_error('You could not be registered due to a system error. We apologize for any inconvenience.');
					}					
			
		} // End of $rows == 0 IF.
	
	} else { // The document name is already in the database			
			$errors[] = 'The slideshow name you gave is already in the database';						
		
	} // End of $rows == 0 IF.

} // End of empty($errors) IF.
