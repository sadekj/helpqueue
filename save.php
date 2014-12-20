<?php 
$tasktitle = $_POST['tasktitle'];
setlocale(LC_TIME, "fi_FI"); 
date_default_timezone_set("Europe/Helsinki");
$date = strftime("%Y-%m-%d-%A");
$timesaved = strftime("%H:%M:%S");
$elapsedtime = $_POST['current_time'];
$file = "saved/".$date.".txt";
$cont = 'time finished: '.$timesaved.' - time elapsed: '.$elapsedtime.' - task name: '.$tasktitle.''. "\n"; 

$f = fopen ($file, 'a+');
fwrite($f, $cont);
fclose($f);
?>