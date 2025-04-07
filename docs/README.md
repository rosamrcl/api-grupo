# api-grupo
 
Documentação da API Dinâmica em PHP
Introdução:
Bem-vindo à documentação da nossa API dinâmica em PHP! Aqui, você vai encontrar tudo o que precisa para entender como utilizá-la, testar seus endpoints e aproveitar suas funcionalidades.



Integrantes do grupo:
Charles
João Danilo
Isaac
Rosa
Ana




•	Estrutura do Projeto

•	Nosso projeto segue uma organização simples para facilitar o desenvolvimento:
•	/api/
•	index.php          
•	includes/
•	config.php    
•	functions.php 
•	logs/             
•	client/
•	app.php       
•	README.md     




•	Arquivo principal da API

•	Configurações gerais
•	Funções reutilizáveis
•	Armazena logs de erros
•	Cliente para testar a API
•	Documentação 


                                           API

1. Definição da Constante API_BASE:
 
•	define() é uma função PHP que define uma constante.
•	API_BASE é o nome da constante.
•	'http://localhost/api-grupo/api/index.php?option=' é o valor da constante, que é a URL base da API. Esta URL sugere que a API está hospedada localmente (localhost) e que o parâmetro option na URL é usado para especificar qual operação da API deve ser executada.
2. Exibição de Mensagem Inicial:
 

                                      


 
 
•	function api_request($named) define uma função chamada api_request() que recebe um parâmetro $named.
•	$client = curl_init(API_BASE . $named); inicializa uma sessão cURL para fazer uma requisição HTTP. 
o	API_BASE . $named concatena a URL base da API com o parâmetro $named para formar a URL completa da requisição.
•	curl_setopt($client, CURLOPT_RETURNTRANSFER, true); configura a sessão cURL para retornar a resposta da requisição como uma string.
•	$response = curl_exec($client); executa a requisição cURL e armazena a resposta na variável $response.
•	return json_decode($response, true); decodifica a resposta JSON da API em um array associativo PHP e retorna o array.
Resumo:
O código faz 10 requisições a uma API para obter valores aleatórios. Para cada requisição, ele verifica se houve um erro e, se não houver, exibe o valor aleatório. No final, ele exibe a mensagem "Finalizado". A função api_request() encapsula a lógica para fazer a requisição cURL e decodificar a resposta JSON.




                                                                  APP
 
 






   OUTPUT
 
. define_response(&$data, $value):
 
•	Função: Esta função é usada para criar uma resposta JSON padrão com status "SUCCESS" e um valor de dados.
•	Parâmetros: 
o	&$data: Uma referência a um array $data, que será modificado dentro da função. Usar uma referência (&) permite que as alterações feitas em $data dentro da função sejam refletidas fora dela.
•	Endpoints Disponíveis

•	Verificar o status da API
      O que faz?
•	Retorna uma mensagem confirmando que a API está funcionando corretamente.
•	Exemplo de uso:  

•	Resposta esperada:  

