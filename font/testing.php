 <?php
            //Variables for connecting to your database.
            //These variable values come from your hosting account.
            $hostname = "highrachy.db.7767639.hostedresource.com";
            $username = "highrachy";
            $dbname = "highrachy";

            //These variable values need to be changed by you before deploying
            $password = "Highrachy@1234";
            $usertable = "icons";
            $yourfield = "your_field";
        
            //Connecting to your database
            mysql_connect($hostname, $username, $password) OR DIE ("Unable to 
            connect to database! Please try again later.");
            mysql_select_db($dbname);

            //Fetching from your database table.
            $query = "SELECT * FROM $usertable";
            $result = mysql_query($query);

            if ($result) {
                while($row = mysql_fetch_array($result)) {
					echo $row['name'];
				}
			}
				
?>