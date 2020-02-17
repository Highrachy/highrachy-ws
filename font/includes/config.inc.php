<?php 
# ******************** #
# ***** SETTINGS ***** #

// Errors are emailed here.
$contact_email = 'harunpopson@gmail.com'; 
if (!session_start())
session_start();
// Determine whether we're working on a local server
// or on the real server:
if (stristr($_SERVER['HTTP_HOST'], 'local') || (substr($_SERVER['HTTP_HOST'], 0, 7) == '192.168')) {
	$local = TRUE;
} else {
	$local = FALSE;
}

// Determine location of files and the URL of the site:
// Allow for development on different servers.
if ($local) {

	// Always debug when running locally:
	$debug = TRUE;
	
	// Define the constants:
	define ('BASE_URI', './');
	define ('BASE_URL',	'http://localhost/Highrachy/');
	define ('DB', 'includes/mysql.inc.php');
	
} else {

	define ('BASE_URI', './');
	define ('BASE_URL',	'http://www.highrachy.com/');
	define ('DB', 'includes/mysql.inc.php');
	
}
	
/* 
 *	Most important setting...
 *	The $debug variable is used to set error management.
 *	To debug a specific page, add this to the index.php page:

if ($p == 'thismodule') $debug = TRUE;
require_once('./includes/config.inc.php');

 *	To debug the entire site, do

$debug = TRUE;

 *	before this next conditional.
 */

// Assume debugging is off.
 $debug = TRUE; //Remove this when you are through
if (!isset($debug)) {
	$debug = FALSE;
}

# ***** SETTINGS ***** #
# ******************** #


# **************************** #
# ***** ERROR MANAGEMENT ***** #

// Create the error handler.
function my_error_handler ($e_number, $e_message, $e_file, $e_line, $e_vars) {

	global $debug, $contact_email;
	
	// Build the error message.
	$message = "An error occurred in script '$e_file' on line $e_line: \n<br />$e_message\n<br />";
	
	// Add the date and time.
	$message .= "Date/Time: " . date('n-j-Y H:i:s') . "\n<br />";
	
	// Append $e_vars to the $message.
	$message .= "<pre>" . print_r ($e_vars, 1) . "</pre>\n<br />";
	
	if ($debug) { // Show the error.
	
		echo '<p class="error">' . $message . '</p>';
		
	} else { 
	
		// Log the error:
		error_log ($message, 1, $contact_email); // Send email.
		
		// Only print an error message if the error isn't a notice or strict.
		if ( ($e_number != E_NOTICE) && ($e_number < 2048)) {
			echo '<p class="error">A system error occurred. We apologize for the inconvenience.</p>';
		}
		
	} // End of $debug IF.

} // End of my_error_handler() definition.

// Use my error handler:
set_error_handler ('my_error_handler');

# ***** ERROR MANAGEMENT ***** #
# **************************** #

function redirect($destination = 'login.php?err=2') {
		$url = BASE_URL . $destination; // Define the URL.
		header("Location: $url");
		exit(); // Quit the script.
} // End of redirect fucntion

function redirect_invalid_admin() {	
	// Check if the person is not the admin
	
	$destination = 'login.php?err=1';
	$current_page_URL =(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
	$current_page_URL .= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	//check if the $_SESSION client_type is set
	if (!((isset($_SESSION['name'])) && ($_SESSION['name'] != ""))){
		$url =  BASE_URL.$destination.'&continue='.$current_page_URL; // Define the URL.
		header("Location: $url");
		exit(); // Quit the script.
	}
	
} // End of redirect_invalid_admin() function.

// ************ REDIRECTION ************ //
// ****************************************** //

function alert(){
	global $errors, $success,$warning;
	
	 if (isset($errors)){
		$allerror = "";
		foreach($errors as $value){
			$allerror .= "$value <br>";
		}
		
		echo '<br><div class="alert alert-error alert-block"><h4>Error!</h4>'.$allerror.'</div>';
		
	}
	
	else if (isset($success)){
		echo '<div class="alert alert-success"><strong>Success! </strong>'.$success.'</div>';
		}
	
	else if (isset($warning)){
		echo '<div class="alert"><strong>Warning! </strong>'.$warning.'</div>';
	}
}

function top_link($page){
	global $sub;
	$top_link ="<div class='top_link'><a";
	if ($sub == "all") $top_link .= " class='selected'";
	$top_link .=" href='all-$page.php'>All ".ucfirst($page)."s </a> | <a";
	if ($sub == "add") $top_link .= " class='selected'";
	$top_link .=" href='add-$page.php'>Add ".ucfirst($page)."</a> | <a";
	if ($sub == "edit") $top_link .= " class='selected'";
	$top_link .=" href='edit-$page.php'>Edit ".ucfirst($page)."</a> | <a";
	if ($sub == "view") $top_link .= " class='selected'";
	$top_link .=" href='view-$page.php'>View ".ucfirst($page)."</a>  | <a";
	if ($sub == "delete") $top_link .= " class='selected'";
	$top_link .=" href='delete-$page.php'>Delete ".ucfirst($page)."</a></div><br>";	
	
	echo $top_link;
}
//Check if it is the dashboard
if ((isset($dashboard))&& $dashboard){
	//redirect_invalid_admin();
}

function more($text = "", $number= 0, $more=" ..."){
	//Strip off the tags in more for accurate number of text in it
	$more = strip_tags($more);
	
	//Get the total of original word
	$org_total = strip_tags(strlen($text));
	
	//Find the position of the last word by looking for the last space
	if(strrpos(strip_tags($text)," ",0))
		$f = strrpos(strip_tags($text)," ",0);
	else $f = $org_total;
	
	//Extract to that space
	$desc = substr(strip_tags($text),0,$f);
	
	//Get the total of extracted word
	$ext_total = strip_tags(strlen($desc));
	
	//Check if the number of string you want is less that the number of string you got 
	if ( (is_int($number) &&($number > 0))){
		
		//if the number of string you want is lesser, add a more text
		if (($ext_total > $number)){
			$desc = substr($desc,0, $number - strlen($more));
			$ff = strrpos(strip_tags($desc)," ",0);
			$desc = substr(strip_tags($desc),0,$ff) . $more;
		}
	}
	return $desc;
	}
?>
