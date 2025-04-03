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


function define_response(&$data, $value){
    $data['status'] = ' SUCCESS';
    $data['data'] = $value;
}

date_default_timezone_get('America/Sao_Paulo');
function data_time(&$data, $dataHoraAtual){
    $data['time'] = date('d-m-Y H:i:s');
    $data['data'] = $dataHoraAtual;

    echo 'Data e hora atual do servidor: ' . $dataHoraAtual;
}

response($data);
function response($data_response){
    header("Content-Type:application/json");
    echo json_encode($data_response);
}



?>