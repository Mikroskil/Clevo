<?php
/**
 * Aplikasi Forum Sederhana dengan PHP/MySQL
 *
 * @file function.php
 * @author Andrew Hutauruk | http://blizze.wordpress.com
 * @date 18 September 2012
 */
 
require(dirname(__FILE__).'/config.php' );

# Untuk menyimpan data balasan topik tertentu
function save_topic_reply() {
	$err = array();
	$reply = clean( $_POST['reply'] );
	if( empty( $reply ) ) { $err[] = '- Mohon untuk mengisi keterangan jawaban Anda terhadap topik ini'; }
	if( !count( $err ) ) {
		query( "INSERT INTO ".TABLE_REPLY." VALUES( '$reply_id', '".$_GET['topicid']."', '".$_SESSION['user_id']."', '".time()."', '$reply' )" );
	}
	if( count( $err ) ) { $_SESSION['msg-err-reply']['empty-field'] = implode( '<br>', $err ); }
	header( "Location: ".SITE_URL."/topic.php?option=view-topic&topicid=".$_GET['topicid']."#comment" );
	exit;
}

# Fungsi untuk mnembah data anggota baru
function add_new_member() {
	$err = array();
	$fullname = clean( $_POST['fullname'] );
	$password = clean( $_POST['password'] );
	$email = clean( $_POST['email'] );
	
	if( empty( $fullname ) ) { $err[] = '- Maaf, mohon untuk mengisi nama Anda'; }
	if( empty( $password ) ) { $err[] = '- Mohon untuk mengisi password Anda'; }
	if( empty( $email ) ) { $err[] = '- Isi alamat email Anda'; }
	
	if( !count( $err ) ) {
		if( num( query( "SELECT * FROM ".TABLE_USER." WHERE email='$email'" ) ) == 0 ) {
			query( "INSERT INTO ".TABLE_USER." VALUES( '$user_id', '$fullname', '".md5( $password )."', '$email', 'http://xxx.xxx.xxx', '".time()."', '".time()."', '0' )" );
		} else { $err[] = '- Email ini sudah terpakai sebelumnya'; }
	}
	
	if( count( $err ) ) { $_SESSION['msg-error-registration']['reg-error'] = implode( '<br>', $err ); }
	if( count( $err ) ) { header( "Location: ".SITE_URL."/?option=create-account" ); } 
	else { header( "Location: ".SITE_URL."/?email=$email" ); }
	exit;
}

# Fungsi untuk menambah data kategori
function add_new_category() {
	$err = array();
	$cat_name = clean( $_POST['cat_name'] );
	$cat_desc = clean( $_POST['cat_desc'] );	
	if( empty( $cat_name ) ) { $err[] = '- Maaf, nama kategori topik baru tidak boleh kosong'; }
	if( empty( $cat_desc ) ) { $err[] = '- Maaf, detail kategori topik baru tidak boleh kosong'; }
	if( !count( $err ) ) {
		if( num( query( "SELECT * FROM ".TABLE_CATEGORY." WHERE cat_name='$cat_name'" ) ) == 0 ) {
			query( "INSERT INTO ".TABLE_CATEGORY." VALUES( '$cat_id', '".$_SESSION['user_id']."', '$cat_name', '$cat_desc', '".time()."' )" );
		} else { $err[] = '- Maaf, nama kategori ini sudah ada sebelumnya'; }
	}
	
	if( count( $err ) ) { $_SESSION['msg-error-category']['cat-err'] = implode( '<br>', $err ); }
	if( count( $err ) ) { header( "Location: ".SITE_URL."/category.php?option=create-category" ); }
	else { header( "Location: ".SITE_URL ); }
	exit;
}

# Fungsi untuk menambah topik baru untuk kategori tertentu
function add_new_topic() {
	$err = array();
	$title = clean( $_POST['title'] );
	$descript = clean( $_POST['descript'] );
	if( empty( $title ) ) { $err[] = '- Maaf, mohon untuk mengisi judul topik Anda'; }
	if( empty( $descript ) ) { $err[] = '- Maaf, mohon untuk mengisi detail topik Anda'; }
	
	if( !count( $err ) ) {
		query( "INSERT INTO ".TABLE_TOPIC." VALUES( '$topic_id', '".$_GET['catid']."', '".$_SESSION['user_id']."', '".time()."', '0', '$title', '$descript' )" );
	}
	if( count( $err ) ) { $_SESSION['msg-error-topic']['topic-err'] = implode( '<br>', $err ); }
	if( count( $err ) ) { header( "Location: ".SITE_URL."/topic.php?option=create-topic&catid=".$_GET['catid'] ); }
	else { header( "Location: ".SITE_URL."/category.php?option=view-category&catid=".$_GET['catid'] ); }
	exit;
}
	
