<?php

/* counter */

//opens countlog.txt to read the number of hits
/*$datei = fopen("countlog.txt","r");
$count = fgets($datei,1000);
fclose($datei);
$count=$count + 1 ;
echo "$count" ;
echo " hits" ;
echo "\n" ;

// opens countlog.txt to change new hit number
$datei = fopen("countlog.txt","w");
fwrite($datei, $count);
fclose($datei);
*/
?>

<?php
$filename = "countlog.txt" ;
 
$file = file($filename);
$file = array_unique($file);
$hits = count($file);
echo $hits;
 
$fd = fopen ($filename , "r");
$fstring = fread ($fd , filesize ($filename)) ;
fclose($fd) ;
$fd = fopen ($filename , "w");
$fcounted = $fstring."\n".getenv("REMOTE_ADDR");
$fout= fwrite ($fd , $fcounted );
fclose($fd);
?>

