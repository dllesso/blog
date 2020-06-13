<?php
require "auth.php";
?>
<p><a href="index.php">Главная</a> | <a href="contact.php">Контакты</a> | <a href="admin.php">Админка</a></p>
<hr />
Это страница администратора<br />

<form method = "post" action = "">
Название статьи<br/> 
<input type="text" name="title" /><br/> 
Текст статьи<br/> 
<textarea cols-"40" rows-"10"></textarea>


<input type="hidden" name="date" value="<?php echo date('y-m-d');?>" /><br/> 
<input type="hidden" name="time" value="<?php echo date('H-i-s');?>"/><br/> 

<input type="submit" name="add" value="добавляем статью" />

</form>

<?php
require "includes/config.php";
?>

<a href="admin.php?do=logout">Выход</a>

