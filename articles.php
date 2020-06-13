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
$per_page = 4; //переменная отв за кол-во статей на странице
$page = 1; //переменная номера страницы

if( isset($_GET['page']))
{
$page = (int)$_GET['page'];
}
$total_count_q = mysqli_query($connection, " SELECT COUNT(`id`) AS `total_count` FROM`articles`"); 
$total_count = mysqli_fetch_assoc($total_count_q);
$total_count = $total_count['total_count'];
$total_pages = ceil($total_count / $per_page);
if( $page < 0 || $page > $total_pages)
{
$page = 1;
}

$offset = ($per_page * $page) - $per_page;

$result2 = mysqli_query($connection, " SELECT * FROM`articles` ORDER BY `id` DESC LIMIT $offset,$per_page");// выводим 4 статьи на стр

?>
<?php
$result1_one = mysqli_query($connection, " SELECT * FROM`articles_categories`"); //переменная категорий статей
$result1 = array();
while($cat=mysqli_fetch_assoc($result1_one))//цикл вывода категорий статей
{
$result1[] = $cat;
}
?>
<hr>

<h3>все статьи</h3>
<?php
while($art=mysqli_fetch_assoc($result2))
{
?>
<div>
<div class ="im2" style="background-image: url(img2/<?php  echo $art['image'];?>);">
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
<p class="green"><?php echo'статья:   '. mb_substr(strip_tags($art['text']), 0, 1000,'utf-8').' ...';?></p></div> 
<?php
}
if( mysqli_num_rows($result2)>0)
{
echo'<div class ="spis">';

if($page>1)
{
echo '<img src = "img1/le.gif"><a href = "articles.php?page='.($page-1).'"><?php echo "$page";?> предыдущая страница </a> &nbsp &nbsp &nbsp &nbsp';
}
echo "$page";

if($page < $total_pages)
{
echo '&nbsp &nbsp &nbsp &nbsp <a href = "articles.php?page='.($page+1).'"> страница следующая </a><img src = "img1/pr.gif">';
}
echo'</div>';

//echo 'Страница'; //,$GET['page'],';
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