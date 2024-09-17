<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Formação</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Editar Formação</h2>

        <div class="card mb-4">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="nomeFormacao" class="form-label">Nome da Formação</label>
                        <input type="text" class="form-control" id="nomeFormacao" name="nomeFormacao" value="<?= htmlspecialchars($formacao['nomeFormacao']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="dataObtencao" class="form-label">Data de Obtenção</label>
                        <input type="date" class="form-control" id="dataObtencao" name="dataObtencao" value="<?= htmlspecialchars($formacao['dataObtencao']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="cargaHoraria" class="form-label">Carga Horária</label>
                        <input type="text" class="form-control" id="cargaHoraria" name="cargaHoraria" value="<?= htmlspecialchars($formacao['cargaHoraria']); ?>" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Atualizar Formação</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="mostrarFormacoesXInstrutores.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
