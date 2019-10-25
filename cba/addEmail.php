<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <title>Safe World</title>
</head>

<body>
    <?php
//otwieranie pliku z emaliami jest on dostępny tylko dla serwera wiec nikt bez prawa właściciela nie może wejść do pliku
$today = date("d.m.y");
$emails = array();
$dates = array();
$regions = array();
$i=0;
$plik="emails.txt";
$file=fopen($plik, "r");
flock($file, 1);
while(!feof($file)) {
if($i%3==0){
  array_push($emails , fgets($file));
}
else if($i%3==1){
  array_push($regions,fgets($file));
}
else{
  array_push($dates, fgets($file));
}
$i++;
}
flock($file, 3);
fclose($file);

//zapiszywanie pliku z dodaną osobą
$file=fopen($plik, "w");
 flock($file, 2);
foreach ($emails as $key=>$email)
{
    fwrite($file, $email);
    fwrite($file, $regions[$key]);
    fwrite($file, $dates[$key]);
}
    fwrite($file, "\n".$_POST['email']. "\n");
    fwrite($file, $_POST['region']. "\n");
    fwrite($file, "registerDay");
 flock($file, 3);
 fclose($file); 


   header('Location: https://safe-world.000webhostapp.com/');

?>

</body>

</html>					