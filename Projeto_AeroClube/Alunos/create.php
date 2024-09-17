<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos - Aero Clube</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center">Cadastro de Aluno</h2>

                <!-- Mensagens de Sucesso ou Erro -->
                <?php if (isset($_GET['message'])): ?>
                    <div class="alert alert-info text-center">
                        <?= htmlspecialchars($_GET['message']); ?>
                    </div>
                <?php endif; ?>

                <!-- Mostrar último aluno inserido -->
                <?php if (isset($_GET['id'])): ?>
                    <?php
                    include '../Functions/functions.php'; // Ajuste o caminho conforme necessário
                    $pdo = connectDatabase();
                    $stmt = $pdo->prepare("SELECT * FROM alunos WHERE idAluno = :idAluno");
                    $stmt->bindParam(':idAluno', $_GET['id'], PDO::PARAM_INT);
                    $stmt->execute();
                    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <?php if ($aluno): ?>
                        <div class="alert alert-success mt-3">
                            <strong>Último Aluno Inserido:</strong>
                            <p><strong>ID:</strong> <?= htmlspecialchars($aluno['idAluno']); ?></p>
                            <p><strong>Nome:</strong> <?= htmlspecialchars($aluno['nomeAluno']); ?></p>
                            <p><strong>Data de Nascimento:</strong> <?= htmlspecialchars($aluno['dtNasc']); ?></p>
                            <p><strong>Endereço:</strong> <?= htmlspecialchars($aluno['enderecoAluno']); ?></p>
                            <p><strong>Bairro:</strong> <?= htmlspecialchars($aluno['bairroAluno']); ?></p>
                            <p><strong>Cidade:</strong> <?= htmlspecialchars($aluno['cidadeAluno']); ?></p>
                            <p><strong>Estado:</strong> <?= htmlspecialchars($aluno['estadoAluno']); ?></p>
                            <p><strong>Telefone:</strong> <?= htmlspecialchars($aluno['foneAluno']); ?></p>
                            <p><strong>Foto:</strong> <?= htmlspecialchars($aluno['fotoAluno']); ?></p>
                        </div>
                        <div class="text-center mt-3">
                            <a href="create.php" class="btn btn-primary">Adicionar Novo Registro</a>
                            <a href="dashboardAluno.php" class="btn btn-secondary">Voltar ao Dashboard</a>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <!-- Formulário de Cadastro de Aluno -->
                    <form action="processa_cadastro.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nomeAluno" class="form-label">Nome Completo:</label>
                            <input type="text" id="nomeAluno" name="nomeAluno" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="dtNasc" class="form-label">Data de Nascimento:</label>
                            <input type="date" id="dtNasc" name="dtNasc" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="enderecoAluno" class="form-label">Endereço:</label>
                            <input type="text" id="enderecoAluno" name="enderecoAluno" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="bairroAluno" class="form-label">Bairro:</label>
                            <input type="text" id="bairroAluno" name="bairroAluno" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="cidadeAluno" class="form-label">Cidade:</label>
                            <input type="text" id="cidadeAluno" name="cidadeAluno" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="estadoAluno" class="form-label">Estado:</label>
                            <input type="text" id="estadoAluno" name="estadoAluno" class="form-control" maxlength="2">
                        </div>
                        <div class="mb-3">
                            <label for="foneAluno" class="form-label">Telefone:</label>
                            <input type="text" id="foneAluno" name="foneAluno" class="form-control" maxlength="14">
                        </div>
                        <div class="mb-3">
                            <label for="fotoAluno" class="form-label">Foto do Aluno:</label>
                            <input type="file" id="fotoAluno" name="fotoAluno" class="form-control" accept="image/*">
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                            <a href="dashboardAluno.php" class="btn btn-secondary">Voltar ao Dashboard</a>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
