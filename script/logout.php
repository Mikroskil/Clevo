<?php
session_start();
if($_SESSION['signed_in'] == true)
{
	//unset all variables
	unset($_SESSION);
    session_unset();
    session_destroy();

	header("Location:../php/home.php");
}
?>