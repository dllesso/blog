﻿<?php
require "includes/config.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta charset="utf-8" />
<title>статьи</title>
 <link rel="shortcut icon" href="img1/bg.gif">
<link type ="text/css" href="file.css" rel="stylesheet" media="screen"/>
</head>
<body class ="class5">
<?php
include"includes/header.php";
?>
<br>
<br>
<br>
<div>
<?php
$result2 = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id`= ".(int)$_GET['id']);
$art = mysqli_fetch_assoc($result2);
if ( mysqli_num_rows($result2) <=0 )
{
?>
<h3>статья не найдена</h3>
<?php
}else
{
mysqli_query($connection, "UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = " . (int) $art['id']);
?>
<a><em><?php echo $art['views']; ?> просмотров</em></a>
<h2><?php echo $art['title']; ?></h2>
<?php  echo $art['text'];?>

<hr></hr> <em>комментарии:</em><br>

}
<?php
$comments = mysqli_query($connection, "SELECT * FROM `comments` WHERE `articles_id` = " .(int) $art['id'] . "ORDER BY `id` DESC");
?>
</div>
</body>