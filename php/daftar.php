<html>
<head>
<title>Wisata Ransel Indonesia</title>
<link href='../images/favicon.ico' rel='icon'>
<link type="text/css" href="../css/jquery-ui-1.8.6.custom.css" rel="Stylesheet" />	
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/coin-slider.css" />
<script type="text/javascript" src="../js/cufon-yui.js"></script>
<script type="text/javascript" src="../js/cufon-titillium-250.js"></script>
<script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript" src="../js/coin-slider.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.6.custom.min.js"></script>
<script type="text/javascript">
function passwordStrength(password)
{
	var desc = new Array();
	desc[0] = "Very Weak";
	desc[1] = "Weak";
	desc[2] = "Better";
	desc[3] = "Medium";
	desc[4] = "Strong";
	desc[5] = "Strongest";

	var score   = 0;

	//if password bigger than 6 give 1 point
	if (password.length > 6) score++;

	//if password has both lower and uppercase characters give 1 point	
	if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;

	//if password has at least one number give 1 point
	if (password.match(/\d+/)) score++;

	//if password has at least one special caracther give 1 point
	if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score++;

	//if password bigger than 12 give another 1 point
	if (password.length > 12) score++;

	 document.getElementById("passwordDescription").innerHTML = desc[score];
	 document.getElementById("passwordStrength").className = "strength" + score;
}
</script>
<script type="text/javascript">
$(document).ready(function() {

	$().ajaxStart(function() {
		$('#loading').show();
		$('#result').hide();
	}).ajaxStop(function() {
		$('#loading').hide();
		$('#result').fadeIn('slow');
	});

	$('#form1').submit(function() {
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data) {
				$('#result').html(data);
			}
		})
		return false;
	});
})

$(document).ready(
         function() {
   		  $(function() {
               $("#tanggal_lahir").datepicker({
				changeMonth: true,
				changeYear: true,
				yearRange: '-66',
				dateFormat:"yy-mm-dd",
				showAnim:"bounce"	
               });
            });
   	   });
</script>
</head>
<body>
<div class="main subpage">
  <div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1><a href="home.php">Wisata Ransel Indonesia<small>W A R I A</small></a></h1>
      </div>
      <div class="menu_nav">
        <ul>
          <li class="active"><a href="home.php"><span>Home Page</span></a></li>
          <li><a href="cacatan.php"><span>Catatan Perjalanan</span></a></li>
          <li><a href="site.php"><span>Site Map</span></a></li>
          <li><a href="contact.php"><span>Contact Us</span></a></li>
        </ul>
      </div>
        <div class="clr"></div>
      
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
    <table>
       <tr>
        <td width="225"> </td>
        <td width="225"></td>
        
        <td>              
            
        </td>
      </tr>
   </table>
      <div class="mainbar">
        <div class="article">
          <h2><span>Registrasi Anggota</span></h2>
          <div class="clr"></div>
          <p><strong>Silahkan daftar dulu agar anda bisa mendapatkan hak akses yang berlebih.</strong></p>
		  <div id="loading"><img src="../images/loading.gif" alt="loading..." /> <b>Info:</b></div>
          <div id="result"></div>
            <form id="form1" method="post" action="../script/register.php">
					<table width="400" border="0" align="center">
					
					<tr>
					<td>Nama Lengkap </td>
                    <td> : </td>
					<td><input name="nama" type="text" id="nama" size='24'></td>
					</tr>
					<tr>
					<td>No. Identitas </td>
                    <td> : </td>
					<td><input name="id_cust" type="text" id="nama" size='24'></td>
					</tr>
					<tr>
					<td >Jenis Kartu Identitas </td>
                    <td> : </td>
					<td><select name="jenis_id">
                    		<option value="KTP">Kartu Tanda Penduduk</option>
                            <option value="SIM">Surat Izin Mengemudi</option>
                            <option value="KTM">Kartu Tanda Mahasiswa</option>
                            <option value="KTPel">Kartu Tanda Pelajar</option>
                        </select>
					</tr>
					<tr>
					<td >User Name </td>
                    <td> : </td>
					<td><input name="username" type="text"  size='24'></td>
					</tr>
					<tr>
					<td>Password </td>
                    <td> : </td>
					<td><input name="password" type="password" id="password" size='24' onKeyUp="passwordStrength(this.value)"></td>
					</tr>
					<tr>
					<td >Confirm Password </td>
                    <td> : </td>
					<td><input name="c_password" type="password" id="c_password" size='24'></td>
					</tr>
                    <tr>
                    <td><label for="passwordStrength">Password strength</label></td>
                    <td>:</td>
                    <td id="passwordDescription">Password not entered</td>
                    </tr>
                    <tr>
					<td>Email </td>
                    <td> : </td>
					<td><input name="Email" type="text" size='24'></td>
					</tr>
					<tr>
					<td >Tempat Lahir </td>
                    <td> : </td>
					<td><input name="tempat_lahir" type="text" id="c_password" size='24'></td>
					</tr>
					<tr>
					<td >Tanggal Lahir </td>
                    <td> : </td>
					<td><input name="tanggal_lahir" id="tanggal_lahir" type="text" size='24'></td>
					</tr>
					<tr>
					<td >Alamat </td>
                    <td> : </td>
					<td><input name="Alamat" type="text" size='24'></td>
					</tr>
					<tr>
					<td >Jenis Kelamin </td>
                    <td> : </td>
					<td><select name="Jenis_Kelamin">
                    		<option value="laki-laki">Laki - laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
					</tr>
                    <tr>
					<td>Jenis Rekening </td>
                    <td> : </td>
					<td><select name="Jenis_Rekening">
                    		<option>VISA</option>
                            <option>Master Card</option>
                            <option>Pay Pal</option>
                        </select></td>
					</tr>
					<tr>
					<td >No. Rekening </td>
                    <td> : </td>
					<td><input name="No_Rekening" type="text" id="c_password" size='24'></td>
					</tr>
					
					<tr>
					<td >No. Telp / HP </td>
                    <td> : </td>
					<td><input name="No_Telp" type="text" size='24'></td>
					</tr>
					<tr>
					<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
					<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
                    <td>&nbsp;</td>
					<td><input type="submit" name="submit" value="Register"></td>
                    <td><input type="reset" name="reset" value="Reset" /></td>
					</tr>
					</table>
				</form>
            
          
        </div>
      </div>
      <div class="sidebar">
        <div class="g1">
          <div class="g2">
            <div class="gadget">
              <h2 class="star"> Login</h2>
			  
              <div class='clr'></div>
					  <ul class='sb_menu'>
						<form name='form2' method='post' action='../script/login.php'>
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
										<a href='daftar.php'
										class='style2'>Daftar</a> 
									</td>
								</tr>
							</table>
						</form>
					  </ul>
					</div>
				  </div>
				</div>
                
        <div class="clr"></div>
        <div class="g1">
          <div class="g2">
            <div class="gadget">
              <h2 class="star">Menu</h2>
              <div class="clr"></div>
              <ul class="sb_menu">
                <li><a href="home.php">Home Page</a></li>
                <li><a href="cacatan.php">Catatan Perjalanan</a></li>
                <li><a href="site.php">Site Map</a></li>
                <li><a href="contact.php">Contact Us</a></li>
              </ul>
            </div>
          </div>
        </div>
       
      </div>
      <div class="clr"></div>
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
