<?php
// Введенный IP получаем
$need_ip = $_POST['ip'];
// Получаем IP пользователя
$query1 = "http://ip-api.com/json/?fields=61439";
// Получаем информацию о введенном IP
$query2 = "http://ip-api.com/json/{$need_ip}?fields=status,message,country,countryCode,region,regionName,city,zip,lat,lon,timezone,isp,org,as,query";
// Получаем данные со ссылок через file_get_content
$fgc1 = file_get_contents($query1);
$fgc2 = file_get_contents($query2);

// Преобразовываем возвращаемые объекты в асоциативные массивы
$fgc_dec1 = json_decode($fgc1, true);
$fgc_dec2 = json_decode($fgc2, true);

// Пустой массив для получаемых данных
$dt = [];
// Заполняем данными асоциативный массив
$dt['dt_create'] = date('d.m.Y h:i:s');
$dt['dt_change'] = date('d.m.Y h:i:s');
$dt['ip_client'] = $fgc_dec1['query'];
$dt['ip_need']   = $fgc_dec2['query'];
$dt['country_from_response'] = $fgc_dec2['country'];
$dt['response']  = $fgc2;
// Массив для проверки на стороне скрипта
$rs = ['success' => 1, 'message' => 'данные получены!', 'res' => $dt, ];
// Возвращаем данные в скрипт
echo json_encode($rs);
