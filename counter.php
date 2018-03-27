
<?php

/* Brojac */

//opens count.txt to read the number of hits

$datei = fopen("count.txt", "r");
$count = fgets($datei, 1000);
fclose($datei);

$count = $count + 1;

echo "<span class='counter'> Broj posetilaca do sada: ($count) </span>";

//opens count.txt to change new hit number

$datei = fopen("count.txt","w");
fwrite($datei, $count);
fclose($datei);

?>
