<?php
define('PATH', 'img/slideshow/');
// Check for the product name
if (preg_match ('/^[A-Z0-9 \'.-]{2,60}$/i', $_POST['name'])) {
	$data['name'] = $_POST['name'];
} else {
	$errors[] = 'Please enter name you wish to give the image!';
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
	

if (!isset($_FILES['slideshow_pics']) || !(is_file($_FILES['slideshow_pics']['tmp_name']))){
	$errors[] = 'Please Select a picture for this Slideshow';
} else {
	if (!((preg_match('/^image\/p?jpeg$/i', $_FILES['slideshow_pics']['type']) or
    preg_match('/^image\/gif$/i', $_FILES['slideshow_pics']['type']) or
    preg_match('/^image\/(x-)?png$/i', $_FILES['slideshow_pics']['type']))))
	{
	  $errors[] = 'Please submit a JPEG, GIF, or PNG image file.';
	}
}

$data['show_home'] = $_POST['show_home'];

if (empty($errors)) { // If everything's OK...

    // Check if the document name is in the database
	$query = "SELECT name FROM slideshow WHERE name='".$data['name']."'";
	$rows = $db->total_affected_rows($query);

	if ($rows == 0) { // No problems! The product name is not in the database
	//Set the overall base name for the files
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
				
				$value = $db->insert_query("slideshow",$data);
				
		
				if ($value >= 1) { // If it ran OK.
					redirect('dashboard_slideshow.php?action=add');	
				} else { // If it did not run OK.
					trigger_error('You could not be registered due to a system error. We apologize for any inconvenience.');
				}
			} else {
				$errors[] = "Could not move the file!";
			}
		
		} else { // The file could not be uploaded
			$errors[] = "Could not save file as $basename!";
		}
		
		
	} else { // The document name is already in the database			
			$errors[] = 'The slideshow name you gave is already in the database';						
		
	} // End of $rows == 0 IF.

} // End of empty($errors) IF.
