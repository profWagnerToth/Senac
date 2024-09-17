<?php
// Incluir o arquivo de funções
include '../Functions/functions.php';

// Inicializar as variáveis
$formacao = null;
$mostrarFormulario = true;
$mostrarBotoes = false;

// Verificar se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar os dados do formulário
    $nomeFormacao = $_POST['nomeFormacao'];
    $cargaHoraria = $_POST['cargaHoraria'];

    // Chamar a função para inserir a formação adicional
    $resultado = insertFormacaoAdicional($nomeFormacao, $cargaHoraria);

    // Verificar se a inserção foi bem-sucedida
    if ($resultado) {
        // Obter o último registro inserido
        $pdo = connectDatabase();
        $stmt = $pdo->query("SELECT * FROM Formacoes_Adicionais ORDER BY idFormAdd DESC LIMIT 1");
        $formacao = $stmt->fetch(PDO::FETCH_ASSOC);
        $mostrarFormulario = false;
        $mostrarBotoes = true;
    } else {
        echo "Erro ao inserir a formação adicional.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Formação Adicional</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            display: <?php echo $mostrarFormulario ? 'block' : 'none'; ?>;
        }
        .buttons-container {
            display: <?php echo $mostrarBotoes ? 'block' : 'none'; ?>;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Inserir Formação Adicional</h2>
        
        <?php if ($formacao): ?>
            <div class="alert alert-success mt-4">
                <strong>Última Formação Inserida:</strong>
                <p><strong>ID:</strong> <?= htmlspecialchars($formacao['idFormAdd']); ?></p>
                <p><strong>Nome:</strong> <?= htmlspecialchars($formacao['nomeFormacao']); ?></p>
                <p><strong>Carga Horária:</strong> <?= htmlspecialchars($formacao['cargaHoraria']); ?></p>
            </div>
        <?php endif; ?>

        <div class="form-container mt-4">
            <form action="inserir_formacao.php" method="post">
                <div class="mb-3">
                    <label for="nomeFormacao" class="form-label">Nome da Formação:</label>
                    <input type="text" id="nomeFormacao" name="nomeFormacao" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="cargaHoraria" class="form-label">Carga Horária:</label>
                    <input type="text" id="cargaHoraria" name="cargaHoraria" class="form-control" required>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary">Inserir Formação</button>
                </div>
            </form>
        </div>

        <div class="buttons-container text-center mt-4">
            <a href="inserir_formacao.php" class="btn btn-primary">Nova Formação</a>
            <a href="dashboardFormacao.php" class="btn btn-secondary">Voltar ao Dashboard</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
