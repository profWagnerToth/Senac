<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha do Instrutor - Aero Clube</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .img-card {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .img-card img {
            max-width: 280px; /* Limita a largura máxima da imagem */
            max-height: 280px; /* Limita a altura máxima da imagem */
            margin-top: 30%;
            margin-bottom: 30%;
            border-radius: 0.375rem; /* Adiciona bordas arredondadas ao card da imagem */
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1); /* Sombra leve para a imagem */
            object-fit: cover; /* Mantém a proporção da imagem e preenche o card */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center">Ficha do Instrutor</h2>

                <?php
                if (isset($_GET['id'])) {
                    include '../Functions/functions.php'; // Ajuste o caminho conforme necessário
                    $pdo = connectDatabase();
                    $stmt = $pdo->prepare("SELECT * FROM Instrutores WHERE idInstrutor = :idInstrutor");
                    $stmt->bindParam(':idInstrutor', $_GET['id'], PDO::PARAM_INT);
                    $stmt->execute();
                    $Instrutor = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($Instrutor) {
                ?>
                        <!-- Exibição dos Dados do Instrutor -->
                        <div class="card mb-4">
                            <div class="card-body d-flex">
                                <div class="flex-grow-1">
                                    <h4 class="card-title"><?= htmlspecialchars($Instrutor['nomeInstrutor']); ?></h4>
                                    <p class="card-text"><strong>ID:</strong> <?= htmlspecialchars($Instrutor['idInstrutor']); ?></p>
                                    <p class="card-text"><strong>Matricula:</strong> <?= htmlspecialchars($Instrutor['matriculaInstrutor']); ?></p>
                                    <p class="card-text"><strong>Breve:</strong> <?= htmlspecialchars($Instrutor['breveInstrutor']); ?></p>
                                    <p class="card-text"><strong>Data de Nascimento:</strong> <?= htmlspecialchars($Instrutor['dataNascInstrutor']); ?></p>
                                    <p class="card-text"><strong>Endereço:</strong> <?= htmlspecialchars($Instrutor['enderecoInstrutor']); ?></p>
                                    <p class="card-text"><strong>Bairro:</strong> <?= htmlspecialchars($Instrutor['bairroInstrutor']); ?></p>
                                    <p class="card-text"><strong>Cidade:</strong> <?= htmlspecialchars($Instrutor['cidadeInstrutor']); ?></p>
                                    <p class="card-text"><strong>Estado:</strong> <?= htmlspecialchars($Instrutor['estadoInstrutor']); ?></p>
                                    <p class="card-text"><strong>Telefone:</strong> <?= htmlspecialchars($Instrutor['foneInstrutor']); ?></p>
                                </div>
                                <?php if (!empty($Instrutor['fotoInstrutor']) && file_exists('../Assets/images/' . basename($Instrutor['fotoInstrutor']))): ?>
                                    <div class="img-card ms-3">
                                        <img src="../Assets/images/<?= htmlspecialchars(basename($Instrutor['fotoInstrutor'])); ?>" alt="Foto do Instrutor" class="img-thumbnail">
                                    </div>
                                <?php else: ?>
                                    <p class="text-center text-muted mt-3">Nenhuma foto disponível.</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Botões de Ação -->
                        <div class="d-flex justify-content-between mt-3">
                            <a href="edit.php?id=<?= htmlspecialchars($Instrutor['idInstrutor']); ?>" class="btn btn-warning">Editar</a>
                            <a href="excluir_Instrutores.php?id=<?= htmlspecialchars($Instrutor['idInstrutor']); ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este Instrutor?');">Excluir</a>
                            <a href="view.php" class="btn btn-secondary">Voltar</a>
                        </div>
                        
                <?php
                    } else {
                        echo '<div class="alert alert-warning mt-4 text-center">Instrutor não encontrado.</div>';
                    }
                } else {
                    echo '<div class="alert alert-warning mt-4 text-center">Nenhum ID de Instrutor fornecido.</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
