<?php include('../../includes/header.php') ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Treinos</title>
</head>

<body>
    <div class="container">
        <h1> Cadastrar Treinos </h1>
        <form action="../../controllers/treinoController.php?action=cadastrar" method="POST">

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição de Treino</label>
                <textarea id="descricao" name="descricao" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="idAluno" class="form-label">Id Aluno: </label>
                <input type="text" id="idAluno" name="idAluno" class="form-control" required></input>
            </div>

            <div class="mb-3">
                <label for="idProfessor" class="form-label">Id Professor: </label>
                <input type="text" id="IdProfessor" name="idProfessor" class="form-control" required></input>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

    </div>
</body>
<?php include('../../includes/footer.php') ?>

</html>