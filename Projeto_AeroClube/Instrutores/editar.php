<?php
// Inclua o arquivo de funções
include '../Functions/functions.php';

// Inicialize a variável de mensagem
$message = '';
$Instrutores = [];

// Verifica se o formulário de busca foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchType = $_POST['searchType'];
    $searchValue = $_POST['searchValue'];

    // Verifica se o tipo de busca é válido e realiza a busca
    if ($searchType === 'id' && is_numeric($searchValue)) {        
        // Busca pelo ID
        $Instrutor = getInstrutorById_editar($searchValue);

        // Verifica se a busca retornou um resultado válido
        if ($Instrutor) {
            $Instrutores = [$Instrutor]; // Coloca o resultado em um array
        } else {
            $message = "Nenhum Instrutor encontrado com o ID fornecido.";
            $Instrutores = [];
        }
    } elseif ($searchType === 'nome' && !empty($searchValue)) {
        // Busca pelo nome
        $Instrutores = getInstrutoresByName($searchValue);

        // Verifica se a busca retornou um array válido
        if (!$Instrutores || !is_array($Instrutores)) {
            $message = "Nenhum Instrutor encontrado com o nome fornecido.";
            $Instrutores = [];
        }
    } else {
        $message = "Tipo de busca inválido ou valor vazio.";
        $Instrutores = [];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Instrutores - Aero Clube</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center">Editar Instrutores</h2>

                <!-- Mensagens de Sucesso ou Erro -->
                <?php if (!empty($message)): ?>
                    <div class="alert alert-danger text-center">
                        <?= htmlspecialchars($message); ?>
                    </div>
                <?php endif; ?>

                <!-- Formulário de Busca -->
                <form action="editar.php" method="post">
                    <div class="mb-3">
                        <label for="searchType" class="form-label">Buscar por:</label>
                        <select id="searchType" name="searchType" class="form-select" required>
                            <option value="" disabled selected>Escolha uma opção</option>
                            <option value="id">ID</option>
                            <option value="nome">Nome</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="searchValue" class="form-label">Valor da Busca:</label>
                        <input type="text" id="searchValue" name="searchValue" class="form-control" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </form>

                <!-- Mostrar resultados da busca -->
                <?php if (!empty($Instrutores) && is_array($Instrutores)): ?>
                    <div class="mt-4">
                        <h4>Resultados da Busca:</h4>
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
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                            <a href="edit.php?id=<?= htmlspecialchars($Instrutor['idInstrutor']); ?>" class="btn btn-primary btn-sm">Editar</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <!-- Mensagem se nenhum registro for encontrado -->
                    <?php if (empty($message)): ?>
                        <div class="alert alert-info text-center mt-3">
                            Nenhum registro encontrado.
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

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
