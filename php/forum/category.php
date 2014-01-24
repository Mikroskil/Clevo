<?php
//category.php
include 'connect.php';
include 'header_forum.php';

//first select the category based on $_GET['cat_id']
$sql = "SELECT
			cat_id,
			cat_name,
			cat_description
		FROM
			categories
		WHERE
			cat_id = " . mysql_real_escape_string($_GET['id']);

$result = mysql_query($sql);

if(!$result)
{
	echo 'Gagal, silakan Coba Lagi.' . mysql_error();
}
else
{
	if(mysql_num_rows($result) == 0)
	{
		echo 'Tidak dapat ditemukan.';
	}
	else
	{
		//display category data
		while($row = mysql_fetch_assoc($result))
		{
			echo '<h2>Topik di kategori &prime;' . $row['cat_name'] . '&prime;</h2>';
			echo '<p><a class="item" href="/wisata/php/forum/create_topic.php"><strong>Buat Topik</strong></a></p>';
		}
	
		//do a query for the topics
		$sql = "SELECT	
					topic_id,
					topic_subject,
					topic_date,
					topic_cat
				FROM
					topics
				WHERE
					topic_cat = " . mysql_real_escape_string($_GET['id']);
		
		$result = mysql_query($sql);
		
		if(!$result)
		{
			echo 'Tidak Dapat Menampilkan, Silakan Coba Lagi.';
		}
		else
		{
			if(mysql_num_rows($result) == 0)
			{
				echo 'Tidak Ada Topik di Kategori ini.';

			}
			else
			{
				//prepare the table
				echo '<table border="1">
					  <tr>
						<th>Topik</th>
						<th>Dibuat</th>';
				if(!empty($_SESSION['signed_in']))
				{
					if($_SESSION['user_level']==1){
					echo '<th>Hapus</th>';
					}
				}
				echo '</tr>';	
					
				while($row = mysql_fetch_assoc($result))
				{				
					echo '<tr>';
						echo '<td class="leftpart">';
							echo '<h3><a href="topic.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a><br /><h3>';
						echo '</td>';
						echo '<td class="rightpart">';
							echo date('d-m-Y', strtotime($row['topic_date']));
						echo '</td>';
						if(!empty($_SESSION['signed_in']))
						{
							if($_SESSION['user_level']==1){
								echo '<td class="rightpart">';
									$confirm = "return confirm('Apakah anda yakin dihapus?')";
									echo '<a href="delete.php?baseby=topik&id=' . $row['topic_id'] . '" onclick="'.$confirm.'")">Hapus </a>';
								echo '</td>';
							}
						}
					echo '</tr>';
				}
				echo '</table';
			}
		}
	}
}

include 'footer.php';
?>
