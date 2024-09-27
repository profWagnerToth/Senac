<?php
include '../../includes/header.php';
?>
<div class="container mt-5">
    <h2> Cadastro de Aluno</h2>
    <form action="../../controllers/AlunoController.php?action=cadastrar" method="POST">

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" required>
        </div>

        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
        </div>

        <div class="mb-3">
            <label for="genero" class="form-label">genero:</label>
            <input type="text" class="form-control" id="genero" name="genero" required>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
<?php
include '../../includes/footer.php';
?>