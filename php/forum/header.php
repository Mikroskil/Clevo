<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
 	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 	<meta name="description" content="A short description." />
 	<meta name="keywords" content="put, keywords, here" />
 	<title>Wisata Ransel Indonesia</title>
	<link rel="stylesheet" href="style.css" type="text/css">
    <script type="text/javascript"
           src="http://maps.google.com/maps/api/js?sensor=false"></script>
</head>
<body>
<div id="wrapper">
<header>
<h1><font color="#000000">WISATA RANSEL INDONESIA</font></h1>
</header>
	
	<div id="menu">
        
		<a class="item" href="/wisata/php/home.php">HOME</a> -
		<a class="item" href="/wisata/php/forum/news.php">NEWS</a> -
		<a class="item" href="/wisata/php/forum/index.php">FORUM</a> -
        <a class="item" href="/wisata/php/forum/peta.php">MAPS</a>
		
		<div id="userbar">
		<?php
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		if($_SESSION['signed_in'])
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
        