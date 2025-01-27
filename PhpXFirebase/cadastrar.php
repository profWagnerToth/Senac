<?php
//Requisição do autolod Firebase
require __DIR__.'/vendor/autoload.php';

//Acessando a biblioteca Kreait Firebase PhP SDK
use Kreait\Firebase\Factory;

$msg="";

//Criando conexão com BD Realtime Database Firebase
$factory = (new Factory())
->withDatabaseUri('https://fir-php-e50ee-default-rtdb.firebaseio.com/'); //Link de acesso ao Realtime Databse do Firebase.

//Instanciando o serviço do Realtime Database
$database = $factory->createDatabase();

//Sanitizando dados de entrada
$nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

$novoContato = [
    'nome'=>$nome,
    'email'=>$email
];

try{
    $database->getReference('contatos/'.$_POST['id'])->set($novoContato);
    $msg="Contato adicionado com sucesso!";
}catch (Execption $e){
    $msg="Erro ao adicionar contato: ". $e->getMessage();
}
echo $msg;

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Contato</title>
</head>

<body>
    <h2>Cadastrando Contatos no Realtime Firebase</h2>
    <hr>
    <!-- Criando Formulário para Cadastro de Contatos -->
    <form method="post">
        <p>
            <label for="id">ID:</label>
            <input type="text" name="id" id="id"/>
        </p>
        
        <p>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome"/>
        </p>

        <p>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email"/>
        </p>

        <p>
            <input type="submit" name="btn_Cadastrar" id="Cad" Value="Cadastrar"/>
        </p>
    </form>
</body>

</html>