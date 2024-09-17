<?php
// Inclua o arquivo de funções para conexão com o banco de dados
include '../Functions/functions.php';

// Obtenha a lista de Instrutores ativos
$Instrutores = getInstrutoresAtivos();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Instrutores - Aero Clube</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .foto-Instrutor {
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
                <h2 class="text-center">Relatório de Instrutores</h2>

                <!-- Tabela de Instrutores -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Matricula</th>
                            <th>Breve</th>
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
                        <?php if ($Instrutores): ?>
                            <?php foreach ($Instrutores as $Instrutor): ?>
                                <tr>
                                    <td><?= htmlspecialchars($Instrutor['idInstrutor']); ?></td>
                                    <td><?= htmlspecialchars($Instrutor['nomeInstrutor']); ?></td>
                                    <td><?= htmlspecialchars($Instrutor['matriculaInstrutor']); ?></td>
                                    <td><?= htmlspecialchars($Instrutor['breveInstrutor']); ?></td>
                                    <td><?= htmlspecialchars($Instrutor['dataNascInstrutor']); ?></td>
                                    <td><?= htmlspecialchars($Instrutor['enderecoInstrutor']); ?></td>
                                    <td><?= htmlspecialchars($Instrutor['bairroInstrutor']); ?></td>
                                    <td><?= htmlspecialchars($Instrutor['cidadeInstrutor']); ?></td>
                                    <td><?= htmlspecialchars($Instrutor['estadoInstrutor']); ?></td>
                                    <td><?= htmlspecialchars($Instrutor['foneInstrutor']); ?></td>
                                    <td>
                                        <!-- Exibe a foto do Instrutor -->
                                        <?php if (!empty($Instrutor['fotoInstrutor']) && file_exists('../Assets/images/' . basename($Instrutor['fotoInstrutor']))): ?>
                                            <img src="../Assets/images/<?= htmlspecialchars(basename($Instrutor['fotoInstrutor'])); ?>" alt="Foto do Instrutor" class="foto-Instrutor">
                                        <?php else: ?>
                                            <span>N/A</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="fichaInstrutor.php?id=<?= $Instrutor['idInstrutor']; ?>" class="btn btn-info btn-sm">Info</a>
                                        <a href="edit.php?id=<?= $Instrutor['idInstrutor']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                        <a href="delete.php?id=<?= $Instrutor['idInstrutor']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja apagar este Instrutor?')">Apagar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10" class="text-center">Nenhum Instrutor encontrado.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="text-center mt-3">
                    <a href="dashboardInstrutores.php" class="btn btn-secondary">Voltar ao Dashboard</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
