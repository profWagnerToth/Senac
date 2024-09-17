<?php
// login.php
include '../Functions/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Chama a função loginUser
    $user = loginUser($username, $password);

    if ($user) {
        // Login bem-sucedido: redirecionar para o painel ou outra página
        header("Location: dashboard.php"); // Supondo que você tenha um dashboard.php
        exit;
    } else {
        // Falha no login: redirecionar de volta para a página de login com uma mensagem de erro
        header("Location: logar.php?error=invalid_credentials");
        exit;
    }
}
?>
