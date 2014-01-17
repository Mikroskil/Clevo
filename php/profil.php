<?php
	session_start();
?>	
<html>
<head>
<title>Wisata Ransel Indonesia</title>
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
        <h1><a href='home.php'>Wisata Ransel indonesia<small>W A R I A</small></a></h1>
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
		  	
			function tgl_indo($tgl){
			  $tanggal = substr($tgl,8,2);
			  $bulan    = getBulan(substr($tgl,5,2));
			  $tahun    = substr($tgl,0,4);
			  return $tanggal." ".$bulan." ".$tahun;        
			}    
			function getBulan($bln){
			  switch ($bln){
				case 1:
				  return "Januari";
				  break;
				case 2:
				  return "Februari";
				  break;
				case 3:
				  return "Maret";
				  break;
				case 4:
				  return "April";
				  break;
				case 5:
				  return "Mei";
				  break;
				case 6:
				  return "Juni";
				  break;
				case 7:
				  return "Juli";
				  break;
				case 8:
				  return "Agustus";
				  break;
				case 9:
				  return "September";
				  break;
				case 10:
				  return "Oktober";
				  break;
				case 11:
				  return "November";
				  break;
				case 12:
				  return "Desember";
				  break;
   			 }
			}
			require("../script/config.php");
			$user =$_SESSION['Nama'];
			$query = mysql_query("select * from wisata.customer where Nama='$user'");
			echo "<table border='4' width='50%' rules='groups' style='font-weight:bold'>";
			
			while($baris = mysql_fetch_array($query))
			{
				echo "<tr><td id='warna'>Nama Lengkap</td><td>:</td><td>".$baris[0]."</td></tr>
				<tr><td id='warna'>No. Identitas</td><td>:</td><td>".$baris[1]."</td></tr>
				<tr><td id='warna'>Jenis Kartu Identitas </td><td>:</td><td>".$baris[2]."</td></tr>
				<tr><td id='warna'>User Name</td><td>:</td><td>".$baris[3]."</td></tr>
				<tr><td id='warna'>Password</td><td>:</td><td>".$baris[4]."</td></tr>
				<tr><td id='warna'>Confirm Password</td><td>:</td><td>".$baris[5]."</td></tr>
				<tr><td id='warna'>Tempat Lahir</td><td>:</td><td>".$baris[6]."</td></tr>
				<tr><td id='warna'>Tanggal Lahir</td><td>:</td><td>".$baris[7]."</td></tr>
				<tr><td id='warna'>Alamat</td><td>:</td><td>".$baris[8]."</td></tr>
				<tr><td id='warna'>Jenis Kelamin</td><td>:</td><td>".$baris[9]."</td></tr>
				<tr><td id='warna'>No. Telp / HP</td><td>:</td><td>".$baris[10]."</td></tr>
				<tr><td id='warna'>Email</td><td>:</td><td>".$baris[11]."</td></tr>
				<tr><td id='warna'>Jenis Rekening</td><td>:</td><td>".$baris[12]."</td></tr>
				<tr><td id='warna'>No. Rekening</td><td>:</td><td>".$baris[13]."</td></tr>
				<tr><td id='warna'>Tanggal Bergabung</td><td>:</td><td>".tgl_indo($baris[14])."</td></tr>";
			}
			echo "<tr><td colspan='3'>&nbsp;</td></tr><tr><td colspan='3'><input type='button' value=Edit onclick='location.href=\"edit.php\"'></td></tr>";
			echo "</table>";
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
									<td><ul class='sb_menu'>Username</ul></td>
									<td><ul class='sb_menu'>:</ul></td>					
									<td width='157'><input name='user' type='text' id='user'></td>
								</tr>
								<tr>
									<td><ul class='sb_menu'>Password</ul></td>
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
                <li><a href='cacatan.php'>	Catatan Perjalanan</a></li>
                <li><a href='site.php'>Site Map</a></li>
                <li><a href='contact.php'>Contact Us</a></li>
              </ul>";
			  }
			  else
			  {
				echo"
			  <ul class='sb_menu'>
                <li><a href='home.php'>Home Page</a></li>
				<li><a href='profil.php'>Profil</a></li>
                <li><a href='cacatan.php'>Catatan Perjalanan</a></li>
                <li><a href='site.php'>Site Map</a></li>
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
      <p class='lf'>Copyright 2013 <a href="#">Waria</a>  - All rights reserved.</p>
      <div style='clear:both;'></div>
    </div>
  </div>
</div>
</body>
</html>
