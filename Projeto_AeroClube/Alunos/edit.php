<?php
// Inclua o arquivo de funções
include '../Functions/functions.php';

// Verifica se o ID do aluno foi passado
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID inválido.");
}

// Obtém o aluno pelo ID
$id = $_GET['id'];
$aluno = getAlunoById($id);

// Se o aluno não for encontrado, exibe uma mensagem de erro
if (!$aluno) {
    die("Aluno não encontrado.");
}

// Processa a atualização dos dados do aluno
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $nome = $_POST['nomeAluno'];
    $dtNasc = $_POST['dtNasc'];
    $endereco = $_POST['enderecoAluno'];
    $bairro = $_POST['bairroAluno'];
    $cidade = $_POST['cidadeAluno'];
    $estado = $_POST['estadoAluno'];
    $fone = $_POST['foneAluno'];

    // Atualiza o aluno
    if (updateAluno($id, $nome, $dtNasc, $endereco, $bairro, $cidade, $estado, $fone)) {
        header("Location: view.php?message=Aluno atualizado com sucesso.");
        exit();
    } else {
        $message = "Erro ao atualizar aluno.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno - Aero Clube</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center">Editar Aluno</h2>

                <!-- Mensagem de Erro -->
                <?php if (isset($message)): ?>
                    <div class="alert alert-danger text-center">
                        <?= htmlspecialchars($message); ?>
                    </div>
                <?php endif; ?>

                <!-- Formulário de Edição de Aluno -->
                <form action="edit.php?id=<?= htmlspecialchars($id); ?>" method="post">
                    <div class="mb-3">
                        <label for="nomeAluno" class="form-label">Nome Completo:</label>
                        <input type="text" id="nomeAluno" name="nomeAluno" class="form-control" value="<?= htmlspecialchars($aluno['nomeAluno']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="dtNasc" class="form-label">Data de Nascimento:</label>
                        <input type="date" id="dtNasc" name="dtNasc" class="form-control" value="<?= htmlspecialchars($aluno['dtNasc']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="enderecoAluno" class="form-label">Endereço:</label>
                        <input type="text" id="enderecoAluno" name="enderecoAluno" class="form-control" value="<?= htmlspecialchars($aluno['enderecoAluno']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="bairroAluno" class="form-label">Bairro:</label>
                        <input type="text" id="bairroAluno" name="bairroAluno" class="form-control" value="<?= htmlspecialchars($aluno['bairroAluno']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="cidadeAluno" class="form-label">Cidade:</label>
                        <input type="text" id="cidadeAluno" name="cidadeAluno" class="form-control" value="<?= htmlspecialchars($aluno['cidadeAluno']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="estadoAluno" class="form-label">Estado:</label>
                        <input type="text" id="estadoAluno" name="estadoAluno" class="form-control" maxlength="2" value="<?= htmlspecialchars($aluno['estadoAluno']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="foneAluno" class="form-label">Telefone:</label>
                        <input type="text" id="foneAluno" name="foneAluno" class="form-control" maxlength="14" value="<?= htmlspecialchars($aluno['foneAluno']); ?>">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>
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
