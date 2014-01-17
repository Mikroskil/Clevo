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
 <style type="text/css">                   
									 
                                    /* Custom container */
                                    .container-narrow {
                                                margin: 0 auto;
                                                max-width: 700px;
                                    }
                                    .container-narrow > hr {
                                                margin: 30px 0;
                                    }
                                    /* Main marketing message and sign up button */
                                    .jumbotron {
                                                margin: 60px 0;
                                                text-align: center;
                                    }
                                    .jumbotron h1 {
                                                font-size: 72px;
                                                line-height: 1;
                                    }
                                    .jumbotron .btn {
                                                font-size: 21px;
                                                padding: 14px 24px;
                                    }
                                    /* Supporting marketing content */
                                    .marketing {
                                                margin: 60px 0;
                                    }
                                    .marketing p + h4 {
                                                margin-top: 28px;
                                    }
</style>
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
          <li><a href='cacatan.php'><span>Catatan Perjalanan</span></a></li>
          <li class='active'><a href='site.php'><span>Site Map</span></a></li>
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
      		
      <div class='mainbar'>
        <div class='article'>
          <h2><span>Site Map</span></h2>
          <div class='clr'></div>
          <p><strong>Silahkan pilih sesuai kriteria anda.</strong></p>
          <form class="form-inline" action='peta.php' method="POST">
            <span class="lead">
            <input type="text" name='asal' class="input-large" placeholder="Alamat asal">
            </span>
            <input type="text"  name='tujuan'class="input-large" placeholder="Alamat Yang dituju">
            <button type="submit" class="btn btn-warning">Rute</button>
          </form>
          <p>
          <p class='lead'>
            Rute  Google maps</p>


          <?php
          error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                      if(isset($_POST)) 
          			{
                      echo $saddr = $_POST['asal'];
                      echo $daddr = $_POST['tujuan'];
                      include ('direction.php');
          			}
          			                               
          ?>

        </div></p>
        </div> <!-- mainbar -->
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
