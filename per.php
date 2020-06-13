<?php 
$filen = "co.txt";
$fpr = fopen($filen,"r");
if ($fpr)
{
$count = fgets ($fpr,10);
fclose($fpr);
}
?>
<html> <head><meta http-equiv="Content-Type" Content="text/html; Charset=Windows-1251"><meta http-equiv="Refresh" content="1; URL=article.php?id=<?php echo $count; ?>"> <title>article</title> </head> <body><font size="+1"><br>zagruzka kommentaryia</font> </body></html>
<?php echo "id cnfnmb"; ?>