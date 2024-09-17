<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Alunos - Aero Clube</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center">Dashboard de Alunos</h2>
                
                <!-- Menu de Navegação -->
                <div class="list-group">
                    <a href="create.php" class="list-group-item list-group-item-action">Cadastro de Alunos</a>
                    <a href="view.php" class="list-group-item list-group-item-action">Relatório</a>
                    <a href="editar.php" class="list-group-item list-group-item-action">Editar Alunos</a>
                    <a href="excluir_alunos.php" class="list-group-item list-group-item-action">Excluir Alunos</a>
                </div>

                <div class="text-center mt-4">
                    <a href="../login/dashboard.php" class="btn btn-secondary">Voltar ao Início</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
