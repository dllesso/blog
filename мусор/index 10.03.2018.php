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
<body>
<h3><?php echo $config['title']; ?></h3>

<marquee><pre> <em><h2><img src="img1/der.gif"/></marquee><br>
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
$result1 = mysqli_query($connection, " SELECT * FROM`articles_categories`");
$result2 = mysqli_query($connection, " SELECT * FROM`articles` ORDER BY `VIEWS` DESC LIMIT 5");
?>
<?php
$result1_one = mysqli_query($connection, " SELECT * FROM`articles_categories`");
$result1 = array();
while($cat=mysqli_fetch_assoc($result1_one))
{
$result1[] = $cat;
}
?>
<?php
$i=0;
foreach($result1 as $cat)
{
?>
<img src = "img1/<?php echo "$i";?>.gif"/><a href="/articles.php? categorie=<?php echo $cat['id'];?>"> 
<?php
echo $cat['title']; ?></a>
<?php
$i++;
}
?>
<hr>
<em><a href="article.php? "><img src = "img1/gl.gif"/> все     записи</a>
<h3>топ 5 читаемых</h3>


<div class ="spis">
<?php
while($art=mysqli_fetch_assoc($result2))
{
?>
<a href="article.php? id=<?php echo $art['id'];?>"><?php echo $art['title'];?></a>

<?php
$art_cat = false;
foreach($result1 as $cat)
{
if($cat['id'] == $art['categories_id'])
{
$art_cat = $cat;
}
}

?>
Категория:<a href = "/articles.php?categorie=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a>
<p class="green"><?php echo'статья:   '. mb_substr(strip_tags($art['text']), 0, 150,'utf-8').' ...';?></p><hr>
<?php
}
?>
</div>

<?php
$result2 = mysqli_query($connection, " SELECT * FROM`articles` ORDER BY `id` DESC LIMIT 5");
?>
<h3>новые статьи</h3>
<?php
while($art=mysqli_fetch_assoc($result2))
{
?>
<div>
<a href="article.php? id=<?php echo $art['id'];?>"><?php echo $art['title'];?></a>

<?php
$art_cat = false;
foreach($result1 as $cat)
{
if($cat['id'] == $art['categories_id'])
{
$art_cat = $cat;
}
}

?>

Категория:<a href = "/articles.php?categorie=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a>
<p class="green"><?php echo'статья:   '. mb_substr(strip_tags($art['text']), 0, 150,'utf-8').' ...';?></p></div> 
<?php
}
?>
<br>
<br>
<br>
<br>

<p class ="glav">
<br>
<br>
<br>
<br>
<br>
</p>


<br>
<br>
<br>
<br>
<br>
<br>
</p>
<?php
include"includes/header.php";
?>
<a href="includes/copirate.php"><img src = "img1/gl.gif"/> Правообладатель</a>;

</body>
</html>