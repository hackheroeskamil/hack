<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <title>Safe World</title>
    <script>
        levels = "[Extreme,Extreme]";
        areas = "[Toscana,Toscana]";
        type = "[Extreme Thunderstorm Warning,Extreme Rain Warning]";
    </script>
</head>

<body>
    <?php

$today = date("d.m.y");
$levels = array();
$areas = array();
$type = array();
$i=0;
$plik="alerts.txt";
$file=fopen($plik, "r");
flock($file, 1);
while(!feof($file)) {
if($i%3==0){
  array_push($levels , explode(',',trim(fgets($file))));
}
else if($i%3==1){
  array_push($areas , explode(',',trim(fgets($file))));
}
else{
  array_push($type , explode(',',trim(fgets($file))));
}
$i++;
}
flock($file, 3);
fclose($file);


echo var_dump($areas  );
?>