# Fungsi untuk membalas sebuah topik
function add_new_reply() {
	$err = array();
	$reply = clean( $_POST['reply'] );
	if( empty( $reply ) ) { $err[] = '- Maaf, mohon untuk mengisi jawaban Anda'; }
	if( !count( $err ) ) {
		query( "INSERT INTO ".TABLE_REPLY." VALUES( '$reply_id', '".$_GET['topic_id']."', '".$_SESSION['user_id']."', '".time()."', '$reply' )" );
	}
	if( count( $err ) ) { $_SESSION['msg-error-reply']['reply-err'] = implode( '<br>', $err ); }
	if( count( $err ) ) { header( "Location: ".SITE_URL."/reply.php?option=create-reply&topicid=".$_GET['topic_id'] ); }
	else { header( "Location: ".SITE_URL."/topic.php?option=view-topic&topicid=".$_GET['topic_id'] ); }
	exit;
}

# Fungsi untuk menangani proses login admin
function check_admin_login() {
	$err = array();
	$email = clean( $_POST['email'] );
	$password = clean( $_POST['password'] );
	if( empty( $email ) ) { $err[] = '- Mohon untuk memasukkan email Anda'; }
	if( empty( $password ) ) { $err[] = '- Mohon untuk mengisi password Anda'; }
	if( !count( $err ) ) {
		$sql = fetch( query( "SELECT * FROM ".TABLE_ADMIN." WHERE email='$email' AND password='".md5( $password )."'" ) );
		if( $sql ) { $_SESSION['admin_id'] = $sql['admin_id']; query( "UPDATE ".TABLE_ADMIN." SET status=1 WHERE admin_id='".$_SESSION['admin_id']."'" ); }
		else { $err[] = '- Maaf, email dan password Anda salah. Coba ulangi lagi...'; }
	}
	if( count( $err ) ) { $_SESSION['msg-error-login-admin']['wrong-admin-account'] = implode( '<br>', $err ); }
	if( count( $err ) ) { header( "Location: ".SITE_URL."/?option=login-admin" ); }
	else{ header( "Location: ".SITE_URL."/admin.php" ); }
	exit;
}

# Fungsi untuk menangani proses login member
function check_member_login() {
	$err = array();
	$email = clean( $_POST['email'] );
	$password = clean( $_POST['password'] );
	if( empty( $email ) ) { $err[] = '- Mohon untuk memasukkan email Anda'; }
	if( empty( $password ) ) { $err[] = '- Mohon untuk mengisi password Anda'; }
	if( !count( $err ) ) {
		$sql = fetch( query( "SELECT * FROM ".TABLE_USER." WHERE email='$email' AND password='".md5( $password )."'" ) );
		if( $sql ) { $_SESSION['user_id'] = $sql['user_id']; query( "UPDATE ".TABLE_USER." SET status=1 WHERE user_id='".$_SESSION['user_id']."'" );}
		else { $err[] = '- Maaf, email dan password Anda salah. Coba ulangi lagi...'; }
	}
	if( count( $err ) ) { $_SESSION['msg-error-login-member']['wrong-member-account'] = implode( '<br>', $err ); }
	header( "Location: ".SITE_URL );
	exit;
}

# Fungsi untuk mengakhiri session member
function logout_member() {
	if( isset( $_SESSION['admin_id'] ) ) { query( "UPDATE ".TABLE_ADMIN." SET status=0, lastup_date='".time()."' WHERE admin_id='".$_SESSION['admin_id']."'" ); }
	elseif( isset( $_SESSION['user_id'] ) ) { query( "UPDATE ".TABLE_USER." SET status=0, lastup_date='".time()."' WHERE user_id='".$_SESSION['user_id']."'" ); }
	session_destroy();
	header( "Location: ".SITE_URL );
	exit;
}

