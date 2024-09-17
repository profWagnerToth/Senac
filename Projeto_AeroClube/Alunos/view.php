<?php
// Inclua o arquivo de funções para conexão com o banco de dados
include '../Functions/functions.php';

// Obtenha a lista de alunos ativos
$alunos = getAlunosAtivos();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Alunos - Aero Clube</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .foto-aluno {
            max-width: 30px;
            max-height: 30px;
            object-fit: cover; /* Mantém a proporção da imagem */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="text-center">Relatório de Alunos</h2>

                <!-- Tabela de Alunos -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Data de Nascimento</th>
                            <th>Endereço</th>
                            <th>Bairro</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Telefone</th>
                            <th>Foto</th> <!-- Nova coluna para a foto -->
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($alunos): ?>
                            <?php foreach ($alunos as $aluno): ?>
                                <tr>
                                    <td><?= htmlspecialchars($aluno['idAluno']); ?></td>
                                    <td><?= htmlspecialchars($aluno['nomeAluno']); ?></td>
                                    <td><?= htmlspecialchars($aluno['dtNasc']); ?></td>
                                    <td><?= htmlspecialchars($aluno['enderecoAluno']); ?></td>
                                    <td><?= htmlspecialchars($aluno['bairroAluno']); ?></td>
                                    <td><?= htmlspecialchars($aluno['cidadeAluno']); ?></td>
                                    <td><?= htmlspecialchars($aluno['estadoAluno']); ?></td>
                                    <td><?= htmlspecialchars($aluno['foneAluno']); ?></td>
                                    <td>
                                        <!-- Exibe a foto do aluno -->
                                        <?php if (!empty($aluno['fotoAluno']) && file_exists('../Assets/images/' . basename($aluno['fotoAluno']))): ?>
                                            <img src="../Assets/images/<?= htmlspecialchars(basename($aluno['fotoAluno'])); ?>" alt="Foto do Aluno" class="foto-aluno">
                                        <?php else: ?>
                                            <span>N/A</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="fichaAluno.php?id=<?= $aluno['idAluno']; ?>" class="btn btn-info btn-sm">Info</a>
                                        <a href="edit.php?id=<?= $aluno['idAluno']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                        <a href="delete.php?id=<?= $aluno['idAluno']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja apagar este aluno?')">Apagar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10" class="text-center">Nenhum aluno encontrado.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="text-center mt-3">
                    <a href="dashboardAluno.php" class="btn btn-secondary">Voltar ao Dashboard</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
