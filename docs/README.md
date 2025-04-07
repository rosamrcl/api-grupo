# api-grupo
 
# Documentação da API Dinâmica em PHP
# Introdução:
# Bem-vindo à documentação da nossa API dinâmica em PHP! Aqui, você vai encontrar tudo o que precisa para entender como utilizá-la, testar seus endpoints e aproveitar suas funcionalidades.



# Integrantes do grupo:
# [Anna Iris](https://github.com/ansilv00)
# [Charles](https://github.com/CharlesAcioli)
# [Isaque](https://github.com/BananaSpritee)
# [João Danilo](https://github.com/Joaodanilo2005)
# [Rosa](https://github.com/rosamrcl)





# Estrutura do Projeto

# Nosso projeto segue uma organização simples para facilitar o desenvolvimento:
# Api: index.php          
# App: app.php. output       
# README.md     




# Arquivo principal da API

# Configurações gerais
# Funções reutilizáveis
# Armazena logs de erros
# Cliente para testar a API

# API
# Este código atua como um roteador para uma API simples. Ele recebe um parâmetro option via GET e, com base nesse parâmetro, chama a função apropriada para gerar uma resposta JSON. Se o parâmetro option não for fornecido ou não corresponder a nenhuma opção válida, ele retorna uma resposta de erro padrão.


# Importação do Arquivo output.php:
# require_once() inclui o arquivo output.php no script atual.

# Inicialização da Resposta Padrão:
# $data = []; cria um array vazio chamado $data.
# $data['status'] = 'ERROR'; define o status padrão da resposta como "ERROR".
# $data['data'] = null; define os dados padrão da resposta como null.
# Isso garante que, se nenhuma opção válida for fornecida, a API retornará uma resposta de erro.

# Roteamento de Requisições com switch:
# if(isset($_GET['option'])) verifica se o parâmetro option foi passado na URL via GET.
# switch($_GET['option']) inicia uma estrutura switch para rotear a requisição com base no valor de $_GET['option'].
# case 'status': 
# Se $_GET['option'] for igual a 'status', chama define_response($data, 'API running OK!'); para definir uma resposta de sucesso com a mensagem "API running OK!".
# break; sai da estrutura switch.
# case 'time':
# Se $_GET['option'] for igual a 'time', chama data_time($data, 'Data e hora atual.'); para definir uma resposta com a data e hora atual do servidor.
# break; sai da estrutura switch.
# case 'number': 
# Se $_GET['option'] for igual a 'number', chama random_number($data, 0, 2000); para definir uma resposta com um número aleatório entre 0 e 2000.
# break; sai da estrutura switch.
# Se $_GET['option'] não corresponder a nenhum dos casos, o código continua sem modificar $data, mantendo a resposta de erro padrão.

# Envio da Resposta JSON:
# response($data); chama a função response() (definida em output.php) para enviar a resposta JSON para o cliente.



# OUTPUT
# Criamos o arquivo OUTPUt para deixar o arquivo index mais clean.
# Este código define funções para criar respostas JSON para diferentes tipos de requisições:
# Endpoints:/status
# Uma resposta padrão com status "SUCCESS":
# Atravé do define_response(&$data, $value):
# Com os prâmetros: 
# $&$data: Uma referência a um array $data, que será modificado dentro da função. Usar uma referência (&) permite que as alterações feitas em $data dentro da função sejam refletidas fora dela.
# $value: O valor dos dados que será incluído na resposta JSON.

# Endpoint data e hora local do servidor:
# Foi elaborada uma função cria uma resposta JSON contendo a data e hora local do servidor da API.
# Parâmetros: 
# &$data: Uma referência a um array $data, que será modificado dentro da função.
# Ação: 
# Define a chave 'status' do array $data como 'DATA E HORA LOCAL SERVIDOR API'.
# Define o fuso horário para 'America/Maceio' usando date_default_timezone_set().
# Define a chave 'data' do array $data como a data e hora formatada usando date("d-m-Y H:i:s").


# Endpoint /number:
# Foi elabarada uma função  onde é gerado um número aleatório entre $num1 e $num2 e cria uma resposta JSON.
# Parâmetros: 
# &$data: Uma referência a um array $data, que será modificado dentro da função.
# $num1: O limite inferior do intervalo do número aleatório.
# $num2: O limite superior do intervalo do número aleatório.
# Ação: 
# Verifica se $_GET['num1'] e $_GET['num2'] estão definidos. Se estiverem, converte-os para inteiros usando intval() e atualiza $num1 e $num2.
# Verifica se $num1 é maior ou igual a $num2. Se for, chama a função response() para enviar uma resposta JSON (que estara vazia, pois não foi configurada nenhum valor para o array $data) e retorna.
# Se $num1 for menor que $num2, chama define_response() para criar uma resposta JSON com um número aleatório gerado por rand($num1, $num2).

# A função response() é usada para formatar e enviar a resposta JSON.
# Parâmetros: 
# $data_response: O array que será convertido em JSON.
# Ação: 
# Define o cabeçalho Content-Type como application/json para informar ao cliente que a resposta é JSON.
# Converte o array $data_response em uma string JSON usando json_encode() e a envia para o cliente usando echo.

 

  
# APP

# 1. Definição da Constante API_BASE:
# define ('API_BASE', 'http://localhost/api-grupo/api/index.php?option=' );

# define() é uma função PHP que define uma constante.
# API_BASE é o nome da constante.
# 'http://localhost/api-grupo/api/index.php?option=' é o valor da constante, que é a URL base da API. Esta URL sugere que a API está hospedada localmente (localhost) e que o parâmetro option na URL é usado para especificar qual operação da API deve ser executada.

# 2. Loop for para Fazer Requisições à API:
# 2.1 Função api_request():
# function api_request($named) define uma função chamada api_request() que recebe um parâmetro $named.
# $client = curl_init(API_BASE . $named); inicializa uma sessão cURL para fazer uma requisição HTTP. 
# API_BASE . $named concatena a URL base da API com o parâmetro $named para formar a URL completa da requisição.
# curl_setopt($client, CURLOPT_RETURNTRANSFER, true); configura a sessão cURL para retornar a resposta da requisição como uma string.
# $response = curl_exec($client); executa a requisição cURL e armazena a resposta na variável $response.
# return json_decode($response, true); decodifica a resposta JSON da API em um array associativo PHP e retorna o array.



# O código faz 10 requisições a uma API para obter valores aleatórios. Para cada requisição, ele verifica se houve um erro e, se não houver, exibe o valor aleatório. No final, ele exibe a mensagem "Finalizado". A função api_request() encapsula a lógica para fazer a requisição cURL e decodificar a resposta JSON.



 
 