# Form untuk login admin
function admin_login_form() {
	echo "<div class=\"box\">";
	echo "	<h1>form login administrator</h1>";
	echo "	<form method=\"post\" action=\"\" autocomplete=\"off\">";
	echo "	Email:<br> <input type=\"text\" name=\"email\" size=\"30\"><br>";
	echo "	Password:<br> <input type=\"password\" name=\"password\" size=\"30\"><br>";
	echo "	<input type=\"submit\" name=\"action\" value=\"Login Administrator\" id=\"button\">";
	echo "	</form>";
	echo "</div>";
}

# Form untuk login member
function member_login_form() {
	$email = isset( $_GET['email'] ) ? $_GET['email'] : '';
	echo "<div class=\"box\">";
	echo "	<h1>form login member</h1>";
	if( isset( $_SESSION['msg-error-login-member']['wrong-member-account'] ) ) {
		echo "<p class=\"err\"><b>Pesan Kesalahan:</b><br>".$_SESSION['msg-error-login-member']['wrong-member-account']."</p>";
		unset( $_SESSION['msg-error-login-member']['wrong-member-account'] );
	}
	echo "	<form method=\"post\" action=\"\" autocomplete=\"off\">";
	echo "	Email:<br> <input type=\"text\" name=\"email\" size=\"28\" id=\"email\" value=\"$email\"><br>";
	echo "	Password:<br> <input type=\"password\" name=\"password\" size=\"28\"><br>";
	echo "	<input type=\"submit\" name=\"action\" value=\"Login Member\" id=\"button\">";
	echo "	</form>";
	echo "	<script>document.getElementById('email').focus();</script>";
	echo "</div>";
}

# Form untuk daftar
function create_account_form() {
	echo "<div class=\"box\">";
	echo "	<h1>form create account</h1>";
	if( isset( $_SESSION['msg-error-registration']['reg-error'] ) ) {
		echo "<p class=\"err\"><b>Pesan Kesalahan:</b><br>".$_SESSION['msg-error-registration']['reg-error']."</p>";
		unset( $_SESSION['msg-error-registration']['reg-error'] );
	}
	echo "	<form method=\"post\" action=\"\" autocomplete=\"off\">";
	echo "	Nama Lengkap:<br> <input type=\"text\" name=\"fullname\" size=\"40\" id=\"fullname\"><br>";
	echo "	Password:<br> <input type=\"password\" name=\"password\" size=\"40\"><br>";
	echo "	Email:<br> <input type=\"text\" name=\"email\" size=\"40\"><br>";
	echo "	<input type=\"submit\" name=\"action\" value=\"Create Account\" id=\"button\">";
	echo "	</form>";
	echo "	<script>document.getElementById('fullname').focus();</script>";
	echo "</div>";
}

# Untuk menambah kategori baru
function create_category_form() {
	echo "<div class=\"box\">";
	echo "	<h1>Tambah Kategori</h1>";
	if( isset( $_SESSION['msg-error-category']['cat-err'] ) ) {
		echo "<p class=\"err\"><b>Pesan Kesalahan:</b><br>".$_SESSION['msg-error-category']['cat-err']."</p>";
		unset( $_SESSION['msg-error-category']['cat-err'] );
	}
	echo "	<form method=\"post\" action=\"\" autocomplete=\"off\">";
	echo "	Nama Kategori:<br> <input type=\"text\" name=\"cat_name\" size=\"82\" id=\"cat_name\"><br>";
	echo "	Keterangan Kategori:<br> <textarea name=\"cat_desc\" rows=\"5\" cols=\"87\"></textarea><br>";
	echo "	<input type=\"submit\" name=\"action\" value=\"Create Category\" id=\"button\">";
	echo "	</form>";
	echo "	<script>document.getElementById('cat_name').focus();</script>";
	echo "</div>";
}

