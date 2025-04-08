<?php

// Definindo a constante API_BASE com a URL da API

define ('API_BASE', 'http://localhost/api-grupo/api/index.php?option=' );

    echo'<p>API Aleatory</p>';

// Repetindo a requisição à API 10 vezes =================================================== //

    for($i = 0; $i < 10; $i++)
    {

// Chama a API para obter um número aleatório ============================================== //

        $result = api_request('random&min=100&max=1000'); 

        if($result ['status'] == 'ERROR')
        {
            die('Aconteceu um erro na minha chamada da API');
        }

        echo "o valor aleatorio é: " . $result['name'] . "</br>";
}

    echo 'Finalizado';
    
function api_request($named)
{
        $client = curl_init(API_BASE . $named);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        return json_decode($response, true);
}

?>