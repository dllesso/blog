<?php
require "auth.php";
?>
<p><a href="index.php">�������</a> | <a href="contact.php">��������</a> | <a href="admin.php">�������</a></p>
<hr />
��� �������� ��������������<br />

<form method = "post" action = "">
�������� ������<br/> 
<input type="text" name="title" /><br/> 
����� ������<br/> 
<textarea cols-"40" rows-"10"></textarea>


<input type="hidden" name="date" value="<?php echo date('y-m-d');?>" /><br/> 
<input type="hidden" name="time" value="<?php echo date('H-i-s');?>"/><br/> 

<input type="submit" name="add" value="��������� ������" />

</form>

<?php
require "includes/config.php";
?>

<a href="admin.php?do=logout">�����</a>

