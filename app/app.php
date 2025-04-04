<?php
define ('API_BASE', 'http://localhost/api-grupo/api/index.php?option=' );

    echo'<p>API GRUPO</p>';

    for($i = 0; $i < 10; $i++)
    {

        $result = api_request('random&min=aaa&max=150');

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