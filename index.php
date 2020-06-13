<?php
require "includes/config.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta charset="utf-8" />
<title><?php echo $config['title']; ?></title>
 <link rel="shortcut icon" href="img1/bg.gif">
<link type ="text/css" href="file.css" rel="stylesheet" media="screen"/>
<link type ="text/css" href="logotip.css" rel="stylesheet" media="screen"/>
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
<style> 
    .small { font: italic 17px sans-serif; fill: red;} 
	.small1 { font: italic 17px sans-serif; fill: yellow;}
    .small2 { font: italic 17px sans-serif; fill: gray;}
	.small3 { font: italic 17px sans-serif; fill: orange;}
	.small4 { font: italic 17px sans-serif; fill: green;}
  </style>
<center>
  <svg class = "cvadrik" ><cvadrik x1="220" y1="20" stroke="black" stroke-width="2"/><text  x="50%" y="50%" alignment-baseline="middle" text-anchor="middle" class="small">S</text></svg>
  <svg class = "cvadrik1"><cvadrik1 x1="220" y1="20" stroke="black" stroke-width="2"/><text x="50%" y="50%" alignment-baseline="middle" text-anchor="middle" class="small1">V</text></svg>
  <svg class = "cvadrik2"><cvadrik2 x1="220" y1="20" stroke="black" stroke-width="2"/><text x="50%" y="50%" alignment-baseline="middle" text-anchor="middle" class="small2">T</text></svg>
  <svg class = "cvadrik3"><cvadrik3 x1="220" y1="20" stroke="black" stroke-width="2"/><text x="50%" y="50%" alignment-baseline="middle" text-anchor="middle" class="small3">B</text></svg>
  <svg class = "cvadrik4"><cvadrik4 x1="220" y1="20" stroke="black" stroke-width="2"/><text x="50%" y="50%" alignment-baseline="middle" text-anchor="middle" class="small1">L</text></svg>
  <svg class = "cvadrik5"><cvadrik4 x1="220" y1="20" stroke="black" stroke-width="2"/><text x="50%" y="50%" alignment-baseline="middle" text-anchor="middle" class="small4">O</text></svg>
  <svg class = "cvadrik" ><cvadrik x1="220" y1="20" stroke="black" stroke-width="2"/><text x="50%" y="50%" alignment-baseline="middle" text-anchor="middle" class="small2">G</text></svg>
  <svg class = "cvadrik2"><cvadrik2 x1="220" y1="20" stroke="black" stroke-width="2"/><text x="50%" y="50%" alignment-baseline="middle" text-anchor="middle" class="small1">.</text></svg>
   <svg class = "cvadrik4"><cvadrik4 x1="220" y1="20" stroke="black" stroke-width="2"/><text x="50%" y="50%" alignment-baseline="middle" text-anchor="middle" class="small3">R</text></svg>
  <svg class = "cvadrik5"><cvadrik4 x1="220" y1="20" stroke="black" stroke-width="2"/><text x="50%" y="50%" alignment-baseline="middle" text-anchor="middle" class="small1">U</text></svg>
</center>
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
<center>
<?php
$i=0;
foreach($result1 as $cat)
{
?>
<img src = "img1/<?php echo "$i";?>.gif"/><a href="categorie.php? categories_id=<?php echo $cat['id'];?>"> 
<?php
echo $cat['title']; ?></a>
<?php
$i++;
}
?>
</center>
<hr>
<center><em><a href="articles.php? "><img src = "img1/kniga.png"/> все     записи</a></center>
<h3>топ 5 читаемых</h3>


<div class ="spis">
<?php
while($art=mysqli_fetch_assoc($result2))
{
?>
<div class ="im">
<img src = "img2/top5.jpg"/>
</div>

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

Категория:<a href = "categorie.php?categories_id=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a>
<p class="green"><?php echo'статья:   '. mb_substr(strip_tags($art['text']), 0, 150,'utf-8').' ...';?></p><br><br><br><br><br><br><hr>
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
<div class ="im" style="background-image: url(img1/<?php  echo $art['image'];?>);">         
</div>
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

Категория:<a href = "categorie.php? categories_id=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a>
<p class="green"><?php echo'статья:   '. mb_substr(strip_tags($art['text']), 0, 150,'utf-8').' ...';?></p>
</div> 
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
<center><?php
include"includes/header.php";
?>
<a href="includes/copirate.php"><img src = "img1/gl.gif"/> Правообладатель</a>;
</center>
<center><h3> Посещений сайта
<?php
$filename = "counter.txt";
$fp = @fopen($filename,"r");
if ($fp)
{
$counter = fgets ($fp,10);
fclose($fp);
} else { $counter = 0; }
$counter++;
echo $counter;
$fp = @fopen($filename,"w");
if ($fp)
{
$counter = fputs($fp,$counter);
fclose($fp);
}
?></h3></center>
</body>
</html>