# Untuk membalas sebuah topik
function reply_topic_form() {
	echo "<div class=\"box\">";
	if( isset( $_SESSION['user_id'] ) ) {
		echo "<h1>Reply this topic:</h1>";
		echo "<a name=\"comment\"></a>";
		if( isset( $_SESSION['msg-err-reply']['empty-field'] ) ) {
			echo "<p class=\"err\"><b>Pesan kesalahan:</b><br>".$_SESSION['msg-err-reply']['empty-field']."</p>";
			unset( $_SESSION['msg-err-reply']['empty-field'] );
		}
		echo "<form method=\"post\" action=\"\">";
		echo "Komentar Anda<br><textarea name=\"reply\" rows=\"3\" cols=\"87\"></textarea><br>";
		echo "<input type=\"submit\" name=\"action\" value=\"Reply Topic\">";
		echo "<input type=\"hidden\" name=\"topicid\" value=\"".$_GET['topicid']."\">";
		echo "</form>";
	} else {
		echo "<h1>Comment Disabled</h1>";
		echo "<p>For any reason, comment feature has been disabled by Administrator. Please contact Administrator for further information.</p>";
	}
	echo "</div>";
}

# Untuk menambah topik baru
function create_topic_form() {
	echo "<div class=\"box\">";
	echo "	<h1>Tambah Topik ke: ".get_category_name( $_GET['catid'] )."</h1>";
	
	if( isset( $_SESSION['user_id'] ) ) {
		echo "	<p>".get_moderator_name( $_GET['catid'] )."</p>";
		if( isset( $_SESSION['msg-error-topic']['topic-err'] ) ) {
			echo "<p class=\"err\"><b>Pesan Kesalahan:</b><br>".$_SESSION['msg-error-topic']['topic-err']."</p>";
			unset( $_SESSION['msg-error-topic']['topic-err'] );
		}
		echo "	<form method=\"post\" action=\"\" autocomplete=\"off\">";
		echo "	Judul Topik Anda:<br> <input type=\"text\" name=\"title\" size=\"82\" id=\"title\"><br>";
		echo "	Detail Topik Anda:<br> <textarea name=\"descript\" rows=\"10\" cols=\"87\"></textarea><br>";
		echo "	<input type=\"submit\" name=\"action\" value=\"Create Topic\" id=\"button\">";
		echo "	</form>";
		echo "	<script>document.getElementById('title').focus();</script>";
		echo "	<input type=\"hidden\" name=\"catid\" value=\"".$_GET['catid']."\">";
	} else {
		echo "	<p>Maaf, Anda tidak diperkenankan untuk menambah topik baru sebelum Anda login. Silahkan untuk <b><em><a href=\"".SITE_URL."/?option=create-account\">klik disini untuk membuat akun Anda</a></em></b> sekarang juga. Tidak bayar kok.</p>";
	
	}
	echo "</div>";
}

# Mengambil nama user yang sedang online
function get_user_name( $id ) {
	$sql = fetch( query( "SELECT * FROM ".TABLE_USER." WHERE user_id='$id'" ) );
	return $sql['fullname'];
}

# Tampilan halaman user setelah berhasil login
function front_end_user() {
	echo "<div class=\"box\">";
	echo "	<h1>welcome, ".get_user_name( $_SESSION['user_id'] )."</h1>";
	get_categories();
	
	echo "</div>";
}

# Menampilkan daftar kategori yang ada
function get_categories() {
	$sql = query( "SELECT * FROM ".TABLE_CATEGORY.", ".TABLE_USER." WHERE ".TABLE_CATEGORY.".user_id=".TABLE_USER.".user_id ORDER BY ".TABLE_CATEGORY.".add_date DESC" );
	echo "<p>Berikut daftar kategori yang sudah ada | Total Kategori: <b>".num( $sql )."</b> Kategori</p>";
	echo "<table border=\"1\">";
	echo "<tr class=\"top\">";
	echo "	<td width=\"25\" align=\"center\">NO</td>";
	echo "	<td width=\"480\">Judul Kategori</td>";
	echo "	<td width=\"150\">Moderator</td>";
	echo "	<td width=\"70\" align=\"center\">Tanggal</td>";
	echo "	<td width=\"50\" align=\"center\">Total</td>";
	echo "</tr>";
	if( num( $sql ) == 0 ) { echo "<tr><td colspan=\"5\">Maaf, belum ada kategori untuk saat ini.</td></tr>"; }
	else {
		$no = 1; $a = 0;
		while( $row = fetch( $sql ) ) {
			if( $a == 0 ) { $bg = "#F2F9FD"; $a = 1; }
			else { $bg = "#F5F4EC"; $a = 0; }
			$num = num( query( "SELECT * FROM ".TABLE_TOPIC." WHERE cat_id='{$row['cat_id']}'" ) );
			echo "<tr bgcolor=\"$bg\" onmouseover=\"bgColor='#BEEEFE'\" onmouseout=\"bgColor='$bg'\">";
			echo "	<td valign=\"top\" align=\"center\">{$no}.</td>";
			echo "	<td><span style=\"text-transform: uppercase; font-weight: bold; \"><a href=\"".SITE_URL."/category.php?option=view-category&catid={$row['cat_id']}\">{$row['cat_name']}</a></span><br><span style=\"font-size: 11px; font-style: italic; font-weight: bold; line-height: 1.3em;\">{$row['cat_desc']}</span></td>";
			echo "	<td><b>{$row['fullname']}</b></td>";
			echo "	<td align=\"center\">".date( "d/m/Y", $row['add_date'] )."</td>";
			echo "	<td align=\"center\">$num</td>";
			echo "</tr>";
			$no++;
		}	
	}
	echo "</table>";
}

