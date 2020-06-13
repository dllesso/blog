
<center>
<p><a href="index.php">MAIN</a> | <a href="obomne.php">KONTAKT</a> |
</center>
<hr />
<center>
<em>This is the admin page</em><br />
</center>
<?php
require "includes/config.php";
?>
<form method="POST" action="admiin.php">
<?php
if( isset ($_POST['do_post'] ))
{
$errors = array();

if($_POST['title'] == ''){$errors[] = 'введите название';}
if($_POST['image'] == ''){$errors[] = 'введите название image';}
if($_POST['text'] == ''){$errors[] = 'введите text';}
if($_POST['categories_id'] == ''){$errors[] = 'введите categories_id';}

if(empty($errors)){
//доб коммент
mysqli_query($connection, "INSERT INTO `articles` (`title` , `image` , `text`  ,`categories_id` , `pubdate` ) VALUES('".$_POST['title']."' ,'".$_POST['image']."' ,'".$_POST['text']."', '".$_POST['categories_id']."', NOW())");
echo ' успешно добавлен';
}else { 
echo $errors['0']. '<hr>';
}
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
</ br>
<center>
<em>zagolovok:</em><input type="title" name = "title" class="form_control" placeholder ="header" value=<?php echo $_POST['title'];?>></br></br>
<em>image:</em><input type="text" name = "image" class="form_control" placeholder ="the name of the picture" value=<?php echo $_POST['image'];?>></br></br>
<textarea name="text" placeholder="text of article..."><?php echo $_POST['text'];?></textarea></br></br>
<em>id:</em><input type="categories_id" name = "categories_id" class="form_control" placeholder ="category" value=<?php echo $_POST['categories_id'];?>></br></br>
<input type="submit" name="do post" value="Add article"/></br>
</form>
<a href="admin.php">Exit</a>
</center>
</body>