<?php
include('includes/config.inc.php');
require(DB);

// Call the backup function for all tables in a DB
//backup_tables(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
//restore(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME,'backup/db_1365684856_all.sql');
backup_website();
// Backup the table and save it to a sql file
function backup_tables($host,$user,$pass,$name,$tables="*",$filess="backup/db_")
{
		// Set the suffix of the backup filename
		if ($tables == '*') {
			$extname = 'all';
		}else{
			$extname = str_replace(",", "_", $tables);
			$extname = str_replace(" ", "_", $extname);
		}
		
		// Generate the filename for the backup file
		$filess = $filess . time() . '_' . $extname;

		
		//Connect to the database
		$link = mysql_connect($host,$user,$pass);
		mysql_select_db($name,$link);
	    $return = "";	

		// Get all of the tables
		if($tables == '*') {
			$tables = array();
			$result = mysql_query('SHOW TABLES');
			while($row = mysql_fetch_row($result)) {
				$tables[] = $row[0];
			}
		} else {
			if (is_array($tables)) {
				$tables = explode(',', $tables);
			}
	}

		// Cycle through each provided table
		foreach($tables as $table) {
			$result = mysql_query('SELECT * FROM '.$table);
			$num_fields = mysql_num_fields($result);
		
			// First part of the output - remove the table
			$return .= 'DROP TABLE ' . $table . ';<|||||||>';

			// Second part of the output - create table
			$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
			$return .= "\n\n" . $row2[1] . ";<|||||||>\n\n";

			// Third part of the output - insert values into new table
			for ($i = 0; $i < $num_fields; $i++) {
				while($row = mysql_fetch_row($result)) {
					$return.= 'INSERT INTO '.$table.' VALUES(';
					for($j=0; $j<$num_fields; $j++) {
						$row[$j] = addslashes($row[$j]);
						$row[$j] = preg_replace("/\n/","\\n",$row[$j]);
						if (isset($row[$j])) { 
$return .= '"' . $row[$j] . '"'; 
} else { 
$return .= '""'; 
}
						if ($j<($num_fields-1)) { 
$return.= ','; 
}
					}
					$return.= ");<|||||||>\n";
				}
			}
			$return.="\n\n\n";
		}

		// Save the sql file
		$handle = fopen($filess.'.sql','w+');
		fwrite($handle,$return);
		fclose($handle);

	// Close MySQL Connection
	mysql_close();
} 



function restore($DBhost,$DBuser,$DBpass,$DBName,$filename)
{	
	$sqlErrorText = '';
	$sqlErrorCode = 0;
	$sqlStmt      = '';
	
	// Restore the backup
	$con = mysql_connect($DBhost,$DBuser,$DBpass);
	if ($con !== false){
	  // Load and explode the sql file
	  mysql_select_db("$DBName");
	  $f = fopen($filename,"r+");
	  $sqlFile = fread($f,filesize($filename));
	  $sqlArray = explode(';<|||||||>',$sqlFile);
			  
	  // Process the sql file by statements
	  foreach ($sqlArray as $stmt) {
		if (strlen($stmt)>3){
			 $result = mysql_query($stmt);
		}
	  }
	}
	
	// Print message (error or success)
	if ($sqlErrorCode == 0){
	   print("Database restored successfully!<br>\n");
	   print("Backup used: " . $filename . "<br>\n");
	} else {
	   print("An error occurred while restoring backup!<br><br>\n");
	   print("Error code: $sqlErrorCode<br>\n");
	   print("Error text: $sqlErrorText<br>\n");
	   print("Statement:<br/> $sqlStmt<br>");
	}
	
	// Close the connection
	mysql_close();
}

function backup_website(){
	$filess = 'backup/backup_'. time();
	require_once('functions/pclzip.lib.php');
	$archive = new PclZip($filess.'.zip');
	$v_dir = dirname(__FILE__); // or dirname(getcwd());
	$v_remove = $v_dir;
	$v_list = $archive->create($v_dir, PCLZIP_OPT_REMOVE_PATH, $v_remove);
	if ($v_list == 0) {
		die("Error : ".$archive->errorInfo(true));
	}	
	
}


?>