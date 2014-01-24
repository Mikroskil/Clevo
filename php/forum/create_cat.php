<?php
//create_cat.php
include 'connect.php';
include 'header_forum.php';

echo '<h2>Membuat Kategori</h2>';
if(empty($_SESSION['signed_in']) | $_SESSION['user_level'] != 1 )
{
	//the user is not an admin
	echo 'Maaf, Anda tidak diizinkan mengakses halaman ini.';
}
else
{
	//the user has admin rights
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		//the form hasn't been posted yet, display it
		echo '<form method="post" action="">
			Category name: <input type="text" name="cat_name" /><br />
			Category description:<br /> <textarea name="cat_description" /></textarea><br /><br />
			<input type="submit" value="Add category" />
		 </form>';
	}
	else
	{
		//the form has been posted, so save it
		$sql = "INSERT INTO categories(cat_name, cat_description)
		   VALUES('" . mysql_real_escape_string($_POST['cat_name']) . "',
				 '" . mysql_real_escape_string($_POST['cat_description']) . "')";
		$result = mysql_query($sql);
		if(!$result)
		{
			//something went wrong, display the error
			echo 'Error' . mysql_error();
		}
		else
		{
			echo 'Kategori baru berhasil di tambahkan.';
		}
	}
}

include 'footer.php';
?>
