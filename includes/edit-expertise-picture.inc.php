<?php
define('PATH', 'img/expertise/');

if (!isset($_FILES['pics']) || !(is_file($_FILES['pics']['tmp_name']))){
	$errors[] = 'Please select a picture for this page';
} else {
	if (!((preg_match('/^image\/p?jpeg$/i', $_FILES['pics']['type']) or
    preg_match('/^image\/gif$/i', $_FILES['pics']['type']) or
    preg_match('/^image\/(x-)?png$/i', $_FILES['pics']['type']))))
	{
	  $errors[] = 'Please submit a JPEG, GIF, or PNG image file.';
	}
}

if (isset($_POST['old_pics']))
$old_pics = $_POST['old_pics'];

if (empty($errors)) { // If everything's OK...

	//Set the overall base name for the files
		$basename = 'expertise_'.time();
		
		// Pick a file extension
		if (preg_match('/^image\/p?jpeg$/i', $_FILES['pics']['type']))
		{
		  $ext = '.jpg';
		}
		else if (preg_match('/^image\/gif$/i', $_FILES['pics']['type']))
		{
		  $ext = '.gif';
		}
		else if (preg_match('/^image\/(x-)?png$/i',
			$_FILES['pics']['type']))
		{
		  $ext = '.png';
		}
		else
		{
		  $ext = '.unknown';
		}
		
		$path = PATH.$basename.$ext;
		
		if (is_uploaded_file($_FILES['pics']['tmp_name'])){ 
			if (move_uploaded_file($_FILES['pics']['tmp_name'],$path)){
				
				$data['pics'] = $basename.$ext;
				
				$value = $db->update_query("expertise",$data,"id=$id");
				
		
				if ($value >= 1) { // If it ran OK.
					if (isset($old_pics) && ($old_pics != ""))
					unlink('img/expertise/'.$old_pics);
					
					redirect('expertise_content.php?pics=add&s='.$id);	
				} else { // If it did not run OK.
					trigger_error('You could not be registered due to a system error. We apologize for any inconvenience.');
				}
			} else {
				$errors[] = "Could not move the file!";
			}
		
		} else { // The file could not be uploaded
			$errors[] = "Could not save file as $basename!";
		}


} // End of empty($errors) IF.
