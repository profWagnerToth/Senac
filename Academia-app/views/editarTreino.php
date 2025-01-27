<?php
include('../includes/header.php');
include('../models/treino.php');

// Verifica se o ID do treino foi passado via GET
if (isset($_GET['id'])) {
    $treinoModel = new Treino();
    $treino = $treinoModel->buscarTreinoPorId($_GET['id']);

    // Verifica se o treino foi encontrado
    if ($treino) {
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Treino</title>
</head>

<body>
    <div class="container">
        <h1>Editar Treino</h1>
        <form action="../controllers/treinoController.php?action=atualizar&id=<?php echo $treino['id']; ?>" method="POST">
            
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição do Treino</label>
                <textarea id="descricao" name="descricao" class="form-control" required><?php echo $treino['descricao']; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="idAluno" class="form-label">ID Aluno:</label>
                <input type="text" id="idAluno" name="idAluno" class="form-control" value="<?php echo $treino['aluno_id']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="idProfessor" class="form-label">ID Professor:</label>
                <input type="text" id="idProfessor" name="idProfessor" class="form-control" value="<?php echo $treino['professor_id']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="listTreino.php" class="btn btn-secondary">Voltar para Lista</a>
        </form>
    </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>

<?php
    } else {
        echo "<p>Treino não encontrado.</p>";
    }
} else {
    echo "<p>ID do treino não fornecido.</p>";
}
?>
