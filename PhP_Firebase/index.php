<?php  
// Requisição do autoload Firebase  
require __DIR__.'/vendor/autoload.php';  

// Cria acesso à biblioteca Keait Firebase PHP SDK  
use Kreait\Firebase\Factory;  

// Cria acesso à biblioteca ServiceAccount Firebase PHP SDK  
use Kreait\Firebase\ServiceAccount;  

// Cria a conexão com o Banco de Dados Realtime Database Firebase  
$factory = (new Factory())
->withServiceAccount(__DIR__.'\chave_autenticador_firebase.json') //Caminho da Chava Privada.
->withDatabaseUri('https://phpfirebase-cb534-default-rtdb.firebaseio.com/'); //Link do Realtime Database Firebase. 

// Instância de serviço do Realtime Database  
$database = $factory->createDatabase();  

// Leitura dos dados dentro do Realtime Database  
$contatosSnapshot = $database->getReference('Contatos')->getSnapshot();  
$contatos = $contatosSnapshot->getValue(); // Armazena os dados em uma variável  

?>  

<!DOCTYPE html>  
<html lang="pt-br">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Leitura Dados Realtime Database</title>  
</head>  
<body>  
    <?php if ($contatos): // Verifica se há contatos ?>  
        <?php foreach ($contatos as $contato): ?>  
            <p>  
                Nome: <?php echo htmlspecialchars($contato['nome']). '<br/>' ?>  
                Email: <?php echo htmlspecialchars($contato['email']) ?>  
            </p>  
        <?php endforeach; ?>  
    <?php else: ?>  
        <p>Nenhum contato encontrado.</p>  
    <?php endif; ?>  
</body>  
</html>