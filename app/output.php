<?php

// Resposta Padrão ========================================================================= //

function define_response(&$data, $value){
    $data['status'] = 'SUCCESS';
    $data['data'] = $value;
}

// Resposta Data =========================================================================== //

function data_time(&$data){
    $data['status'] = 'DATA E HORA LOCAL SERVIDOR API';
    date_default_timezone_set('America/Maceio');
    $data['data'] = date("d-m-Y H:i:s");
}

// Resposta Número Aleatório ==============================================================  //

function random_number(&$data, $num1, $num2){
            if(isset($_GET['num1'])){
                $num1 = intval($_GET['num1']);
            }
            if(isset($_GET['num2'])){
                $num2 = intval($_GET['num2']);
            }
            if($num1 >= $num2){
                response($data);
                return;
            }

            define_response($data, rand($num1, $num2));
}

// Arquivo JSON ============================================================================ //

function response($data_response){
    header("Content-Type:application/json");
    echo json_encode($data_response);
}

?>