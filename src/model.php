<?php

define("MAX_VALUES_WHO", [
    "PM2.5" => 15,
    "PM10" => 45,
    "OZON" => 100,
    "SO2" => 40,
    "NO2" => 200
]);

define("MAX_VALUES_SLO", [
    "PM2.5" => null,
    "PM10" => 50,
    "OZON" => 120,
    "SO2" => 125,
    "NO2" => 200
]);

define("DESCRIPTIONS", [
    "PM2.5" => "PM2.5 so fini delci v zraku, katerih premer je manjši od 2,5 mikrometra in so nevidni prostemu očesu - 
    za primerjavo, bakterije merijo od 0,5 do 5 mikrometrov. 
    Ti delci se zadržujejo v atmosferi več tednov, preden se poležejo na površine, 
    od koder so sčasoma sprani s padavinami ali ponovno vnešeni v zrak s šibkim vetrom. Dokler se delci nahajo v zraku, 
    imajo tudi najmočnejše padavine minimalen \"spiralni\" učinek nanje - zrak po dežju ni očiščen. 
    Ti delci prodrejo v pljučne mešičke, od tam v kri in v tkiva, organe, ob nosečnosti tudi do ploda skozi 
    placento. So zelo škodljivi za zdravje; povzročajo raka, respiratorne in srčnožilne bolezni. Povezani so z nastankom avtoimunih bolezni. 
    Vsakodnevni vir PM2.5 delcev v Ljubljani so predvsem izpusti iz kurilnih naprav in cestnega prometa.
    Koncentracija PM2.5 redno presega mejne vrednosti svetovne zdravstvene organizacije in s tem uvršča Ljubljano 
    med najbolj onesnažena mesta v Evropi. <br />
    V Uredbi o kakovosti zunanjega zraka mejna vrednost za koncentracijo PM2.5 ni določena.",  
    "PM10" =>  ""
]);

function get_current_data() {

    $data = file_get_contents('http://www.arso.gov.si/xml/zrak/ones_zrak_dnevni_podatki_zadnji.xml');
    $data = new SimpleXMLElement($data);

    $values = [
        "PM2.5" => (string) $data->postaja[0]->xpath("pm2.5_dnevna")[0],
        "PM10" => (string) $data->postaja[0]->pm10_dnevna,
        //"OZON" => (string) $data->postaja[0]->o3_max_8urna,
        //"SO2" => (string) $data->postaja[0]->so2_dnevna,
        //"NO2" => (string) $data->postaja[0]->no2_max_urna,
    ];

    $elements = [];

    list($answer, $elevated_values) = yes_or_no($values);

    foreach ($elevated_values as $key => $value) {

        $element["value"] = $value;
        $element["slo"] = MAX_VALUES_SLO[$key];
        $element["who"] = MAX_VALUES_WHO[$key];
        $element["label"] = $key;
        $element["text"] = DESCRIPTIONS[$key];
        $elements[] = $element;

    }

    return [$elements, $answer];

}

function yes_or_no($values) {
    
    $elevated_values = [];
    $answer = "NE";

    foreach ($values as $key => $value) {
        if ($value >= MAX_VALUES_WHO[$key]) {
            $answer = "JA";
            $elevated_values[$key] = $value;  
        } 
    }    

    return [$answer, $elevated_values];

}



