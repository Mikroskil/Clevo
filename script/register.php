<?php
require("config.php");

$nama = filter_var($_POST['nama'], FILTER_SANITIZE_STRING);
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
$c_password = filter_var($_POST['c_password'], FILTER_SANITIZE_STRING);
$tempat = filter_var($_POST['tempat_lahir'], FILTER_SANITIZE_STRING);
$tanggal_lahir = $_POST['tanggal_lahir'];
$Alamat = filter_var($_POST['Alamat'], FILTER_SANITIZE_STRING);
$Gender = $_POST['Jenis_Kelamin'];
$Telp = filter_var($_POST['No_Telp'], FILTER_SANITIZE_STRING);
$Email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);
$id_cust = filter_var($_POST['id_cust'], FILTER_SANITIZE_STRING);
$jenis_id = $_POST['jenis_id'];
$rekening = $_POST['Jenis_Rekening'];
$no_rek = filter_var($_POST['No_Rekening'],FILTER_SANITIZE_STRING);

$cek = "SELECT * FROM customer WHERE Username='$username'";
$user_exists = mysql_query($cek);
$hasil =mysql_num_rows($user_exists);

if ($nama == '') {
	$error[] = '- Nama Lengkap harus diisi';
}
if ($id_cust == '') {
	$error[] = '- No. Identitas harus diisi';
}
if ($username == '') {
	$error[] = '- Username harus diisi';
}
else if ($hasil > 0){
	$error[] = '- Username sudah ada';
}
if ($password == '') {
	$error[] = '- Password harus diisi';
}
if ($c_password == '') {
	$error[] = '- Confirm Password harus diisi';
}
if($password != $c_password) {
	$error[] = '- Password Tidak Sama';
}
if($Email == '' || !filter_var($Email, FILTER_VALIDATE_EMAIL)){
	$error[] = '- Email tidak valid ';
}
if ($tempat == '') {
	$error[] = '- Tempat Lahir harus diisi';
}
if ($tanggal_lahir == '') {
	$error[] = '- Tanggal Lahir harus diisi';
}
if ($Alamat == '') {
	$error[] = '- Alamat harus diisi';
}

if ($no_rek == '') {
	$error[] = '- No. Rekening harus diisi';
}
if ($Telp == '') {
	$error[] = '- No. Telp/HP harus diisi';
}

if (isset($error)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $error);
} else {
	$data = '';
	foreach ($_POST as $k => $v) {
		$data .= "$k : $v<br />";
	}
	echo '<b>Berhasil mendaftar. Selamat bergabung di Wisata Ransel Indonesia.<br>
	Berikut ini data anda:</b><br />';
	echo $data;
	$query = mysql_query("INSERT INTO customer (Nama, id_customer, jenis_id, Username, Password,Confirm_Pass,Tempat_Lahir,Tanggal_Lahir,Alamat, Jenis_Kelamin, No_Telp, Email, Jenis_Rekening, No_Rekening , tanggal)
	values ('$nama','$id_cust','$jenis_id','$username','$password','$c_password','$tempat','$tanggal_lahir','$Alamat','$Gender','$Telp','$Email', '$rekening', '$no_rek' ,CURDATE());");
	
	$sql = "INSERT INTO
					users(user_name, user_pass, user_email ,user_date, user_level)
				VALUES('" . $username . "',
					   '" . sha1($password) . "',
					   '" . $Email . "',
						NOW(),
						0)";					
	$result = mysql_query($sql);
}

?>