<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Formações - Aero Clube</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Dashboard de Formações</h2>
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="list-group">
                    <a href="inserir_formacao.php" class="list-group-item list-group-item-action">
                        Cadastrar Formações
                    </a>
                    <a href="buscarFormacao.php" class="list-group-item list-group-item-action">
                        Buscar Formações
                    </a>
                    <a href="alterarFormacao.php" class="list-group-item list-group-item-action">
                        Editar Formações
                    </a>
                </div>
            </div>
        </div>
        <!-- Botão Voltar ao Dashboard -->
        <div class="text-center mt-4">
            <a href="../login/dashboard.php" class="btn btn-secondary">Voltar ao Dashboard</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
