<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Instrutores - Aero Clube</title>
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
                    $stmt = $pdo->prepare("SELECT * FROM Instrutores WHERE idInstrutor = :idInstrutor");
                    $stmt->bindParam(':idInstrutor', $_GET['id'], PDO::PARAM_INT);
                    $stmt->execute();
                    $Instrutor = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <?php if ($Instrutor): ?>
                        <div class="alert alert-success mt-3">
                            <strong>Último Instrutor Inserido:</strong>
                            <p><strong>ID:</strong> <?= htmlspecialchars($Instrutor['idInstrutor']); ?></p>
                            <p><strong>Nome:</strong> <?= htmlspecialchars($Instrutor['nomeInstrutor']); ?></p>
                            <p><strong>Matricula:</strong> <?= htmlspecialchars($Instrutor['matriculaInstrutor']); ?></p>
                            <p><strong>Breve:</strong> <?= htmlspecialchars($Instrutor['breveInstrutor']); ?></p>
                            <p><strong>Data de Nascimento:</strong> <?= htmlspecialchars($Instrutor['dataNascInstrutor']); ?></p>
                            <p><strong>Endereço:</strong> <?= htmlspecialchars($Instrutor['enderecoInstrutor']); ?></p>
                            <p><strong>Bairro:</strong> <?= htmlspecialchars($Instrutor['bairroInstrutor']); ?></p>
                            <p><strong>Cidade:</strong> <?= htmlspecialchars($Instrutor['cidadeInstrutor']); ?></p>
                            <p><strong>Estado:</strong> <?= htmlspecialchars($Instrutor['estadoInstrutor']); ?></p>
                            <p><strong>Telefone:</strong> <?= htmlspecialchars($Instrutor['foneInstrutor']); ?></p>
                            <p><strong>Foto:</strong> <?= htmlspecialchars($Instrutor['fotoInstrutor']); ?></p>
                        </div>
                        <div class="text-center mt-3">
                            <a href="create.php" class="btn btn-primary">Adicionar Novo Registro</a>
                            <a href="dashboardInstrutores.php" class="btn btn-secondary">Voltar ao Dashboard</a>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <!-- Formulário de Cadastro de Aluno -->
                    <form action="processa_cadastro.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nomeInstrutor" class="form-label">Nome Completo:</label>
                            <input type="text" id="nomeInstrutor" name="nomeInstrutor" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="matriculaInstrutor" class="form-label">Matricula:</label>
                            <input type="text" id="matriculaInstrutor" name="matriculaInstrutor" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="breveInstrutor" class="form-label">Breve:</label>
                            <input type="text" id="breveInstrutor" name="breveInstrutor" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="dtNascInstrutor" class="form-label">Data de Nascimento:</label>
                            <input type="date" id="dtNascInstrutor" name="dtNascInstrutor" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="enderecoInstrutor" class="form-label">Endereço:</label>
                            <input type="text" id="enderecoInstrutor" name="enderecoInstrutor" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="bairroInstrutor" class="form-label">Bairro:</label>
                            <input type="text" id="bairroInstrutor" name="bairroInstrutor" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="cidadeInstrutor" class="form-label">Cidade:</label>
                            <input type="text" id="cidadeInstrutor" name="cidadeInstrutor" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="estadoInstrutor" class="form-label">Estado:</label>
                            <input type="text" id="estadoInstrutor" name="estadoInstrutor" class="form-control" maxlength="2">
                        </div>
                        <div class="mb-3">
                            <label for="foneInstrutor" class="form-label">Telefone:</label>
                            <input type="text" id="foneInstrutor" name="foneInstrutor" class="form-control" maxlength="14">
                        </div>
                        <div class="mb-3">
                            <label for="fotoInstrutor" class="form-label">Foto do Aluno:</label>
                            <input type="file" id="fotoInstrutor" name="fotoInstrutor" class="form-control" accept="image/*">
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
