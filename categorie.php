<?php
require "includes/config.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta charset="utf-8" />
<title><?php echo $config['title']; ?></title>
 <link rel="shortcut icon" href="img1/bg.gif">
<link type ="text/css" href="file.css" rel="stylesheet" media="screen"/>
</head>
<body class ="class4">
<h3><?php echo $config['title']; ?></h3>
<br>
<br>
<br>
<?php
include"includes/header.php";
?>
<hr>
<pre>                                       Доброго времени суток!!!
                                 Мы рады видеть Вас на нашем сайте, созданном для молодых семей или для
                            тех кто только собирается создать семью. Здесь Вы найдёте много полезной инфориации,
               которую мы собирали основываясь на собственном опыте и находили верный результат методом проб и ошибок.                        
</pre>

<?php
$stat = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categories_id` = ". (int)$_GET['categories_id']);
?>
<?php 
$privet = $_GET['categories_id'];
if($privet == 4)
{
	?>
	<div class = "spis">
<center>
<p class ="privet">Давайте знакомиться! </br>Меня зовут Светлана.</br> В своем блоге я рассказываю об интересных ситуациях из жизни – таких, на которые можно посмотреть с разных сторон. Мне интересно ваше мнение! Пишите, комментируйте, описывайте случаи, известные вам. Постараюсь ответить на все комментарии, ведь каждое мнение имеет право на жизнь!"</p>
</center>
</div>
<?php
}
if($privet == 3)
{
	?>
	<div class = "spis">
<center>
<p class ="privet">ЮМОР</p>
</center>
</div>
<?php
}
if($privet == 2)
{
	?>
	<div class = "spis">
<center>
<p class ="privet">СПОРТ И ОТДЫХ</p>
</center>
</div>
<?php
}
if($privet == 1)
{
	?>
	<div class = "spis">
<center>
<p class ="privet">ЗДОРОВЬЕ</p>
</center>
</div>
	<?php

	
}else
{
	echo $_GET['categories_id'];
}	
?>
<?php
   while($st = mysqli_fetch_assoc($stat))
{

?>
<div>
<div class ="im2" style="background-image: url(img2/<?php  echo $st['image'];?>);">
</div>
<br>
<a href="article.php? id=<?php echo $st['id'];?>"><?php echo $st['title']; ?></a>
<p class="green"><?php echo'статья:   '. mb_substr(strip_tags($st['text']), 0, 300,'utf-8').' ...';?></p>
</div>
<?php
}
?>

</body>
</html>