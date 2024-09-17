<?php
// Incluir o arquivo de funções
include '../Functions/functions.php';

// Buscar todas as formações dos instrutores agrupadas por idInstrutor
$formacoesXInstrutores = buscarFormacoesXInstrutores();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formações dos Instrutores</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Formações dos Instrutores</h2>

        <?php if (!empty($formacoesXInstrutores)): ?>
            <?php
            // Organizar os dados agrupados por idInstrutor
            $instrutores = [];
            foreach ($formacoesXInstrutores as $registro) {
                $idInstrutor = $registro['idInstrutor'];
                if (!isset($instrutores[$idInstrutor])) {
                    $instrutores[$idInstrutor] = [
                        'nomeInstrutor' => $registro['nomeInstrutor'],
                        'formacoes' => []
                    ];
                }
                $instrutores[$idInstrutor]['formacoes'][] = [
                    'idFormAdd' => $registro['idFormAdd'],
                    'nomeFormacao' => $registro['nomeFormacao']
                ];
            }
            ?>

            <?php foreach ($instrutores as $idInstrutor => $instrutor): ?>
                <div class="mb-4">
                    <h4>ID Instrutor: <?= htmlspecialchars($idInstrutor); ?> - Nome: <?= htmlspecialchars($instrutor['nomeInstrutor']); ?></h4>
                    <div class="mb-3">
                        <a href="detalhesInstrutor.php?idInstrutor=<?= htmlspecialchars($idInstrutor); ?>" class="btn btn-info">Ver Detalhes</a>
                        <a href="inserirFormacao.php?idInstrutor=<?= htmlspecialchars($idInstrutor); ?>" class="btn btn-success">Inserir Formação</a>
                    </div>
                    <table class="table table-bordered mt-2">
                        <thead>
                            <tr>
                                <th>ID Formação</th>
                                <th>Nome da Formação</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($instrutor['formacoes'] as $formacao): ?>
                                <tr>
                                    <td><?= htmlspecialchars($formacao['idFormAdd']); ?></td>
                                    <td><?= htmlspecialchars($formacao['nomeFormacao']); ?></td>
                                    <td>
                                        <a href="editarFormacao.php?idFormAdd=<?= htmlspecialchars($formacao['idFormAdd']); ?>" class="btn btn-warning btn-sm">Editar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-warning mt-4">Nenhuma formação encontrada.</div>
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
