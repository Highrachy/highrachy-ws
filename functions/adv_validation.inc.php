<?php

function whole_number($value){
	if (PHP_VERSION >= 5.2)
		return filter_var($value, FILTER_VALIDATE_INT);
	else return is_int($value);

}

function decimal_number($value){
	if (PHP_VERSION >= 5.2)
		return filter_var($value, FILTER_VALIDATE_FLOAT);
	else return is_float($value);

}


function email_exist($email){
        $email_error = false;
        $Email = htmlspecialchars(stripslashes(strip_tags(trim($email))));
        if ($Email == '') { $email_error = true; }
        elseif (!eregi('^([a-zA-Z0-9._-])+@([a-zA-Z0-9._-])+\.([a-zA-Z0-9._-])([a-zA-Z0-9._-])+', $Email)) {
			 $email_error = true; }
        else {
        list($Email, $domain) = split('@', $Email, 2);
                if (!checkdnsrr($domain, 'MX')) { $email_error = true; }
                else {
                $array = array($Email, $domain);
                $Email = implode('@', $array);
                }
        }

        if (email_error) { return false; } else{return true;}
}


function is_valid_date($date){
        #05/12/2109
        #05-12-0009
        #05.12.9909
        #05.12.99
        return preg_match('/^((0?[1-9]|1[012])[- /.](0?[1-9]|[12][0-9]|3[01])[- /.][0-9]?[0-9]?[0-9]{2})*$/', $date);
}


function is_valid_date2($date){
        #2009/12/11
        #2009-12-11
        #2009.12.11
        #09.12.11
        return preg_match('#^([0-9]?[0-9]?[0-9]{2}[- /.](0?[1-9]|1[012])[- /.](0?[1-9]|[12][0-9]|3[01]))*$#', $date);
}

/*------------------------------------------------------------------------------------------------*\
  Function:   is_valid_date
  Purpose:    checks a date is valid / is later than current date
  Parameters: $month       - an integer between 1 and 12
              $day         - an integer between 1 and 31 (depending on month)
              $year        - a 4-digit integer value
              $is_later_date - a boolean value. If true, the function verifies the date being passed 
                               in is LATER than the current date.
\*------------------------------------------------------------------------------------------------*/
function is_valid_date($month, $day, $year, $is_later_date)
{
  // depending on the year, calculate the number of days in the month
  if ($year % 4 == 0)      // LEAP YEAR 
    $days_in_month = array(31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
  else
    $days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);


  // first, check the incoming month and year are valid. 
  if (!$month || !$day || !$year) return false;
  if (1 > $month || $month > 12)  return false;
  if ($year < 0)                  return false;
  if (1 > $day || $day > $days_in_month[$month-1]) return false;


  // if required, verify the incoming date is LATER than the current date.
  if ($is_later_date)
  {    
    // get current date
    $today = date("U");
    $date = mktime(0, 0, 0, $month, $day, $year);
    if ($date < $today)
      return false;
  }

  return true;
}

function is_valid_colour($color){
        #CCC
        #CCCCC
        #FFFFF
        return preg_match('/^#(?:(?:[a-f0-9]{3}){1,2})$/i', $color);
}

function is_valid_ip($ip)
{
	if (PHP_VERSION >= 5.2)
	  return filter_var($ip, FILTER_VALIDATE_IP);
	  else return preg_match('/^(([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]).){3}([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/',$ip);
}

function is_valid_url($url)
{
  return filter_var($url, FILTER_VALIDATE_URL);
}

function url_exist($url)
{
		$url = @parse_url($url);

		if (!$url)
		{
				return false;
		}

		$url = array_map('trim', $url);
		$url['port'] = (!isset($url['port'])) ? 80 : (int)$url['port'];
		$path = (isset($url['path'])) ? $url['path'] : '';

		if ($path == '')
		{
				$path = '/';
		}

		$path .= (isset($url['query'])) ? '?$url[query]' : '';

		if (isset($url['host']) AND $url['host'] != @gethostbyname($url['host']))
		{
				if (PHP_VERSION >= 5)
				{
						$headers = @get_headers('$url[scheme]://$url[host]:$url[port]$path');
				}
				else
				{
						$fp = fsockopen($url['host'], $url['port'], $errno, $errstr, 30);

						if (!$fp)
						{
								return false;
						}
						fputs($fp, 'HEAD $path HTTP/1.1\r\nHost: $url[host]\r\n\r\n');
						$headers = fread($fp, 4096);
						fclose($fp);
				}
				$headers = (is_array($headers)) ? implode('\n', $headers) : $headers;
				return (bool)preg_match('#^HTTP/.*\s+[(200|301|302)]+\s#i', $headers);
		}
		return false;
}


?>