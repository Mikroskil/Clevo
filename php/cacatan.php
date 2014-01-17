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
<script type='text/javascript' src='../js/cufon-titillium-250.js'></script>
<script type='text/javascript' src='../js/jquery-1.4.2.min.js'></script>
<script type='text/javascript' src='../js/script.js'></script>
<script type='text/javascript' src='../js/coin-slider.min.js'></script>
</head>
<body>
<div class='main subpage'>
  <div class='header'>
    <div class='header_resize'>
      <div class='logo'>
        <h1><a href='home.php'>Wisata Ransel Indonesia<small>W A R I A</small></a></h1>
      </div>
      <div class='menu_nav'>
         <ul>
          <li><a href='home.php'><span>Home Page</span></a></li>
          <li class='active'><a href='cacatan.php'><span>Catatan Perjalanan</span></a></li>
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
          <h2><span>Cacatan Perjalanan Anda disini</span></h2>
          <div class='clr'></div>
          <p><strong>Silahkan pilih sesuai kriteria anda.</strong></p>
      <table width='102%' height="328">
      		<form action='../script/caribus.php' method='post'>
                <tr>
                	 <td height="80"><a href="forum/category.php?id=1">Medan</a></td>
                   <td><a href="forum/category.php?id=2">Surabaya</a></td>
                   <td><a href="forum/category.php?id=3">Aceh</a></td>
                   <td><a href="forum/category.php?id=4">Papua</a></td>
                 
                  <tr>
                  	<td height="85"><a href="forum/category.php?id=5">Palembang</a></td>
                  	<td><a href="forum/category.php?id=6">Makassar</a></td>
                 	  <td><a href="forum/category.php?id=7">Padang</a></td>
                 	  <td><a href="forum/category.php?id=8">Bandung</a></td>
                  </tr>
                  
                  <tr>
                    <td height="88"><a href="forum/category.php?id=9">Jakarta</a></td>
                    <td><a href="forum/category.php?id=10">Bali</a></td>
                 	  <td><a href="forum/category.php?id=11">Sulawesi</a></td>
                 	  <td><a href="forum/category.php?id=12">Kalimantan</a></td>
                  </tr>
                 
                 <tr>
                    <td colspan='4' align='right'>&nbsp;</td>
                 </tr>
                 </form>
              </table>
          
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
										<a href='daftar.php'
										class='style2'>Daftar</a> 
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
              <h2 class='star'>Menu</h2>
              <div class='clr'></div>
              <?php 
			  if(empty($_SESSION['user']))
			  {
				echo"
              <ul class='sb_menu'>
                <li><a href='home.php'>Home Page</a></li>
                <li><a href='cacatan.php'>Catatan Perjalanan</a></li>
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
      <p class='lf'>Copyright 2013 <a href="#">Waria</a> - All rights reserved.</p>
      <div style='clear:both;'></div>
      <div style='clear:both;'></div>
    </div>
  </div>
</div>
</body>
</html>
