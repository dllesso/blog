<?php
header ("Content-Type: text/html; charset= utf-8");
session_start();
if($_SESSION['admin']){
	header("Location: admin.php");
	exit;
}

$admin = 'admin';
$pass = 'ee95a16d763ab0d26ee62c53056df928';

if($_POST['submit']){
	if($admin == $_POST['user'] AND $pass == md5($_POST['pass'])){
		$_SESSION['admin'] = $admin;
		header("Location: admin.php");
		exit;
	}else echo '<center><p class="red"> Wrong password or login! </p></center>';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta charset="utf-8" />
<title><?php echo $config['title']; ?></title>
 <link rel="shortcut icon" href="img1/bg.gif">
<link type ="text/css" href="file.css" rel="stylesheet" media="screen"/>
</head>
<body class ="class4">
<br /><br />
<center><p><a href="index.php">MAIN</a> </center>
<hr /><br /><br /><br /><br /><br /><br />
<center> <em>AUTHORIZATION</em>
<br /><br /><br />
<form method="post">
	Username: <input type="text" name="user" /><br />
	<br /><br />
	Password: <input type="password" name="pass" /><br /><br />
	<input type="submit" name="submit" value="Input" />
</form>
</center>

</body>