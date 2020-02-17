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
	$errors[] = 'Please enter a valid Link Text for this product image!';
}



//Added so that at least an update will be made
$data['modified'] = "NOW()";

//Check the pics that has been selected by the user
if ((!isset($_FILES['product_pics'])) || !(is_file($_FILES['product_pics']['tmp_name']))){
	//A picture is not selected
	$change_pics = false;
} else {
	$change_pics = true;
}

//Used for my hidden text
if (isset($_POST['product_id'])){
	$product = $_POST['product_id'];
} else {
	$errors[] = 'Your request could not be completed! Please try reloading the pages';
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
		if (!((preg_match('/^image\/p?jpeg$/i', $_FILES['product_pics']['type']) or
		preg_match('/^image\/gif$/i', $_FILES['product_pics']['type']) or
		preg_match('/^image\/(x-)?png$/i', $_FILES['product_pics']['type']))))
		{
			$errors[] = 'Please submit a JPEG, GIF, or PNG image file.';
		}
	}
}


if (empty($errors)) { // If everything's OK...
	
	// Check if the document name is in the database
	$query = "SELECT name FROM product WHERE name='".$db->escape_data($data['name'])."' AND id <> '$product'";
	$rows = $db->total_affected_rows($query);

	if ($rows == 0) { // No problems! The product name is not in the database
	
		if ($change_pics){
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
					
					$value = $db->update_query("product",$data,"id=$product");
					
			
					if ($value >= 1) { // If it ran OK.
						
						$categories = $_POST['category'];
						$query = "DELETE FROM catproduct WHERE product_id = '$product'";
						$result = $db->delete_row($query);
						if (isset($categories)){
							$cat['product_id'] = $product;
							foreach ($categories as $category){
								$cat['category_id'] = $category;
								$value =$db->insert_query("catproduct",$cat);
							}
						}
						//delete the old_picture
						unlink('img/product/'.$old_picture);
						redirect('dashboard_product.php?action=update');
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
				$value = $db->update_query("product",$data,"id=$product");
					
			
					if ($value >= 1) { // If it ran OK.

						$categories = $_POST['category'];
						$query = "DELETE FROM catproduct WHERE product_id = '$product'";
						$result = $db->delete_row($query);
						if (isset($categories)){
							$cat['product_id'] = $product;
							foreach ($categories as $category){
								$cat['category_id'] = $category;
								$value =$db->insert_query("catproduct",$cat);
							}
						}
						redirect('dashboard_product.php?action=update');
					} else { // If it did not run OK.
						trigger_error('You could not be registered due to a system error. We apologize for any inconvenience.');
					}					
			
		} // End of $rows == 0 IF.
	
	} else { // The document name is already in the database			
			$errors[] = 'The product name you gave is already in the database';						
		
	} // End of $rows == 0 IF.

} // End of empty($errors) IF.
