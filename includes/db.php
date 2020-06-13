<?php
$connection = mysqli_connect(
   $config['db']['server'], 
   $config['db']['username'],
   $config['db']['passvord'],
   $config['db']['name']
   );                              
  
if($connection == false)
{
echo "не удалось подключиться к БД";
echo mysqli_connect_error();
exit();
}else
{
echo "<em>Welcome to our website:</em>";
}

?>