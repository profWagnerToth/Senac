<?php
// Requisição do autoload Firebase
require __DIR__.'/vendor/autoload.php';

// Acessando a biblioteca Kreait Firebase PHP SDK
use Kreait\Firebase\Factory;

// Acessando a biblioteca ServiceAccount Firebase PHP SDK
use Kreait\Firebase\ServiceAccount;

use Kreait\Firebase\Auth;

$msg = "";

// Criando conexão com o Firebase (Realtime Database e Authentication)
$factory = (new Factory())
    ->withServiceAccount(__DIR__.'/chave_firebase.json') 
    ->withDatabaseUri('https://fir-php-e50ee-default-rtdb.firebaseio.com/'); // Link de acesso ao Realtime Database do Firebase.

// Executa quando o formulário for submetido e o botão "Cadastrar" for clicado
if (isset($_POST['btn_Cadastrar'])) {
    // Verifica se os campos de email e senha estão preenchidos
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        try {
            // Acessando o serviço de autenticação
            $auth = $factory->createAuth();

            // Criando novo usuário no Firebase Authentication
            $novoUsuario = $auth->createUserWithEmailAndPassword($email, $senha);

            // Agora, vamos armazenar os dados do usuário no Realtime Database
            $database = $factory->createDatabase();
            
            // Dados do usuário para o Realtime Database
            $dadosUsuario = [
                'email' => $email,
                'senha' => $senha // Embora você possa querer não armazenar a senha, para fins de exemplo, estou incluindo.
            ];

            // Armazenando no Realtime Database na referência "usuarios"
            $database->getReference('usuarios/'.$novoUsuario->uid)->set($dadosUsuario);

            // Mensagem de sucesso
            $msg = "Usuário cadastrado com sucesso!";
        } catch (\Kreait\Firebase\Exception\Auth\EmailExists $e) {
            // Captura o erro caso o email já esteja cadastrado
            $msg = "Erro: O email já está em uso.";
        } catch (\Kreait\Firebase\Exception\Auth\InvalidPassword $e) {
            // Captura o erro caso a senha seja inválida
            $msg = "Erro: Senha inválida.";
        } catch (\Exception $e) {
            // Captura qualquer outro erro
            $msg = "Erro ao cadastrar usuário: " . $e->getMessage();
        }
    } else {
        $msg = "Por favor, preencha todos os campos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuario e Senha</title>
</head>
<body>
    <h2>Cadastrando Usuario e Senha no Realtime Firebase</h2>
    <hr>
    
    <!-- Criando Formulário para Cadastro de Usuario -->
    <form method="post">
        <p>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required />
        </p>

        <p>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required />
        </p>

        <p>
            <input type="submit" name="btn_Cadastrar" value="Cadastrar"/>
        </p>
    </form>

    <!-- Exibindo a mensagem de sucesso ou erro -->
    <?php
    if ($msg != "") {
        echo "<p>$msg</p>";
    }
    ?>
</body>
</html>
