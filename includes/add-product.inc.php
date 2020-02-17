<?php
define('PATH', 'img/product/');

// Check for the product name
if (!empty($_POST['name'])) {
	$data['name'] = $_POST['name'];
} else {
	$errors[] = 'Please enter name you wish to give the image!';
}

if (preg_match ('/^[A-Z0-9 \'.-]{2,50}$/i', $_POST['price'])) {
	$data['price'] = $_POST['price'];
} else {
	$errors[] = 'Please enter a valid price!';
}

if (!isset($_FILES['product_pics']) || !(is_file($_FILES['product_pics']['tmp_name']))){
	$errors[] = 'Please Select a picture for this product';
} else {
	if (!((preg_match('/^image\/p?jpeg$/i', $_FILES['product_pics']['type']) or
    preg_match('/^image\/gif$/i', $_FILES['product_pics']['type']) or
    preg_match('/^image\/(x-)?png$/i', $_FILES['product_pics']['type']))))
	{
	  $errors[] = 'Please submit a JPEG, GIF, or PNG image file.';
	}
}


if (empty($errors)) { // If everything's OK...

    // Check if the document name is in the database
	$query = "SELECT name FROM product WHERE name='".$db->escape_data($data['name'])."'";
	$rows = $db->total_affected_rows($query);

	if ($rows == 0) { // No problems! The product name is not in the database
	//Set the overall base name for the files
		$basename = 'product_'.time();
		
		// Pick a file extension
		if (preg_match('/^image\/p?jpeg$/i', $_FILES['product_pics']['type']))
		{
		  $ext = '.jpg';
		}
		else if (preg_match('/^image\/gif$/i', $_FILES['product_pics']['type']))
		{
		  $ext = '.gif';
		}
		else if (preg_match('/^image\/(x-)?png$/i',
			$_FILES['product_pics']['type']))
		{
		  $ext = '.png';
		}
		else
		{
		  $ext = '.unknown';
		}
		
		$path = PATH.$basename.$ext;
		
		if (is_uploaded_file($_FILES['product_pics']['tmp_name'])){ 
			if (move_uploaded_file($_FILES['product_pics']['tmp_name'],$path)){
				
				$data['product_pics'] = $basename.$ext;
				
				$value = $db->insert_query("product",$data);				
		
				if ($value >= 1) { // If it ran OK.
					if (isset($_POST['category']) && !(empty($_POST['category']))){
						$categories = $_POST['category'];
						$cat['product_id'] = $value;
						foreach ($categories as $category){
							$cat['category_id'] = $category;
							$value =$db->insert_query("catproduct",$cat);
						}
					}
					redirect('dashboard_product.php?action=add');	
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
			$errors[] = 'The product name you gave is already in the database';						
		
	} // End of $rows == 0 IF.

} // End of empty($errors) IF.
