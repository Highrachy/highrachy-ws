<?php

function is_required($field_name){
	#check if a field is required
	if (!isset($field_name) || $field_name == "")
		return false;
	else return true;
	
}

function is_valid_email($email){
	#checks if an email is valid.
	if (PHP_VERSION >= 5.2)
  	return filter_var($email, FILTER_VALIDATE_EMAIL);
	else return preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i', $email);
}

function is_number($value){
		#Check if the value is a valid number
        return is_numeric($value);	
}

function is_alphanum($string)
{
	#return if it is an alphabet or number
    return ctype_alnum ($string);
}


function is_valid_username($username,$length="6-50"){
		list($start, $end) = explode("-", $length);
		if (!is_number($start)) $start = 6;
		if (!is_number($end)) $start = 50;
        #alphabet, digit, @, _ and . are allow. Minimum 6 character. Maximum 50 characters (email address may be more)
        return preg_match('/^[a-zA-Z\d_@.]{'.$start.','.$end.'}$/i', $username);
}

function strong_password($password){
        #must contain 8 characters, 1 uppercase, 1 lowercase and 1 number
        return preg_match('/^(?=^.{8,}$)((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.*$/', $password);
}

function same($pass1,$pass2){		
		#compares two values together
		 if ($pass1 != $pass2) return false; else return true;
}

function minimum_length($name,$length=1){
		#if the length is not a number, or less than 1 assume that the length is 1
		if ((!is_numeric($length)) or ($length < 1)) $length = 1;
		
		#Do the comparison
		if (strlen($name) < $length) return false;
		else return true;
}

function maximum_length($name,$length=1){
		#if the length is not a number, or less than 1 assume that the length is 1
		if ((!is_numeric($length)) or ($length < 1)) $length = 1;
		
		#Do the comparison
		if (strlen($name) > $length) return false;
		else return true;
}

function check_range($name,$length="0-10"){
		#List the value returned from the array into $start and end
		list($start, $end) = explode("-", $length);
		if (!is_number($start)) $start = 0;
		if (!is_number($end)) $start = 10;
              if (strlen($name) < $start || strlen($name) > $end)	
			  return false;
			  else return true;
}

function is_valid_image($picture){
		if (upload_file($picture)) {
			if (!((preg_match('/^image\/p?jpeg$/i', $_FILES[$picture]['type']) or
			preg_match('/^image\/gif$/i', $_FILES[$picture]['type']) or
			preg_match('/^image\/(x-)?png$/i', $_FILES[$picture]['type']))))
			return false; else return true;
		}
		else return false;
}

function is_valid_file($file){
	if ((!isset($_FILES[$file])) || !(is_file($_FILES[$file]['tmp_name'])))
	return false; else return true;
		
}
function form_method($method="POST"){
	#compare the source of submission
	#if(strcmp($_SERVER['REQUEST_METHOD'],'POST')==0)
	#	return $_POST;
	#else return $_GET;
	
	if ($method != "POST") return $_GET;
	else return $_POST;
	
}
function validate($name,$command,$method="POST"){
	
	$length = "";
	#if = is in the command, assign it into the command and length
	if (strpos($command,"=") !==  false){
		list($command, $length) = explode("=", $command);	
	}
	
	$form_variables = form_method($method);
	//Get the submitted form
	if(isset($form_variables[$name])){
	
	#Check if to use $_POST OR $_GET
    $input_value = $form_variables[$name];
	
	#Assume the $result returned is true
	$result=true;
		switch($command)
		{
			case 'req':
						{
							$result = is_required($input_value);
							break;
						}

			case 'email':
						{
							$result = is_valid_email($input_value);
							break;
						}
			case 'num':
						{
							$result = is_number($input_value);
							break;
						}

			case 'alphanum':
						{
							$result = is_alphanum($input_value);
							break;
						}
			case 'username':
						{
							$result = is_valid_username($input_value,$length);
							break;
						}

			case 'password':
						{
							$result = strong_password($input_value);
							break;
						}
						
			case 'same':
						{
							$result = same($input_value,$form_variables[$length]);
							break;
						}			
			case 'minlen':
						{
							$result = minimum_length($input_value,$length);
							break;
						}
						
			case 'maxlen':
						{
							$result = maximum_length($input_value,$length);
							break;
						}
						
			case 'range':
						{
							$result = check_range($input_value,$length);
							break;
						}
						
			case 'image':
						{
							$result = is_valid_image($input_value);
							break;
						}
			
			case 'upload':
						{
							$result = is_valid_file($input_value);
							break;
						}
			default: $result = false;
		 
		}//switch
		return $result;
	}
}

