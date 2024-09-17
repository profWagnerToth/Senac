<?php
// Incluir o arquivo de funções
include '../Functions/functions.php';

// Verificar se o ID do instrutor foi fornecido
if (!isset($_GET['idInstrutor']) || empty($_GET['idInstrutor'])) {
    die("ID do instrutor não fornecido.");
}

$idInstrutor = $_GET['idInstrutor'];

// Buscar as informações do instrutor
$instrutor = buscarInstrutorPorId($idInstrutor);

// Buscar as formações do instrutor
$formacoes = buscarFormacoesPorInstrutorId($idInstrutor);

if (!$instrutor) {
    die("Instrutor não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Instrutor</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .instrutor-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .instrutor-info .info-text {
            flex: 1;
        }
        .instrutor-info img {
            border-radius: 50%;
            max-width: 200px;
            margin-left: 20px;
            flex-shrink: 0;
        }
        .row-info {
            margin-bottom: 10px;
        }
        .row-info:nth-child(odd) {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Detalhes do Instrutor</h2>

        <div class="card mb-4">
            <div class="card-body">
                <div class="instrutor-info">
                    <div class="info-text">
                        <h5 class="card-title"><?= htmlspecialchars($instrutor['nomeInstrutor']); ?></h5>
                        <div class="row row-info">
                            <div class="col-md-4"><strong>ID:</strong> <?= htmlspecialchars($instrutor['idInstrutor']); ?></div>
                            <div class="col-md-4"><strong>Matrícula:</strong> <?= htmlspecialchars($instrutor['matriculaInstrutor']); ?></div>
                            <div class="col-md-4"><strong>Breve:</strong> <?= htmlspecialchars($instrutor['breveInstrutor']); ?></div>
                        </div>
                        <div class="row row-info">
                            <div class="col-md-12"><strong>Endereço:</strong> <?= htmlspecialchars($instrutor['enderecoInstrutor']); ?></div>
                        </div>
                        <div class="row row-info">
                            <div class="col-md-6"><strong>Bairro:</strong> <?= htmlspecialchars($instrutor['bairroInstrutor']); ?></div>
                            <div class="col-md-6"><strong>Cidade:</strong> <?= htmlspecialchars($instrutor['cidadeInstrutor']); ?></div>
                        </div>
                        <div class="row row-info">
                            <div class="col-md-6"><strong>Estado:</strong> <?= htmlspecialchars($instrutor['estadoInstrutor']); ?></div>
                            <div class="col-md-6"><strong>Data Nascimento:</strong> <?= htmlspecialchars($instrutor['dataNascInstrutor']); ?></div>
                        </div>
                        <div class="row row-info">
                            <div class="col-md-6"><strong>Fone:</strong> <?= htmlspecialchars($instrutor['foneInstrutor']); ?></div>
                        </div>
                    </div>
                    <?php if (!empty($instrutor['fotoInstrutor'])): ?>
                        <img src="<?= htmlspecialchars($instrutor['fotoInstrutor']); ?>" alt="Foto do Instrutor" class="img-fluid">
                    <?php else: ?>
                        <p>Nenhuma foto disponível.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <h3 class="mt-4">Formações Associadas</h3>

        <?php if (!empty($formacoes)): ?>
            <table class="table table-bordered mt-2">
                <thead>
                    <tr>
                        <th>ID Formação</th>
                        <th>Nome da Formação</th>
                        <th>Data de Obtenção</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($formacoes as $formacao): ?>
                        <tr>
                            <td><?= htmlspecialchars($formacao['idFormAdd']); ?></td>
                            <td><?= htmlspecialchars($formacao['nomeFormacao']); ?></td>
                            <td><?= htmlspecialchars($formacao['dataObtencao']); ?></td>
                            <td>
                                <a href="editarFormacao.php?idFormAdd=<?= htmlspecialchars($formacao['idFormAdd']); ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="excluirFormacao.php?idFormAdd=<?= htmlspecialchars($formacao['idFormAdd']); ?>" class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning mt-4">Nenhuma formação encontrada para este instrutor.</div>
        <?php endif; ?>

        <div class="text-center mt-4">
            <a href="mostrarFormacoesXInstrutores.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
