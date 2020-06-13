<?php
$result2 = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id`=".(int)$_GET['id']);
?>