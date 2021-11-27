<?php

$date = date("Y-m-d H:i:s"); // ustalenie formatu daty
$name = "Adrian Klokow";
$port = $_SERVER["SERVER_PORT"]; // ustalenie portu na ktorym sie laczymy
$logi = "Data uruchomienia: $date, Imię: $name, Port: $port\n"; // przygotowanie wiadomosci do wyswietlenia
file_put_contents('./log_'.date("j.n.Y").'.log', $logi, FILE_APPEND); // zapis do pliku
$klient = "";
if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $klient = $_SERVER['HTTP_CLIENT_IP'];
}
else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { // sprawdzamy czy adres ip jest z proxy
    $klient = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
else {
    $klient = $_SERVER['REMOTE_ADDR']; // sprawdzamy czy adres ip jest remote
}
$token = "awDEvbNqIzQyAvSljmyY"; // token do pozyskiwania danych
$json = file_get_contents("http://timezoneapi.io/api/ip/?$klient&token=$token&output=json"); // pozyskujemy json z api timezoneapi.io
$data = json_decode($json, true); // odczytanie json'a
$clientTime = "";
if($data['meta']['code'] == '200'){
    $time = $data['data']['datetime']['date_time'];
    $clientTime = date("Y-m-d H:i:s", strtotime($time));
}
else {
    $clientTime = "Blad";
}
echo "Data: $date<br/>"; // wyswietlenie danych
echo "Imię i nazwisko studenta: $name<br/>";
echo "Port: $serverPort<br/>";
echo "Adres klienta: $clientAddress<br/>";
echo "Czas u klienta: $clientTime<br/>";
