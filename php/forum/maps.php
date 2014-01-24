<?php
include 'connect.php';
include 'header.php';

echo'<form class="form-inline" action='index.php' method="POST">';
echo'<input type="text" name='asal' class="input-large" placeholder="Alamat asal">';
echo'<input type="text"  name='tujuan'class="input-large" placeholder="Alamat Yang dituju">';
echo'<button type="submit" class="btn btn-warning">Rute</button>';
echo'</form>';
                       
            echo'<p class='lead'>';
            echo'Rute  Google maps';
            echo'</p>';

		echo'<div class='span8'>';

            if(isset($_POST)) {
            $saddr = $_POST['asal'];
            $daddr = $_POST['tujuan'];
            include ('direction.php');
                                    }
		echo'</div>';

include 'footer.php';
?>