<?php
// Set the database access information as constants:
if ($local)
{
	DEFINE ('DB_HOST', 'localhost');
	DEFINE ('DB_USER', 'root');
	DEFINE ('DB_PASSWORD', '');
	DEFINE ('DB_NAME', 'highrachy_rebrand');
}else{
	DEFINE ('DB_HOST', 'highrachy.db.7767639.hostedresource.com');
	DEFINE ('DB_USER', 'highrachy');
	DEFINE ('DB_PASSWORD', 'Highrachy@1234');
	DEFINE ('DB_NAME', 'highrachy');
}