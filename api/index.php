<?php

// Importar output.php ===================================================================== //

require_once('output.php');

// Resposta Padrão ========================================================================= //

$data = [];
$data['status'] = 'ERROR';
$data['data'] = null;

// Pedido API ============================================================================== //

if(isset($_GET['option'])){
    switch($_GET['option']){
        case 'status':
            define_response($data,'API running OK!');
            break;

        case 'time':
            data_time($data, 'Data e hora atual.');
            break;

        case 'number':
                random_number($data, 0, 2000);
                break;
    }
}

// Resposta API ============================================================================= //

response($data);

?>