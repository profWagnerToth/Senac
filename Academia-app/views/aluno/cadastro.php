<?php 
include '../../includes/header.php'
?>
<div class="container mt-5">
    <h2> Cadastro de Aluno</h2>
    <form action="..bd/cadastrar_aluno.php" method="POST">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <div class="mb-3">
        <label for="idade" class="form-label">idade:</label>
        <input type="text" class="form-control" id="idade" name="idade" required>
        </div>

        <div class="mb-3">
        <label for="email" class="form-label">email:</label>
        <input type="text" class="form-control" id="email" name="email" required>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
<?php 
include '../../includes/footer.php'
?>