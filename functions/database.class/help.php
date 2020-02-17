<?php
	//Used to insert
	// special cases supported for update: NULL and NOW()
	//$data['author'] = "NULL";// it knows to convert NULL and NOW() from a string
	// also supports increment to the current database value
	// will also work with a negative number. eg; INCREMENT(
	//$data['email'] = "harunpopson@yahoo.com";
	//	$data['password'] = md5("123456");
	//	$value = $db->insert_query("admin",$data);

	//Used to update
	//$data['news_date'] = "NOW()";
	//$data['email'] = "harunpopson@yahoo.com";
	//$value = $db->update_query("admin",$data,"admin_id=1");
	
	//To Delete
	//$sql = "DELETE FROM news WHERE id = '5' LIMIT 1";
	//$db->delete_row($sql);
	
	//Fetch All rows
	//$query = "SELECT id, name,content,picture FROM edit WHERE link = '$link_id'";
	//$rows = $db->fetch_all_row($query);

	//foreach ($rows as $row){
	//			$id[] = $row['id'];
	//			$content[] = $row['content'];
	//			$name[] = $row['name'];
	//			$picture[] = $row['picture'];
	//	}
	
	//Fetch First rows
	//$query = "SELECT id, name,content,picture FROM edit WHERE link = '$link_id'";
	//$rows = $db->fetch_first_row($query);
	
	//Get Affected Row
	//$data['email'] = "harunpopson@yahoo.com";
//	$data['password'] = md5("123456");
//	$me =$db->total_affected_rows();


	