# Menu bagian kanan setelah user login
function sidebar_user() {
	echo "<div class=\"box\">";
	echo "	<h1>Your Dashboard</h1>";
	echo "	<ul id=\"sidebar\">";
	echo "		<li><a href=\"".SITE_URL."/profile.php?option=update-profile&userid=".$_SESSION['user_id']."\">Update Profile</a></li>";
	echo "		<li><a href=\"".SITE_URL."/category.php?option=create-category\">Create Category</a></li>";
	echo "		<li><a href=\"".SITE_URL."/category.php?option=view-reply\">View Replies</a></li>";
	echo "		<li><a href=\"".SITE_URL."/?option=logout\">Logout Now</a></li>";
	echo "	</ul>";
	echo "</div>";
}

# Mencari nama kategori
function get_category_name( $id ) {
	$sql = fetch( query( "SELECT * FROM ".TABLE_CATEGORY." WHERE cat_id='$id'" ) );
	return $sql['cat_name'];
}

# Menamilkan judul topik
function get_topic_title( $id ) {
	$sql = fetch( query( "SELECT * FROM ".TABLE_TOPIC." WHERE topic_id='$id'" ) );
	return $sql['title'];
}

# Menampilkan daftar topik untuk setiap kategori ayng dipilih
function view_category() {
	echo "<div class=\"box\">";
	echo "	<h1>".get_category_name( $_GET['catid'] )." | <a href=\"".SITE_URL."/topic.php?option=create-topic&catid=".$_GET['catid']."\">New Topic</a></h1>";
	echo "	<p>".get_moderator_name( $_GET['catid'] )."</p>";
	$sql = query( "SELECT * FROM ".TABLE_CATEGORY.", ".TABLE_USER.", ".TABLE_TOPIC." WHERE ".TABLE_TOPIC.".user_id=".TABLE_USER.".user_id AND ".TABLE_CATEGORY.".cat_id=".TABLE_TOPIC.".cat_id AND ".TABLE_CATEGORY.".cat_id='".$_GET['catid']."'" );
	echo "	<table border=\"1\">";
	echo "	<tr class=\"top\">";
	echo "		<td width=\"25\" align=\"center\">NO</td>";
	echo "		<td width=\"300\">Judul Topik</td>";
	echo "		<td width=\"120\">Pengirim</td>";
	echo "		<td width=\"60\" align=\"center\">Tanggal</td>";
	echo "		<td width=\"50\" align=\"center\">Jawaban</td>";
	echo "		<td width=\"50\" align=\"center\">Hits</td>";
	echo "	</tr>";
	if( num( $sql ) == 0 ) { echo "<tr height=\"40\"><td colspan=\"6\" align=\"center\">Belum ada data topik saat ini. Jadilah yang pertama coy...</td></tr>"; }
	else {
		$no = 1; $a = 0;
		while( $row = fetch( $sql ) ) {
			if( $a == 0 ) { $bg = "#F2F9FD"; $a = 1; }
			else { $bg = "#F5F4EC"; $a = 0; }
			$num = num( query( "SELECT * FROM ".TABLE_REPLY." WHERE topic_id='{$row['topic_id']}'" ) );
			echo "<tr bgcolor=\"$bg\" onmouseover=\"bgColor='#BEEEFE'\" onmouseout=\"bgColor='$bg'\">";
			echo "	<td valign=\"top\" align=\"center\">{$no}.</td>";
			echo "	<td><span style=\"text-transform: uppercase; font-weight: bold; \"><a href=\"".SITE_URL."/topic.php?option=view-topic&topicid={$row['topic_id']}\">{$row['title']}</a></span><br><span style=\"font-size: 11px; font-style: italic; font-weight: bold; line-height: 1.3em;\">".substr( $row['descript'], 0, 100 )."...</span></td>";
			echo "	<td><b>{$row['fullname']}</b></td>";
			echo "	<td align=\"center\">".date( "d/m/Y", $row['add_date'] )."</td>";
			echo "	<td align=\"center\">$num</td>";
			echo "	<td align=\"center\">{$row['views']}</td>";
			echo "</tr>";
			$no++;
		}
	
	}
	echo "	</table>";
	echo "</div>";
}

