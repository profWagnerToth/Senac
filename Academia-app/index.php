<?php include __DIR__ . '/includes/header.php'; ?>

<div class="container mt-5">
    <h1 class="text-center">Bem-vindo ao Academia App</h1>
    <p class="text-center">Selecione uma funcionalidade para gerenciar o sistema da academia.</p>

    <!-- Menu de funcionalidades -->
    <div class="row mt-4">
        <!-- Alunos -->
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Gerenciar Alunos</h5>
                    <p class="card-text">Cadastrar, listar e editar alunos.</p>
                    <a href="views/listAluno.php" class="btn btn-primary">Listar Alunos</a>
                    <a href="views/cadAluno.php" class="btn btn-success mt-2">Cadastrar Aluno</a>
                </div>
            </div>
        </div>

        <!-- Treinos -->
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Gerenciar Treinos</h5>
                    <p class="card-text">Cadastrar, listar e editar treinos.</p>
                    <a href="treinos/listar" class="btn btn-primary">Listar Treinos</a>
                    <a href="treinos/cadastrar" class="btn btn-success mt-2">Cadastrar Treino</a>
                </div>
            </div>
        </div>

        <!-- Professores -->
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Gerenciar Professores</h5>
                    <p class="card-text">Cadastrar, listar e editar professores.</p>
                    <a href="views/listProf.php" class="btn btn-primary">Listar Professores</a>
                    <a href="views/cadProf.php" class="btn btn-success mt-2">Cadastrar Professor</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>
