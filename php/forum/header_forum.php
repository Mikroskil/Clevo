<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
 	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 	<meta name="description" content="A short description." />
 	<meta name="keywords" content="put, keywords, here" />
 	<title>Wisata Ransel Indonesia</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <style type="text/css">
	table a{
		text-decoration: none;
		font-weight: bolder;
	}
	table a:hover {
		color: #CC1F26;
	}
    </style>
	
</head>
<body>
	<h1> Forum Wisata Ransel Indonesia </h1>
	<div id="wrapper">
	<div id="menu">
		<a class="item" href="/wisata/php/forum/home.php"><strong>Home</strong></a> 
		<a class="item" href="/wisata/php/forum/index.php"><strong>Forum</strong></a> 
		
		<?php
		if(!empty($_SESSION['signed_in']))
		{
			if($_SESSION['user_level']==1){
			echo '<a class="item" href="/wisata/php/forum/create_cat.php"><strong>Buat Kategori</strong></a>';
			}
		}
		?>
		
        <div id="userbar">
 	  	<?php
		//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		if(!empty($_SESSION['signed_in']))
		{
			echo 'Hello <b>' . htmlentities($_SESSION['user_name']) . '</b>. Bukan Anda? <a class="item" href="signout.php">Keluar</a>';
		}
		else
		{
			echo '<a class="item" href="signin.php">Login</a> ';
			echo '<a class="item" href="../daftar.php">Sign up</a>';
		}
		?>
 	  	</div>
	</div>
		
		<div id="content">