# Menampilkan topik tertentu
function view_topic() {
	query( "UPDATE ".TABLE_TOPIC." SET views=views+1 WHERE topic_id='".$_GET['topicid']."'" );
	echo "<div class=\"box\">";
	$sql = fetch( query( "SELECT * FROM ".TABLE_TOPIC.", ".TABLE_USER.", ".TABLE_CATEGORY." WHERE ".TABLE_TOPIC.".cat_id=".TABLE_CATEGORY.".cat_id AND ".TABLE_TOPIC.".user_id=".TABLE_USER.".user_id AND ".TABLE_TOPIC.".topic_id='".$_GET['topicid']."'" ) );
	echo "	<h1>".$sql['title']."</h1>";
	echo "	<p>Pengirim: <b>".$sql['fullname']."</b> | <a href=\"".SITE_URL."/category.php?option=view-category&catid=".$sql['cat_id']."\">".$sql['cat_name']."</a> | ".date( "F d, Y", $sql['add_date'] )." | Dibaca: <b>".$sql['views']."</b> kali</p>";
	echo "	<p>".$sql['descript']."</p>";
	echo "</div>";
	get_comment( $_GET['topicid'] );
	reply_topic_form();

}

# Menampilkan nama moderator kategori tertentu
function get_moderator_name( $id ) {
	$sql = fetch( query( "SELECT * FROM ".TABLE_CATEGORY.", ".TABLE_USER." WHERE ".TABLE_CATEGORY.".user_id=".TABLE_USER.".user_id AND ".TABLE_CATEGORY.".cat_id='$id'" ) );
	return "Moderator: <b>".$sql['fullname']."</b> | Dibuat pada: <b>".date( "l, F d, Y", $sql['add_date'] )."</b> | Total Topik: <b>".get_total_topic( $id )."</b>";
}

# Menampilkan jumlah topik pada kategori tertentu
function get_total_topic( $id ) {
	$sql = num( query( "SELECT * FROM ".TABLE_CATEGORY.", ".TABLE_TOPIC." WHERE ".TABLE_CATEGORY.".cat_id=".TABLE_TOPIC.".cat_id AND ".TABLE_CATEGORY.".cat_id='$id'" ) );
	return $sql;
}

# Menampilkan daftar komentar
function get_comment( $id ) {
	echo "<div class=\"box\">";
	$sql = query( "SELECT * FROM ".TABLE_REPLY.", ".TABLE_USER." WHERE ".TABLE_REPLY.".user_id=".TABLE_USER.".user_id AND ".TABLE_REPLY.".topic_id='$id'" );
	if( num( $sql ) == 0 ) {
		echo "<h1>Belum ada tanggapan</h1>";
		echo "<p>Belum ada tanggapan saat ini untuk topik ini.</p>";
	} else {
		echo "<h1>".num( $sql )." Tanggapan</h1>";
		echo "<div class=\"reply\">";
		while( $row = fetch( $sql ) ) {
			echo "<p>Commented by: <b>{$row['fullname']}</b> | Date: ".date( "l, F d, Y H:i:s A", $row['date'] )."<br>{$row['reply']}</p>";
		}
		echo "</div>";		
	}
	echo "</div>";
}



?>