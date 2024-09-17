<?php
include ("../conexao.php");

$database = new Database();
$conexao = $database->getConnection();

$query = "SELECT * FROM alunos";
$stmt = $conexao->prepare($query);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Gerenciar Alunos</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="py-5 text-center">
            <h2>Gerenciar Alunos</h2>
        </div>
        <a href="create.php" class="btn btn-primary mb-3">Adicionar Novo Aluno</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= $row['idAluno']; ?></td>
                    <td><?= $row['nomeAluno']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['idAluno']; ?>" class="btn btn-warning">Editar</a>
                        <a href="delete.php?id=<?= $row['idAluno']; ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar este aluno?')">Deletar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
