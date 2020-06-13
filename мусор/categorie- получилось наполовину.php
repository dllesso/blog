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
$ids=1;
$stat = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categories_id` = ". (int) "$ids");
?>
<?php
   while($st = mysqli_fetch_assoc($stat))
{
?>
<br>
<em><?php
 echo $st['title']. ":"; 
?></em>

<br>
<?php 
echo $st['text'];
?>
<?php
}
?>

</body>
</html>