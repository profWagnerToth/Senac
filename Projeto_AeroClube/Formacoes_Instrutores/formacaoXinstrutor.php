<?php
// Incluir o arquivo de funções
include '../Functions/functions.php';

// Inicializar variáveis
$instrutores = [];
$formacoesAtivas = [];

// Buscar todos os instrutores
$instrutores = buscarTodosInstrutores();

// Buscar todas as formações ativas
$formacoesAtivas = buscarFormacoesAtivas();

// Verificar se o formulário de inserção foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['instrutor_id']) && isset($_POST['formacao_id']) && isset($_POST['data_obtencao']) && isset($_POST['matricula_instrutor'])) {
    $instrutorId = $_POST['instrutor_id'];
    $formacaoId = $_POST['formacao_id'];
    $dataObtencao = $_POST['data_obtencao'];
    $matriculaInstrutor = $_POST['matricula_instrutor'];

    // Inserir a formação do instrutor na tabela formacoesInstrutores
    if (inserirFormacaoInstrutor($instrutorId, $formacaoId, $dataObtencao, $matriculaInstrutor)) {
        header("Location: formacaoXinstrutor.php?msg=Formação inserida com sucesso!");
        exit;
    } else {
        header("Location: formacaoXinstrutor.php?msg=Erro ao inserir a formação.");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formação dos Instrutores</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Formação dos Instrutores</h2>

        <?php if (isset($_GET['msg'])): ?>
            <div class="alert alert-info">
                <?= htmlspecialchars($_GET['msg']); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($instrutores)): ?>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Instrutor</th>
                        <th>Matrícula</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($instrutores as $instrutor): ?>
                        <tr>
                            <td><?= htmlspecialchars($instrutor['idInstrutor']); ?></td>
                            <td><?= htmlspecialchars($instrutor['nomeInstrutor']); ?></td>
                            <td><?= htmlspecialchars($instrutor['matriculaInstrutor']); ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formacaoModal<?= htmlspecialchars($instrutor['idInstrutor']); ?>">
                                    Inserir Formação
                                </button>

                                <!-- Modal para Inserir Formação -->
                                <div class="modal fade" id="formacaoModal<?= htmlspecialchars($instrutor['idInstrutor']); ?>" tabindex="-1" aria-labelledby="formacaoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="formacaoModalLabel">Inserir Formação para <?= htmlspecialchars($instrutor['nomeInstrutor']); ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="formacaoXinstrutor.php" method="post">
                                                    <input type="hidden" name="instrutor_id" value="<?= htmlspecialchars($instrutor['idInstrutor']); ?>">
                                                    <input type="hidden" name="matricula_instrutor" value="<?= htmlspecialchars($instrutor['matriculaInstrutor']); ?>">
                                                    <div class="mb-3">
                                                        <label for="formacao_id" class="form-label">Selecione a Formação:</label>
                                                        <select id="formacao_id" name="formacao_id" class="form-select" required>
                                                            <?php foreach ($formacoesAtivas as $formacao): ?>
                                                                <option value="<?= htmlspecialchars($formacao['idFormAdd']); ?>">
                                                                    <?= htmlspecialchars($formacao['nomeFormacao']); ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="data_obtencao" class="form-label">Data de Obtenção:</label>
                                                        <input type="date" id="data_obtencao" name="data_obtencao" class="form-control" required>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary">Inserir</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning mt-4">Nenhum instrutor encontrado.</div>
        <?php endif; ?>

        <div class="text-center mt-4">
            <a href="dashboardFormacoes_Instrutores.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
