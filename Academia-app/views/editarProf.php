<?php
include('../includes/header.php');
include('../models/Professor.php');

$profModel = new Professor();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $professor = $profModel->buscarProfessorPorId($id);

    if (!$professor) {
        echo "Professor não encontrado.";
        exit;
    }
} else {
    echo "ID do professor não informado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $especialidade = $_POST['especialidade'];

    if ($nome && $email && $telefone && $especialidade) {
        $profModel->editarProfessor($id, $nome, $email, $telefone, $especialidade);
        header("Location: listProf.php");
        exit;
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>

<div class="container mt-5">
    <h2>Editar Professor</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $professor['nome']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $professor['email']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $professor['telefone']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="especialidade" class="form-label">Especialidade</label>
            <input type="text" class="form-control" id="especialidade" name="especialidade" value="<?php echo $professor['especialidade']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>

<?php include('../includes/footer.php'); ?>
