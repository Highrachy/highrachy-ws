<?php 
$errors = array();
// Validate the email address:
if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	$email = $_POST['email'];
} else {
	$errors[] = 'Enter your email!';
}

// Validate the password:
if (!empty($_POST['password'])) {
	$password = $_POST['password'];
} else {
	$errors[] = 'Enter your password!';
}

if (empty($errors)) { // OK to proceed!

	// Query the database:
	// Query the database:
	$query = "SELECT client_type,client_id,company_name,contact_name FROM clients WHERE (email ='$email' AND password ='"  . md5($password) .  "') AND active IS NULL";		
	$row = $db->fetch_first_row($query);
	$rows = $db->total_affected_rows();

	
	if ($rows == 1) { // A match was made.
		
		//Allocate them into a session
		
		//Get the contact name
		$_SESSION['name']= $row['name'];
		
		//Check if the user has tried to access a page before
		if (isset($_GET['continue'])){
			$url = $_GET['continue'];
			header("Location:$url");
			exit();
		} else {	
			//Redirect the user to the dashboard
			$url = BASE_URL . 'dashboard.php'; // Define the URL:
			header("Location: $url");
			exit(); // Quit the script.
		}

	} else { // No match was made.
	
	 //The person has entered an invalid information
	 $errors[] = 'Invalid username or password.';	
	}//End of no match made

	
} // End of $errors IF.
// Omit the closing PHP tag to avoid 'headers already sent' errors!