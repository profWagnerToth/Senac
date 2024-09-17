<?php
// Incluir o arquivo de funções
include '../Functions/functions.php';

// Inicializar variáveis
$formacoes = [];
$busca = false;
$tipoBusca = '';
$termoBusca = '';

// Verificar se o formulário de busca foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipoBusca = $_POST['tipoBusca'];
    $termoBusca = $_POST['termoBusca'];

    // Realizar a busca de acordo com o tipo escolhido
    if ($tipoBusca === 'id') {
        $formacoes = buscarFormacaoPorId($termoBusca);
    } elseif ($tipoBusca === 'nome') {
        $formacoes = buscarFormacaoPorNome($termoBusca);
    } elseif ($tipoBusca === 'todos') {
        $formacoes = buscarTodasFormacoes();
    }

    $busca = true;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Formação</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Alterar Formação</h2>

        <!-- Formulário de Busca -->
        <form action="alterarFormacao.php" method="post" class="mt-4">
            <div class="mb-3">
                <label for="tipoBusca" class="form-label">Buscar por:</label>
                <select id="tipoBusca" name="tipoBusca" class="form-select" required>
                    <option value="id">ID</option>
                    <option value="nome">Nome da Formação</option>
                    <option value="todos">Mostrar Todas</option>
                </select>
            </div>
            <div class="mb-3" id="inputBusca">
                <label for="termoBusca" class="form-label">Termo de Busca:</label>
                <input type="text" id="termoBusca" name="termoBusca" class="form-control" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <?php if ($busca): ?>
            <?php if (!empty($formacoes)): ?>
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
                                    <a href="editarFormacao.php?id=<?= htmlspecialchars($formacao['idFormAdd']); ?>" class="btn btn-warning">Editar</a>
                                    <!-- Formulário para excluir a formação -->
                                    <form action="excluirFormacao.php" method="get" style="display:inline-block;">
                                        <input type="hidden" name="id" value="<?= htmlspecialchars($formacao['idFormAdd']); ?>">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta formação?');">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert alert-warning mt-4">Nenhuma formação encontrada.</div>
            <?php endif; ?>
        <?php endif; ?>

    </div>

    <!-- Mostrar/ocultar o campo de termo de busca com base na seleção -->
    <script>
        document.getElementById('tipoBusca').addEventListener('change', function() {
            const inputBusca = document.getElementById('inputBusca');
            if (this.value === 'todos') {
                inputBusca.style.display = 'none';
                document.getElementById('termoBusca').removeAttribute('required');
                document.getElementById('termoBusca').value = ''; // Limpar o valor do campo
            } else {
                inputBusca.style.display = 'block';
                document.getElementById('termoBusca').setAttribute('required', 'required');
            }
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
