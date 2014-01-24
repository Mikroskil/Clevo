<?php
//signout.php
include 'connect.php';
include 'header.php';

echo '<h2>Sign out</h2>';

//check if user if signed in
if($_SESSION['signed_in'] == true)
{
	//unset all variables
	unset($_SESSION);
    session_unset();
    session_destroy();

	header('location:http://localhost/wisata/php/forum/home.php');
}
else
{
	echo 'You are not signed in. Would you <a href="signin.php">like to</a>?';
}

include 'footer.php';
?>