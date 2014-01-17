<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "wisata";
$connect = mysql_connect($host,$user,$pass) or die("Koneksi ke database server gagal.");
$pilih_db = mysql_select_db($db) or die("Database tidak ditemukan.");
?>