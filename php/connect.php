<?php 
session_start();
//connect.php
$server	    = 'localhost';
$username	= 'antonius';
$password	= 'thetrityfc';
$database	= 'waria';

if(!mysql_connect($server, $username, $password))
{
 	exit('Error: could not establish database connection');
}
if(!mysql_select_db($database))
{
 	exit('Error: could not select the database');
}
?>