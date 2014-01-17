<?php
	session_start();	
?>
<html>
<head>
<title>Wisata Ransel Indonesia</title>
<link href='../images/favicon.ico' rel='icon'>
<link href='../css/slide.css' rel="stylesheet" type="text/css" />
<link href='../css/style.css' rel='stylesheet' type='text/css' />
<link rel='stylesheet' type='text/css' href='../css/coin-slider.css' />
<script type='text/javascript' src='../js/cufon-yui.js'></script>
<script type='text/javascript' src='../js/cufon-titillium-250.js'></script>
<script type='text/javascript' src='../js/jquery-1.4.2.min.js'></script>
<script type='text/javascript' src='../js/script.js'></script>
<script type='text/javascript' src='../js/coin-slider.min.js'></script>
</head>
<body>
<div class='main'>
  <div class='header'>
    <div class='header_resize'>
      <div class='logo'>
        <h1><a href='home.php'>Wisata Ransel Indonesia<small style="text-align:left">W A R I A</small></a></h1>
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
          <h2>Selamat Datang </h2>
          <p class='infopost'>Posted on <span class='date'>2013</span> by <a href='#'>Admin</a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under <a href='#'>News</a>, <a href='#'>Internet</a> <a href='#' class='com'><span>1</span></a></p>
          <div class='clr'></div>
          
	<span id="sl_play" class="sl_command">&nbsp;</span>
	<span id="sl_pause" class="sl_command">&nbsp;</span>
	<span id="sl_i1" class="sl_command sl_i">&nbsp;</span>
	<span id="sl_i2" class="sl_command sl_i">&nbsp;</span>
	<span id="sl_i3" class="sl_command sl_i">&nbsp;</span>
	<span id="sl_i4" class="sl_command sl_i">&nbsp;</span>
	<section id="slideshow">
	
		<!-- <a class="commands prev commands1" href="#sl_i4" title="Go to last slide">&lt;</a>
		<a class="commands next commands1" href="#sl_i2" title="Go to 2nd slide">&gt;</a>
		<a class="commands prev commands2" href="#sl_i1" title="Go to 1rst slide">&lt;</a>
		<a class="commands next commands2" href="#sl_i3" title="Go to 3rd slide">&gt;</a>
		<a class="commands prev commands3" href="#sl_i2" title="Go to 2nd slide">&lt;</a>
		<a class="commands next commands3" href="#sl_i4" title="Go to 4th slide">&gt;</a>
		<a class="commands prev commands4" href="#sl_i3" title="Go to 3rd slide">&lt;</a>
		<a class="commands next commands4" href="#sl_i1" title="Go to first slide">&gt;</a> -->
		
		<a class="play_commands pause" href="#sl_pause" title="Maintain paused">Pause</a>
		<a class="play_commands play" href="#sl_play" title="Play the animation">Play</a>
		
		<div class="container">
			<div class="c_slider"></div>
			<div class="slider">
				<figure>
					<img src='../images/Pariwisata-Indonesia.jpg' width="550" height="450" />
					<figcaption>Light Of The Days</figcaption>
				</figure><!--
				--><figure>
					<img src='../images/BALI.jpg' width="550" height="450" />
					<figcaption>Bali island the memorial Places</figcaption>
				</figure><!--
				--><figure>
					<img src='../images/DANAU.jpg' width="550" height="450" />
					<figcaption>Toba lakes<em>(do)</em> time</figcaption>
				</figure><!--
				--><figure>
					<img src='../images/SABANG.jpg' width="550" height="450" />
					<figcaption>Wonderful Day Of Sabang</figcaption>
				</figure>
			</div>
		</div>
		
		
		
	</section>

          <div class='img'></div>
          <div class='post_content' style="float: left;padding-left: 50px;">
            <p>Selamat datang di situs<b> &quot;Wisata Ransel Indonesia&quot;</b> . Situs ini dibuat pada 1 november  2013. Dengan tujuan mempermudah para wisatawan khususnya <i>backpacker</i> dalam mencari dan berbagi informasi tentang lokasi wisata yang ingin dituju</p>
            <p>&nbsp;</p>
          </div>
          <div class='clr'></div>
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
    </div>
  </div>
</div>
</body>
</html>
