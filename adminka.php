<?php
require "includes/config.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta charset="utf-8" />
<title>статьи</title>
 <link rel="shortcut icon" href="img1/bg.gif">
<link type ="text/css" href="file.css" rel="stylesheet" media="screen"/>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta charset="utf-8" />
<title>статьи</title>
 <link rel="shortcut icon" href="img1/bg.gif">
<link type ="text/css" href="file.css" rel="stylesheet" media="screen"/>
</head>
<body class ="class4">
<?php
include"includes/header.php";
?>

<?php
$article = mysqli_query($connection, "SELECT * FROM `articles`);

   while( $artt = mysqli_fetch_assoc($article) )
{
?>
<br>
<em><?php echo $artt['title'] . ":"; ?></em>

<br>
<?php echo $artt['text']; ?>
<?php echo $artt['categories_id']; ?>
<?php
}

?>
</div>
<div>
<a name = "top"><em>добавить свою статью</em></a><br>
<form method="POST" action="adminka.php">
<?php
if( isset ($_POST['do_post'] ))
{
$errors = array();

if($_POST['title'] == ''){$errors[] = 'введите заголовок';}
if($_POST['text'] == ''){$errors[] = 'введите текст статьи';}
//if($_POST['email'] == ''){$errors[] = 'введите моя почта';}
if($_POST['categories_id'] == ''){$errors[] = 'введите категорию';}
if(empty($errors)){
//доб коммент
mysqli_query($connection, "INSERT INTO `articles` (`title` , `text`  , `categories_id` ) VALUES('".$_POST['title']."' , '".$_POST['text']."', '".$_POST['categories_id']."')");
echo 'статья успешно добавлен';
}else { 
echo $errors['0']. '<hr>';
}
}
?>
<br>
<em class = "b">заголовок:
</em><input type="title" name = "title" class="form_control" placeholder ="заголовок" value=<?php echo $_POST['title'];?>>
<br>

<textarea name="text" placeholder="текст статьи..." rows="10" cols="50"><?php echo $_POST['text'];?></textarea>
<input type="categories_id" name = "categories_id" class="form_control" placeholder ="категория статьи" value=<?php echo $_POST['categories_id'];?>>

<input type="submit" name="do post" value="добавить"/>

</form>
</div>
</body>
