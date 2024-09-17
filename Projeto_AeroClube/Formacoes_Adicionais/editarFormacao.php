<?php
// Incluir o arquivo de funções
include '../Functions/functions.php';

// Verificar se o ID foi passado via GET
if (isset($_GET['id'])) {
    $idFormAdd = $_GET['id'];

    // Conectar ao banco de dados e buscar os dados da formação
    $pdo = connectDatabase();
    $stmt = $pdo->prepare("SELECT * FROM Formacoes_Adicionais WHERE idFormAdd = :idFormAdd");
    $stmt->bindParam(':idFormAdd', $idFormAdd, PDO::PARAM_INT);
    $stmt->execute();
    $formacao = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar se a formação foi encontrada
    if (!$formacao) {
        echo "Formação não encontrada.";
        exit;
    }
} else {
    echo "ID de formação não fornecido.";
    exit;
}

// Verificar se o formulário foi submetido para salvar as alterações
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar os dados do formulário
    $nomeFormacao = $_POST['nomeFormacao'];
    $cargaHoraria = $_POST['cargaHoraria'];

    // Atualizar os dados da formação no banco de dados
    $stmt = $pdo->prepare("UPDATE Formacoes_Adicionais SET nomeFormacao = :nomeFormacao, cargaHoraria = :cargaHoraria WHERE idFormAdd = :idFormAdd");
    $stmt->bindParam(':nomeFormacao', $nomeFormacao, PDO::PARAM_STR);
    $stmt->bindParam(':cargaHoraria', $cargaHoraria, PDO::PARAM_STR);
    $stmt->bindParam(':idFormAdd', $idFormAdd, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        echo "<div class='alert alert-success text-center'>Formação atualizada com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>Erro ao atualizar a formação.</div>";
    }

    // Recarregar os dados atualizados da formação
    $stmt = $pdo->prepare("SELECT * FROM Formacoes_Adicionais WHERE idFormAdd = :idFormAdd");
    $stmt->bindParam(':idFormAdd', $idFormAdd, PDO::PARAM_INT);
    $stmt->execute();
    $formacao = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Formação Adicional</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Editar Formação</h2>
        
        <form action="editarFormacao.php?id=<?= $idFormAdd ?>" method="post" class="mt-4">
            <div class="mb-3">
                <label for="nomeFormacao" class="form-label">Nome da Formação:</label>
                <input type="text" id="nomeFormacao" name="nomeFormacao" class="form-control" value="<?= htmlspecialchars($formacao['nomeFormacao']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="cargaHoraria" class="form-label">Carga Horária:</label>
                <input type="text" id="cargaHoraria" name="cargaHoraria" class="form-control" value="<?= htmlspecialchars($formacao['cargaHoraria']); ?>" required>
            </div>
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="buscarFormacao.php" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
