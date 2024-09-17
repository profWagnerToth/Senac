<?php
// Incluir o arquivo de funções
include '../Functions/functions.php';

// Obter todas as formações cadastradas
$pdo = connectDatabase();
$stmt = $pdo->query("SELECT * FROM Formacoes_Adicionais where ativo=1");
$formacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Formações</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Formações Cadastradas</h2>
        <?php if (count($formacoes) > 0): ?>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome da Formação</th>
                        <th>Carga Horária</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($formacoes as $formacao): ?>
                        <tr>
                            <td><?= htmlspecialchars($formacao['idFormAdd']); ?></td>
                            <td><?= htmlspecialchars($formacao['nomeFormacao']); ?></td>
                            <td><?= htmlspecialchars($formacao['cargaHoraria']); ?></td>
                            <td>
                                <a href="editarFormacao.php?id=<?= $formacao['idFormAdd']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="excluirFormacao.php?id=<?= $formacao['idFormAdd']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta formação?');">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info">Nenhuma formação cadastrada.</div>
        <?php endif; ?>

        <div class="text-center mt-4">
            <a href="dashboardFormacao.php" class="btn btn-secondary">Voltar ao Dashboard</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
