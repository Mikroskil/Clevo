<?php
session_start();
require("config.php");

$sql = "SELECT 
						user_id,
						user_name,
						user_level
					FROM
						users
					WHERE
						user_name = '" . mysql_real_escape_string($_POST['user']) . "'
					AND
						user_pass = '" . sha1($_POST['password']) . "'";
$result = mysql_query($sql);

if($result)
{
	if(mysql_num_rows($result) > 0)
	{
		$_SESSION['signed_in'] = true;
		
		while($row = mysql_fetch_assoc($result))
		{
			$_SESSION['user_id'] 	= $row['user_id'];
			$_SESSION['user_name'] 	= $row['user_name'];
			$_SESSION['user_level'] = $row['user_level'];
		}
		
		$sql2 = mysql_query("SELECT * FROM customer WHERE Username = '$_POST[user]' AND Password = '$_POST[password]'");
		$data = mysql_fetch_array($sql2);
		$hasil = mysql_num_rows($sql2);

		if(!empty($hasil))
		{
			$_SESSION['Nama']=$data['Nama']; 
			$_SESSION['cust']=$data['id_customer'];
			$_SESSION['user']=$data['Username']; 
			$_SESSION['password']=$data['Password'];

			
			$sql2 = "SELECT * FROM customer WHERE Username = '$_POST[user]' AND Password = '$_POST[password]'";
								
			header('location:../php/home.php');
		}
	}
}
else
{
	header('location:../php/failed_to_login.php');
}
?>