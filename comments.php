<link type ="text/css" href="file.css" rel="stylesheet" media="screen"/>
<hr></hr> <em class = "b">комментарии:</em>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<a href = "#top">добавить свой комментарий</a>


<?php
$comments = mysqli_query($connection, "SELECT * FROM `comments` WHERE `articles_id` = 
              " . (int) $art['id']);
if(mysqli_num_rows($comments) <=0)
{
?>
<h5>no comments</h5>
<?php
}else
{
   while( $com = mysqli_fetch_assoc($comments) )
{
?>
<br>



<?php 
$comid=$com['id'];
?>
<?php echo $com['autor'] . ":"; ?><br>

<?php echo $com['text']; ?>
<form action = "" method = "post">

<input type = "submit" name ="<?php echo "id=". $com['id']. "ответ на комментарий" ;?>" value = "<?php echo "ответ на комментарий:";?>" />

&nbsp &nbsp &nbsp &nbsp &nbsp <input type = "text" style="width: 1px; height: 1px;" name = "text" value="<em><h6><?php echo "ответ на комментарий:";?></h6><br><?php echo $com['autor'];?><br><?php echo $com['text'];?><br>_______________<br><br/></em>"/>

</br>
</form>
<?php
}
}?>
