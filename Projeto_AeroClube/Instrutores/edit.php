<?php
// Inclua o arquivo de funções
include '../Functions/functions.php';

// Verifica se o ID do Instrutor foi passado
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID inválido.");
}

// Obtém o Instrutor pelo ID
$id = $_GET['id'];
$Instrutor = getInstrutorById($id);

// Se o Instrutor não for encontrado, exibe uma mensagem de erro
if (!$Instrutor) {
    die("Instrutor não encontrado.");
}

// Processa a atualização dos dados do Instrutor
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $nome = $_POST['nomeInstrutor'];
    $matricula = $_POST['matriculaInstrutor'];
    $breve = $_POST['breveInstrutor'];
    $dtNasc = $_POST['dataNascInstrutor'];
    $endereco = $_POST['enderecoInstrutor'];
    $bairro = $_POST['bairroInstrutor'];
    $cidade = $_POST['cidadeInstrutor'];
    $estado = $_POST['estadoInstrutor'];
    $fone = $_POST['foneInstrutor'];

    // Atualiza o Instrutor
    if (updateInstrutor($id, $nome, $matricula, $breve, $dtNasc, $endereco, $bairro, $cidade, $estado, $fone)) {
        header("Location: view.php?message=Instrutor atualizado com sucesso.");
        exit();
    } else {
        $message = "Erro ao atualizar Instrutor.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Instrutor - Aero Clube</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center">Editar Instrutor</h2>

                <!-- Mensagem de Erro -->
                <?php if (isset($message)): ?>
                    <div class="alert alert-danger text-center">
                        <?= htmlspecialchars($message); ?>
                    </div>
                <?php endif; ?>

                <!-- Formulário de Edição de Instrutor -->
                <form action="edit.php?id=<?= htmlspecialchars($id); ?>" method="post">
                    <div class="mb-3">
                        <label for="nomeInstrutor" class="form-label">Nome Completo:</label>
                        <input type="text" id="nomeInstrutor" name="nomeInstrutor" class="form-control" value="<?= htmlspecialchars($Instrutor['nomeInstrutor']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="matriculaInstrutor" class="form-label">Matricula:</label>
                        <input type="text" id="matriculaInstrutor" name="matriculaInstrutor" class="form-control" value="<?= htmlspecialchars($Instrutor['matriculaInstrutor']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="breveInstrutor" class="form-label">Breve:</label>
                        <input type="text" id="breveInstrutor" name="breveInstrutor" class="form-control" value="<?= htmlspecialchars($Instrutor['breveInstrutor']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="dtNascInstrutor" class="form-label">Data de Nascimento:</label>
                        <input type="date" id="dtNascInstrutor" name="dataNascInstrutor" class="form-control" value="<?= htmlspecialchars($Instrutor['dataNascInstrutor']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="enderecoInstrutor" class="form-label">Endereço:</label>
                        <input type="text" id="enderecoInstrutor" name="enderecoInstrutor" class="form-control" value="<?= htmlspecialchars($Instrutor['enderecoInstrutor']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="bairroInstrutor" class="form-label">Bairro:</label>
                        <input type="text" id="bairroInstrutor" name="bairroInstrutor" class="form-control" value="<?= htmlspecialchars($Instrutor['bairroInstrutor']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="cidadeInstrutor" class="form-label">Cidade:</label>
                        <input type="text" id="cidadeInstrutor" name="cidadeInstrutor" class="form-control" value="<?= htmlspecialchars($Instrutor['cidadeInstrutor']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="estadoInstrutor" class="form-label">Estado:</label>
                        <input type="text" id="estadoInstrutor" name="estadoInstrutor" class="form-control" maxlength="2" value="<?= htmlspecialchars($Instrutor['estadoInstrutor']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="foneInstrutor" class="form-label">Telefone:</label>
                        <input type="text" id="foneInstrutor" name="foneInstrutor" class="form-control" maxlength="14" value="<?= htmlspecialchars($Instrutor['foneInstrutor']); ?>">
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
