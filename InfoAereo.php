<?php

include "Session.php";
    session();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $Marca = $_POST["Marca"];
    $Modello = $_POST["Modello"];
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL =>"https://aircraft-by-api-ninjas.p.rapidapi.com/v1/aircraft?manufacturer=".$Marca."&model=".$Modello,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: aircraft-by-api-ninjas.p.rapidapi.com",
            "X-RapidAPI-Key: c17d1ca95bmsh17e200c95ef1237p146c73jsn11d94a5a6c18"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);
    $jsonResponse = json_decode($response, true);
    curl_close($curl);
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
       
        $json=json_encode($jsonResponse);
        echo $json;
        }
}


?>