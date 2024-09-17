<?php
// Inclua o arquivo de funções
include '../Functions/functions.php';

// Inicialize a variável de mensagem
$message = '';
$alunos = [];

// Verifica se o formulário de busca foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchValue = $_POST['searchValue'];

    // Verifica se o valor da busca é um número válido
    if (is_numeric($searchValue)) {
        // Busca pelo ID
        $alunos = getAlunoById_excluir_aluno($searchValue);
        // Verifica se a busca retornou um array
        if (!is_array($alunos)) {
            $message = "Nenhum aluno encontrado com o ID fornecido.";
            $alunos = [];
        }
    } else {
        $message = "ID inválido.";
        $alunos = [];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Alunos - Aero Clube</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center">Excluir Aluno</h2>

                <!-- Mensagens de Sucesso ou Erro -->
                <?php if (!empty($message)): ?>
                    <div class="alert alert-danger text-center">
                        <?= htmlspecialchars($message); ?>
                    </div>
                <?php endif; ?>

                <!-- Formulário de Busca -->
                <form action="excluir_alunos.php" method="post">
                    <div class="mb-3">
                        <label for="searchValue" class="form-label">Buscar por ID:</label>
                        <input type="text" id="searchValue" name="searchValue" class="form-control" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </form>

                <!-- Mostrar resultados da busca -->
                <?php if (!empty($alunos) && is_array($alunos)): ?>
                    <div class="mt-4">
                        <h4>Resultados da Busca:</h4>
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
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                            <a href="delete.php?id=<?= htmlspecialchars($aluno['idAluno']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este aluno?')">Excluir</a>
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
