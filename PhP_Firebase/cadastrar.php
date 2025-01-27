<?php  
// Requisição do autoload Firebase  
require __DIR__.'/vendor/autoload.php';  

// Cria acesso à biblioteca Keait Firebase PHP SDK  
use Kreait\Firebase\Factory;   

$msg = "";  

if (isset($_POST['id'])) {  
    // Cria a conexão com o Banco de Dados Realtime Database Firebase  
    $factory = (new Factory())->withDatabaseUri('https://phpfirebase-cb534-default-rtdb.firebaseio.com/'); // Link do Realtime Database Firebase.  

    $database = $factory->createDatabase();  

    // Sanitizando dados de entrada  
    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);  
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);  

    $novoContato = [  
        'nome' => $nome,  
        'email' => $email  
    ];  

    try {  
        $database->getReference('Contatos/' . $_POST['id'])->set($novoContato);  
        $msg = "Contato adicionado com sucesso";  
    } catch (Exception $e) {  
        $msg = "Erro ao adicionar contato: " . $e->getMessage();  
    }  

    echo $msg;  
}  
?>

<!DOCTYPE html>  
<html lang="pt-br">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Cadastrar Contatos no Realtime Database</title>  
</head>  
<body>  
    <h2>Cadastro de Contatos</h2>  
    <!-- Criar Formulário para Cadastro -->  
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
            <input type="email" name="email" id="email"/>  
        </p>  

        <p>  
            <input type="submit" id="cadastrar" value="Cadastrar"/>  
        </p>  

    </form>  
</body>  
</html>

