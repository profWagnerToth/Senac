<?php
// Incluir o arquivo de funções
include '../Functions/functions.php';

// Verificar se o ID foi passado via GET
if (isset($_GET['id'])) {
    $idFormAdd = $_GET['id'];

    // Chamar a função para excluir a formação (atualizar o campo "ativo" para 0)
    if (excluirFormacao($idFormAdd)) {
        // Recuperar a lista atualizada de todas as formações
        $formacoes = buscarTodasFormacoes();
    } else {
        // Em caso de erro na exclusão, exibir mensagem e sair
        echo "<div class='alert alert-danger text-center'>Erro ao excluir a formação.</div>";
        exit;
    }
} else {
    // Exibir mensagem de ID inválido se o ID não foi passado
    echo "<div class='alert alert-warning text-center'>ID de formação inválido.</div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formações Atualizadas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Formação Excluída com Sucesso</h2>

        <?php if (!empty($formacoes)): ?>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome da Formação</th>
                        <th>Carga Horária</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($formacoes as $formacao): ?>
                        <tr>
                            <td><?= htmlspecialchars($formacao['idFormAdd']); ?></td>
                            <td><?= htmlspecialchars($formacao['nomeFormacao']); ?></td>
                            <td><?= htmlspecialchars($formacao['cargaHoraria']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning mt-4 text-center">Nenhuma formação encontrada.</div>
        <?php endif; ?>

        <div class="text-center mt-4">
            <a href="dashboardFormacao.php" class="btn btn-success">OK</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
