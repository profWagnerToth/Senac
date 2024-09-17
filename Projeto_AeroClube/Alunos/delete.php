<?php
// Inclua o arquivo de funções
include '../Functions/functions.php';

// Verifica se o ID do aluno foi passado
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID inválido.");
}

// Obtém o ID do aluno
$id = $_GET['id'];

// Desativa o aluno
if (desativarAluno($id)) {
    header("Location: view.php?message=Aluno desativado com sucesso.");
    exit();
} else {
    $message = "Erro ao desativar aluno.";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Aluno - Aero Clube</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center">Excluir Aluno</h2>

                <!-- Mensagem de Erro -->
                <?php if (isset($message)): ?>
                    <div class="alert alert-danger text-center">
                        <?= htmlspecialchars($message); ?>
                    </div>
                <?php endif; ?>

                <!-- Mensagem de Sucesso -->
                <?php if (!isset($message)): ?>
                    <div class="alert alert-success text-center">
                        Aluno desativado com sucesso.
                    </div>
                <?php endif; ?>

                <div class="text-center mt-3">
                    <a href="view.php" class="btn btn-secondary">Voltar ao Relatório</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
