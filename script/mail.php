<?php
		if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']))
		{
			echo "<script type='text/javascript'>alert(\"Nama, Email, dan Pesan harus diisi.\");history.go(-1);</script>";
		}
		else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		{
				
                echo "<script type='text/javascript'>alert(\"Email tidak valid\"); history.go(-1);</script>";
				
		}
		else
		{	
			$nama = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
			$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);	
			$judul = filter_var($_POST['subject'], FILTER_SANITIZE_SPECIAL_CHARS);
			$tanya = filter_var($_POST['message'], FILTER_SANITIZE_SPECIAL_CHARS);
		
			$to = "wahyu@localhost";
			$subject = "Pertanyaan dari Pengunjung Website";
			$message = "Nama: $nama.\nEmail: $email.\nJudul: $judul.\nPertanyaan: $tanya.";
			$headers = "from: customer@localhost";
			if(mail($to, $subject, $message, $headers))
				 echo "<script type='text/javascript'>alert(\"Pesan berhasil dikirim. Terima kasih atas pertanyaan yang diberikan.\");history.go(-1);</script>";
			else
				echo "<script type='text/javascript'>alert(\"Pesan gagal dikirim.\");history.go(-1);</script>";
			
		}
				
				
?>