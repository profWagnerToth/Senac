<?php
// register.php
include '../Functions/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Conectar ao banco de dados
    $pdo = connectDatabase();

    // Verificar se o nome de usuário já existe
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->fetch()) {
        // Usuário já existe, redirecionar com mensagem de erro
        header("Location: register.php?message=O+nome+de+usuário+já+existe.+Por+favor,+escolha+outro.");
        exit;
    }

    // Criptografar a senha
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Inserir novo usuário no banco de dados
    $stmt = $pdo->prepare("INSERT INTO users (name, email, username, password) VALUES (:name, :email, :username, :password)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashedPassword);

    if ($stmt->execute()) {
        // Redirecionar com mensagem de sucesso
        header("Location: register.php?message=Usuário+cadastrado+com+sucesso!");
    } else {
        // Redirecionar com mensagem de erro
        header("Location: register.php?message=Erro+ao+cadastrar+usuário.+Por+favor,+tente+novamente.");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário - Aero Clube</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Cadastro de Usuário</h2>
                <!-- Verifica se há uma mensagem de sucesso ou erro -->
                <?php if (isset($_GET['message'])): ?>
                    <div class="alert alert-info text-center">
                        <?= htmlspecialchars($_GET['message']); ?>
                    </div>
                <?php endif; ?>

                <!-- Formulário de Cadastro -->
                <form action="register.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome Completo:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Usuário:</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <a href="../login/logar.php">Já tem uma conta? Faça login aqui</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
