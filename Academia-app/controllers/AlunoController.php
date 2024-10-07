<?php
include_once dirname(__DIR__) . '/models/Aluno.php';

if (isset($_GET['action'])) {
    $controller = new AlunoController();
    
    if ($_GET['action'] === 'cadastrar') {
        $controller->cadastrar();
    } elseif ($_GET['action'] === 'listar') {
        $controller->listar();
    } elseif ($_GET['action'] === 'editar') {
        $controller->editar();
    }
}

class AlunoController
{
    // Método para cadastrar aluno (já existente)
    public function cadastrar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $data_nascimento = $_POST['data_nascimento'];
            $genero = $_POST['genero'];

            if ($nome && $email && $telefone && $data_nascimento && $genero) {
                $alunoModel = new Aluno();
                $alunoModel->cadastrarAluno($nome, $email, $telefone, $data_nascimento, $genero);
            } else {
                echo "Dados inválidos!<br>";
            }
        }
    }

    // Método para listar alunos (já existente)
    public function listar()
    {
        $aluno = new Aluno();
        $alunos = $aluno->listarAlunos();
        return $alunos;
    }

    // Novo: Método para editar um aluno
    public function editar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $data_nascimento = $_POST['data_nascimento'];
            $genero = $_POST['genero'];

            if ($id && $nome && $email && $telefone && $data_nascimento && $genero) {
                $alunoModel = new Aluno();
                $alunoModel->editarAluno($id, $nome, $email, $telefone, $data_nascimento, $genero);
                header('Location: listAluno.php'); // Redireciona após editar
            } else {
                echo "Dados inválidos!<br>";
            }
        }
    }
}
?>
