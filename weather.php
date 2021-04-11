<?php
header("Access-Control-Allow-Origin: *");
setlocale(LC_ALL, "ru_RU");
date_default_timezone_set("Asia/Yakutsk");

$opts = array(
  'http' => array(
    'method' => "GET",
    'header' => "X-Yandex-API-Key: c239e3e5-f75a-42e1-9165-ef6fddb3fe24"
  )
);

$url = "https://api.weather.yandex.ru/v1/forecast?lat=63.596782&lon=121.479194&limit=1&hours=false&extra=false";
$context = stream_context_create($opts);
$contents = file_get_contents($url, false, $context);
$clima = json_decode($contents);

$time_unix = $clima->fact->obs_time;
$temp = $clima->fact->temp;
$humidity = $clima->fact->humidity;
$speed = $clima->fact->wind_speed;
$pressure = $clima->fact->pressure_mm;
$icon = $clima->fact->icon . ".svg";

$today = date("j/m/Y, H:i");
$time = date("j/m/Y, H:i", $time_unix);

echo "Дата/Вреемя:" . " - " . $today . "<br>";
echo "Обновлено:" . " - " . $time . "<br>";
echo "Температура: " . $temp . " &deg;C<br>";
echo "Влажность: " . $humidity . " %<br>";
echo "Ветер: " . $speed . " м/с<br>";
echo "Давление: " . $pressure . " мм р/с<br>";
echo "<img src='https://yastatic.net/weather/i/icons/blueye/color/svg/" . $icon . "'/ width='50'>";