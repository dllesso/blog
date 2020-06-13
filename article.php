<?php
require "includes/config.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta charset="utf-8" />
<title>статьи</title>
 <link rel="shortcut icon" href="img1/bg.gif">
<link type ="text/css" href="file.css" rel="stylesheet" media="screen"/>
</head>
<body class ="class4"> </br>
<span style="position: fixed; top: 100px; left: 0;">
<a href = "#top1"><img src ="img1/strelka1.png"></a>
</br>
<a href = "#top"><img src ="img1/strelka.png"></a>
</span>
<?php
include"includes/header.php";
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div>

<?php
$comid=0;
$comcom = mysqli_query($connection, "SELECT * FROM `comments` WHERE `id`=".(int)$comid);
$com1 = mysqli_fetch_assoc($comcom);
?>
<?php
$result2 = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id`=".(int)$_GET['id']);
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

<a><em class = "b"><?php echo $art['views']; ?> просмотров</em></a>
<a name = "top1"></a>
<h2><?php echo $art['title']; ?></h2>

<br />
<div class ="im2" style="background-image: url(img2/<?php  echo $art['image'];?>);">
</div>
<br />
<br />
<br />
<br />
<br />

<?php  echo $art['text'];?>
<?php
include"comments.php";

}
?>

</div>


<div>
<a name = "top"><em class = "b">добавить свой комментарий</em></a><br>
<form method="POST" action="article.php?id=<?php echo $art['id']; ?>">
<?php
if( isset ($_POST['do_post'] ))
{
$errors = array();

if($_POST['name'] == ''){$errors[] = 'введите имя';}
//if($_POST['nickname'] == ''){$errors[] = 'введите nickname';}
//if($_POST['email'] == ''){$errors[] = 'введите моя почта';}
if($_POST['text'] == ''){$errors[] = 'введите текст комментария';}
if(empty($errors)){
//доб коммент
mysqli_query($connection, "INSERT INTO `comments` (`autor` , `text`  , `pubdate`, `articles_id` ) VALUES('".$_POST['name']."' , '".$_POST['text']."', NOW(), '".$art['id']."')");
echo 'комментарий успешно добавлен';
?>
<?php
$fd = fopen("co.txt", 'w'); 
$str = $art['id'];
fwrite($fd, $str);
fclose($fd);
?>
<html> <head><meta http-equiv="Content-Type" Content="text/html; Charset=Windows-1251"><meta http-equiv="Refresh" content="1; URL=per.php"> <title>perehod</title> </head> <body><font size="+1"><br>perehod</font> </body></html>
<?php
}
else { 
echo $errors['0']. '<hr>';
}
}
?>
<br>
<em class = "b">имя:</em><input type="text" name = "name" class="form_control" placeholder ="имя" value=<?php echo $_POST['name'];?>>
<br>

<textarea name="text" placeholder="текст комментария..." rows="10" cols="90"><?php echo $_POST['text'];?></textarea>


<input type="submit" name="do post" value="Добавить"/>
<input type="reset" name="do post" value="Очистить"/>

</form>
</div>
</body>