<?php

$data = [];
$data['status'] = 'ERROR';
$data['data'] = null;

if(isset($_GET['option'])){
    switch($_GET['option']){
        case 'status';
        define_response($data,'API running OK!');
        break;

        case 'time':
            data_time($data, 'Data e hora atual.');
            break;


    }
}

response($data);

function define_response(&$data, $value){
    $data['status'] = ' SUCCESS';
    $data['data'] = $value;
}

function data_time(&$data, $dataHoraAtual){
    $data['status'] = 'DATA E HORA API';
    $data['data'] = $dataHoraAtual;
    date_default_timezone_set('America/Maceio');
    $data['time'] = date("d-m-Y H:i:s");
}

function response($data_response){
    header("Content-Type:application/json");
    echo json_encode($data_response);
}


?>