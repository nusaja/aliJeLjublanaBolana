<?php

$data = file_get_contents('http://www.arso.gov.si/xml/zrak/ones_zrak_dnevni_podatki_zadnji.xml');

$data = new SimpleXMLElement($data);

$values = [
    "PM2.5" => (string) $data->postaja[0]->xpath("pm2.5_dnevna")[0],
    "PM10" => (string) $data->postaja[0]->pm10_dnevna,
    "OZON" => (string) $data->postaja[0]->o3_max_8urna,
    "NOX" => (string) $data->postaja[0]->no2_max_urna,
    "CO" => (string) $data->postaja[0]->co_max_8urna
];

$max_values = [
    "PM2.5" => 15,
    "PM10" => 45,
    "OZON" => 100,
    "NOX" => 25,
    "CO" => 10
];

$answer = "NE";
$elevated_values = [];

foreach ($values as $key => $value) {
    if ($value >= $max_values[$key]) {
        $answer = "NE";
        $elevated_values[$key] = $value;  
    } 
}

$currentImagePath = $answer . ".jpg";
