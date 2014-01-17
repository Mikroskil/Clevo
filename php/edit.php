<?php
	session_start();
?>	
<html>
<head>
<title>wisata Ransel Indonesia</title>
<link href='../images/favicon.ico' rel='icon'>
<link href='../css/style.css' rel='stylesheet' type='text/css' />
<link rel='stylesheet' type='text/css' href='../css/coin-slider.css' />
<script type='text/javascript' src='../js/cufon-yui.js'></script>
<script type='text/javascript' src='../js/flashcolor.js'></script>
<script type='text/javascript' src='../js/cufon-titillium-250.js'></script>
<script type='text/javascript' src='../js/jquery-1.4.2.min.js'></script>
<script type='text/javascript' src='../js/script.js'></script>
<script type='text/javascript' src='../js/coin-slider.min.js'></script>
<script type="text/javascript" >
google.load("mootools", "1.2.1");
var content;
var blue = false;
var pink = false;
var green = false;

// This function is called every 1000 miliseconds
function tweenColor() {
var myFx = new Fx.Tween(content);
if (!blue) {
myFx.start('color', '#52ABCC');
blue = true;
}
else if (!pink) {
myFx.start('color', '#EE5588');
pink = true;
}
else if (!green) {
myFx.start('color', '#7daa13');
green = true;
}
else
{
myFx.start('color', '#c1c1c1');
blue = false;
pink = false;
green = false;
}
}
function OnLoad(){
content = document.getElementById('colorful');
content.innerHTML = 'Selamat Datang';
// call tweenColor every 1000 miliseconds
window.setInterval(tweenColor, 1000);
}
google.setOnLoadCallback(OnLoad);
</script>
</head>
<body>
<div class='main'>
  <div class='header'>
    <div class='header_resize'>
      <div class='logo'>
        <h1><a href='home.php'>Wisata Ransel Indonesia<small>WARIA</small></a></h1>
      </div>
      <div class='menu_nav'>
        <ul>
          <li class='active'><a href='home.php'><span>Home Page</span></a></li>
          <li><a href='cacatan.php'><span>Catatan Perjalanan</span></a></li>
          <li><a href='site.php'><span>Site Map</span></a></li>
          <li><a href='contact.php'><span>Contact Us</span></a></li>
        </ul>
      </div>
      <div class='clr'></div>
      
        <div class='clr'></div>
      </div>
      <div class='clr'></div>
    </div>
  </div>
  <div class='content'>
    <div class='content_resize'>
    <table>
       <tr>
        <td width='225'> </td>
        <td width='225'></td>
        <td>
       
        </td>
      </tr>
   </table>
      <div class='mainbar'>
        <div class='article'>
          <h2 id="colorful"></h2>
          <p style="font:14px Tahoma, Geneva, sans-serif;">Berikut ini data anda:</p>
          
			<?php
            require("../script/config.php");
            $user =$_SESSION['user'];
            $query = mysql_query("select * from wisata.customer where Username='$user'");
            echo "<form action='edit.php' method='post'><table border='4' width='50%' rules='groups' style='font-weight:bold'>";
            
            while($baris = mysql_fetch_array($query))
            {
            echo "<tr><td id='warna'>Nama Lengkap</td><td>:</td><td><input type='text' name='txtnama' maxlength='50' value='$baris[0]'></td></tr>
            <tr><td id='warna'>No. Identitas</td><td>:</td><td><input type='text' name='txtiden' maxlength='30' value='$baris[1]'></td></tr>
            <tr><td id='warna'>User Name</td><td>:</td><td><input type='text' name='txtuser' maxlength='30' value='$baris[3]'></td></tr>
            <tr><td id='warna'>Password</td><td>:</td><td><input type='text' name='txtpass' maxlength='100' value='$baris[4]'></td></tr>
            <tr><td id='warna'>Confirm Password</td><td>:</td><td><input type='text' name='c_pass' maxlength='100' value='$baris[5]'></td></tr>
            <tr><td id='warna'>Tempat Lahir</td><td>:</td><td><input type='text' name='txttempat' maxlength='50' value='$baris[6]'></td></tr>
            <tr><td id='warna'>Alamat</td><td>:</td><td><input type='text' name='txtalamat' maxlength='100' value='$baris[8]'></td></tr>
            <tr><td id='warna'>No. Telp / HP</td><td>:</td><td><input type='text' name='txttelp' maxlength='20' value='$baris[10]'></td></tr>
            <tr><td id='warna'>Email</td><td>:</td><td><input type='text' name='txtemail' maxlength='50' value='$baris[11]'></td></tr>
            <tr><td id='warna'>No. Rekening</td><td>:</td><td><input type='text' name='txtnorek' maxlength='30' value='$baris[13]'></td></tr>";
            }
            echo "<tr><td colspan='3'>&nbsp;</td></tr><tr><td colspan='3'><input type='submit' name='submit' value='Ubah'></td></tr>";
            echo "</table></form>";
            
            if(isset($_POST['submit']))
            {
            $nama = filter_var($_POST['txtnama'], FILTER_SANITIZE_STRING);
            $noiden = filter_var($_POST['txtiden'], FILTER_SANITIZE_STRING);
            $userbaru = filter_var($_POST['txtuser'], FILTER_SANITIZE_STRING);
            $pass = filter_var($_POST['txtpass'], FILTER_SANITIZE_STRING);
            $c_pass = filter_var($_POST['c_pass'], FILTER_SANITIZE_STRING);
            $tempat = filter_var($_POST['txttempat'], FILTER_SANITIZE_STRING);
            $alamat = filter_var($_POST['txtalamat'], FILTER_SANITIZE_STRING);
            $telp = filter_var($_POST['txttelp'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['txtemail'], FILTER_SANITIZE_EMAIL);
            $norek = filter_var($_POST['txtnorek'],FILTER_SANITIZE_STRING);
            
			if ($nama == '') {
			$error[] = '- Nama Lengkap harus diisi';
			}
			if ($noiden == '') {
			$error[] = '- No. Identitas harus diisi';
			}
			if ($userbaru == '') {
			$error[] = '- Username harus diisi';
			}
			if ($pass == '') {
			$error[] = '- Password harus diisi';
			}
			if ($c_pass == '') {
			$error[] = '- Confirm Password harus diisi';
			}
			if($pass != $c_pass) {
			$error[] = '- Password Tidak Sama';
			}
			if ($tempat == '') {
			$error[] = '- Tempat Lahir harus diisi';
			}
			if ($alamat == '') {
			$error[] = '- Alamat harus diisi';
			}
			if ($telp == '') {
			$error[] = '- No. Telp/HP harus diisi';
			}
			if($email == '' || !filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error[] = '- Email tidak valid ';
			}
			if ($norek == '') {
			$error[] = '- No. Rekening harus diisi';
			}
			if (isset($error)) {
			echo '<b>Error</b>: <br />'.implode('<br />', $error);
			} else {
			
            $ubah = mysql_query("update wisata.customer set Nama='$nama', id_customer='$noiden' ,Username='$userbaru',Password='$pass', 	Confirm_Pass='$c_pass', Tempat_Lahir='$tempat',Alamat='$alamat',No_Telp='$telp',Email='$email',No_Rekening='$norek' where Username='$user'");
            $sql2 = "update users set user_name='$userbaru', user_pass='".sha1($pass)."', user_email='$email' where user_name='$user'" ;
			$ubah2 = mysql_query($sql2);
            if(!$ubah && !$ubah2) die("Ubah data gagal.");
            else
				echo "<script>location.href='profil.php';</script>";
            }
			}
            ?>
        </div>
      </div>
      <div class='sidebar'>
		<div class='clr'></div>
<?php		
		if(empty($_SESSION['user']))
		{
			echo"
				<div class='g1'>
				  <div class='g2'>
					<div class='gadget'>
					  <h2 class='star'> Login</h2>
					  
					  <div class='clr'></div>
					  <ul class='sb_menu'>
						<form name='form1' method='post' action='../script/login.php'>
							<table width='155' border='0' align='center'>
								<tr>
									<td><ul class='sb_menu'>username</ul></td>
									<td><ul class='sb_menu'>:</ul></td>					
									<td width='157'><input name='user' type='text' id='user'></td>
								</tr>
								<tr>
									<td><ul class='sb_menu'>password</ul></td>
									<td><ul class='sb_menu'>:</ul></td>
									<td><input name='password' type='password' id='password'></td>
								</tr>
								<tr>
									<td> </td>
									<td colspan='2'><input type='submit' name='Submit' value='Login '
										style='background -color:#CCCCCC '>&nbsp; &nbsp;
										<a href='daftar.php' class='style2'>Daftar</a> 
									</td>
								</tr>
							</table>
						</form>
					  </ul>
					</div>
				  </div>
				</div>";
		}
		
		else
		{
			echo"
				<div class='g1'>
				  <div class='g2'>
					<div class='gadget'>
					  <h2 class='star'> Selamat Datang</h2>
					  
					  <div class='clr'></div>
					  <ul class='sb_menu'>
						<form name='form1' method='post' action='../script/login.php'>
							<table width='155' border='0' align='center'>
								<tr>
									<td>
             							<ul class='sb_menu'>
										<li></li>
               							<li> Selamat datang $_SESSION[Nama], <a href='../script/logout.php'> <font color='#68CAFD'> Logout </font></a></li>
										</ul>
									</td>
								</tr>
							</table>
						</ul>
					</div>
				  </div>
				</div>";
		}
?>
        <div class='clr'></div>
        <div class='g1'>
          <div class='g2'>
            <div class='gadget'>
              <h2 class='star'> Menu</h2>
              <div class='clr'></div>
              <?php 
			  if(empty($_SESSION['user']))
			  {
				echo"
              <ul class='sb_menu'>
                <li><a href='home.php'>Home Page</a></li>
                <li><a href='cacatan.php'>catatan Perjalanan</a></li>
                <li><a href='site.php'>SSite Map</a></li>
                <li><a href='contact.php'>Contact Us</a></li>
              </ul>";
			  }
			  else
			  {
				echo"
			  <ul class='sb_menu'>
                <li><a href='home.php'>Home Page</a></li>
				<li><a href='profil.php'>Profil</a></li>
                <li><a href='cacatan.php'>catatan Perjalanan</a></li>
                <li><a href='site.php'>SIte Map</a></li>
                <li><a href='contact.php'>Contact Us</a></li>
              </ul>";	
			  }
			  ?>
            </div>
          </div>
        </div>
      </div>
      <div class='clr'></div>
    </div>
  </div>
  <div class='fbg'>
    <div class='fbg_resize'>
      <div class='clr'></div>
    </div>
  </div>
  <div class='footer'>
    <div class='footer_resize'>
      <p class='lf'>Copyright 2013 <a href="#">Waria</a> - All rights reserved.</p>
      <div style='clear:both;'></div>
      <div style='clear:both;'></div>
    </div>
  </div>
</div>
</body>
</html>