function assign($name,$command="",$error="",$method="POST"){
	
	global $errors;
	if ($command == "") $command = $name;
	if ($error == "") $error = "Please enter a valid ".ucfirst($name);
	if (validate($name,$command,$method)){ #if the Validation is correct
		#get the form method
		$form_variables = form_method($method);
		
		return $form_variables[$name];
	} else { #if the validation fails
		$errors[] = $error;
	}
	
}

function sanitize_number($str)
{
        #letters and space only
        return preg_match('/[^0-9]/', '', $str);
}

function sanitize_email($email){
	#removes illegal characters from the email
	if (PHP_VERSION >= 5.2)
	return filter_var($url, FILTER_SANITIZE_EMAIL);
	else return  preg_replace( '((?:\n|\r|\t|%0A|%0D|%08|%09)+)i' , '', $email);
}

function sanitize_alphanum($string)
{
		#“HELLO! Do we have 90 idiots running around here?” => “HELLO Do we have 90 idiots running around here”
        return preg_replace('/[^a-zA-Z0-9]/', '', $string);
}

?>
<form name='test' method='POST' action='' accept-charset='UTF-8'>
<table cellspacing='0' cellpadding='10' border='0' bordercolor='#000000'>
   <tr>
      <td>
         <table cellspacing='2' cellpadding='2' border='0'>
            <tr>
               <td align='right' class='normal_field'>Name</td>
               <td class='element_label'>
                  <input type='text' name='name' size='20'>
               </td>
            </tr>
            <tr>
               <td align='right' class='normal_field'>Email</td>
               <td class='element_label'>
                  <input type='text' name='email' size='20'>
               </td>
            </tr>
            <tr>
               <td align='right' class='normal_field'>Address</td>
               <td class='element_label'>
                  <input type='text' name='Address' size='20'>
               </td>
            </tr>
            <tr>
               <td align='right' class='normal_field'>City</td>
               <td class='element_label'>
                  <input type='text' name='City' size='20'>
               </td>
            </tr>
            <tr>
               <td colspan='2' align='left' valign='bottom' class='normal_field'>Comments</td>
            </tr>
            <tr>
               <td>
               </td>
               <td class='element_label'>
<textarea name='Comments' cols='50' rows='8'></textarea>
               </td>
            </tr>
            <tr>
               <td colspan='2' align='center'>
                  <input type='submit' name='Submit' value='Submit'>
               </td>
            </tr>
         </table>
      </td>
   </tr>
</table>
<?php 
	# - All Functions
		# 1.   is_required($field_name)
		# 2.   is_valid_email($email)
		# 3.   is_number($value)
		# 4.   is_alphanum($string)
		# 5.   is_valid_username($username,$length="6-50")
		# 6.   strong_password($password)
		# 7.   same($pass1,$pass2)
		# 8.   minimum_length($name,$length=1)
		# 9.   maximum_length($name,$length=1)
		# 10.  check_range($name,$length="0-10")
		# 11.  is_valid_image($picture)
		# 12.  is_valid_file($file)
	
	# - validate($name,$command)
	# - command
		# 1.  req        -  is_required($field_name)
		# 2.  email      -  is_valid_email($email)
		# 3.  num        -  is_number($value)
		# 4.  alphanum   -  is_alphanum($string)
		# 5.  username   -  is_valid_username($username,$length="6-50")
		# 6.  password   -  strong_password($password)
		# 7.  same       -  same($pass1,$pass2)
		# 8.  minlen     -  minimum_length($name,$length=1)
		# 9.  maxlen     -  maximum_length($name,$length=1)
		# 10. range      -  check_range($name,$length="0-10")
		# 11. image      -  is_valid_image($picture)
		# 12. file       -  is_valid_file($file)
	
	
	$data['name'] = assign('name','num','Invalid Number',"get");
	$data['email'] = "";
	
	
	echo "Your name is ".$data['name']." and Your email is ".$data['email'];
	echo "<br><br>The error is ".$errors[0];
?>
