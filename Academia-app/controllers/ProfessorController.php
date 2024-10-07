<?php 
include('../models/Professor.php');

if (isset($_GET['action'])) {
    $controller = new ProfessorController();
    
    if ($_GET['action'] === 'cadastrar') {
        $controller->cadastrar();
    } elseif ($_GET['action'] === 'listar') {
        $controller->listar();
    } elseif ($_GET['action'] === 'editar') {
        $controller->editar();
    }
}

class ProfessorController {
    public function cadastrar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $especialidade = $_POST['especialidade'];

            if ($nome && $email && $telefone && $especialidade) {
                $profModel = new Professor();
                $profModel->cadastrarProfessor($nome, $email, $telefone, $especialidade);
                header("Location: ../views/listProf.php");
            }
        }
    }

    public function listar() {
        $professor = new Professor();
        $professores = $professor->listarProfessores();
        return $professores;
    }

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $especialidade = $_POST['especialidade'];

            if ($nome && $email && $telefone && $especialidade) {
                $profModel = new Professor();
                $profModel->editarProfessor($id, $nome, $email, $telefone, $especialidade);
                header("Location: ../views/listProf.php");
            }
        }
    }
}
?>
