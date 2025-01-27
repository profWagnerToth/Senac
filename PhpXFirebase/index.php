<?php
//Requisição do autolod Firebase
require __DIR__.'/vendor/autoload.php';

//Acessando a biblioteca Kreait Firebase PhP SDK
use Kreait\Firebase\Factory;

//Criando conexão com BD Realtime Database Firebase
$factory = (new Factory())
->withDatabaseUri('https://fir-php-e50ee-default-rtdb.firebaseio.com/'); //Link de acesso ao Realtime Databse do Firebase.

//Instanciando o serviço do Realtime Database
$database = $factory->createDatabase();

//Leitura dos dados do Relatime
$contatos=$database->getReference("contatos")->getSnapshot();

/*
//Mostrar os valores do Array $contatos
print_r($contatos->getValue());
*/

$listaContato = $contatos->getValue(); 

?>

<!-- Criar HTML para Mostrar os Registros do Realtime Database -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem Registros Firebase</title>
</head>
<body>
    <h2>Listagem dos Registro do Realtime Database</h2>
    <hr>
    <?php if($contatos): // Verificar se há contatos ?>
        <?php foreach ($listaContato as $contato): ?>
        <p>
            Nome: <?php echo htmlspecialchars($contato['nome']).'<br/>' ?>
            Email: <?php echo htmlspecialchars($contato['email']).'<br/>' ?>
        </p>
        <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhum Contato Encontrado</p>
            <?php endif; ?>
</body>
</html>
