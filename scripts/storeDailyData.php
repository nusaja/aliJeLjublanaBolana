<?php 

require_once('../src/model.php');

$line = get_daily_data(); 

$fp = fopen("../storage/dataHistory.csv", "a");
fputcsv($fp, $line); 
fclose($fp);

function get_daily_data() {

    $data = file_get_contents('http://www.arso.gov.si/xml/zrak/ones_zrak_dnevni_podatki_zadnji.xml');
    $data = new SimpleXMLElement($data);

    $values = [
        "PM2.5" => (string) $data->postaja[1]->xpath("pm2.5_dnevna")[0],
        "PM10" => (string) $data->postaja[1]->pm10_dnevna,
        //"OZON" => (string) $data->postaja[0]->o3_max_8urna,
        //"SO2" => (string) $data->postaja[0]->so2_dnevna,
        //"NO2" => (string) $data->postaja[0]->no2_max_urna,
    ];

    $elements = [];

    list($answer, $elevated_values) = yes_or_no($values);

    $line =[date("Y-m-d"), $answer];

    foreach ($elevated_values as $key => $value) {

        $line[] = $key;
        $line[] = $value;

    }

    return $line;

}

