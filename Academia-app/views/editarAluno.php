<?php
    include('../includes/header.php');
    include('../models/aluno.php');

    $alunoModel = new Aluno();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $aluno = $alunoModel->buscarAlunoPorId($id);

        if (!$aluno) {
            echo "Aluno não encontrado.";
            exit;
        }
    } else {
        echo "ID do aluno não informado.";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $data_nascimento = $_POST['data_nascimento'];
        $genero = $_POST['genero'];

        if ($nome && $email && $telefone && $data_nascimento && $genero) {
            $alunoModel->editarAluno($id, $nome, $email, $telefone, $data_nascimento, $genero);
            header("Location: listAluno.php"); // Redirecionar para a lista após a edição
            exit;
        } else {
            echo "Por favor, preencha todos os campos.";
        }
    }
?>

<div class="container mt-5">
    <h2>Editar Aluno</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $aluno['nome']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $aluno['email']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $aluno['telefone']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?php echo $aluno['data_nascimento']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="genero" class="form-label">Gênero</label>
            <select class="form-select" id="genero" name="genero" required>
                <option value="Masculino" <?php if ($aluno['genero'] == 'Masculino') echo 'selected'; ?>>Masculino</option>
                <option value="Feminino" <?php if ($aluno['genero'] == 'Feminino') echo 'selected'; ?>>Feminino</option>
                <option value="Outros" <?php if ($aluno['genero'] == 'Outros') echo 'selected'; ?>>Outros</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>

<?php include('../includes/footer.php'); ?>
