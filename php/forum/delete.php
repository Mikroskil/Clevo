<?php
include 'connect.php';

$dihapus =  $_GET['baseby'];
$id = $_GET['id'];

if($dihapus=='topik'){
	$sql = "DELETE 
			FROM
				topics
			WHERE
				topic_id = '" . mysql_real_escape_string($id) . "'";
				
	$result = mysql_query($sql);

	if($result)
		echo "<script>history.back(1)</script>";
	else{
		echo "<script>alert('Gagal menghapus topik.'); history.back(1)</script>";
	}
}
elseif($dihapus=='komentar'){
	$sql = "DELETE 
			FROM
				posts
			WHERE
				post_id = '" . mysql_real_escape_string($id) . "'";
				
	$result = mysql_query($sql);

	if($result)
		echo "<script>history.back(1)</script>";
	else{
		echo "<script>alert('Gagal menghapus komentar.'); history.back(1)</script>";
	}
}
else{
	echo "<script>alert('Mengahpus GAGAL!!!'); history.back(1)</script>";
}
?>