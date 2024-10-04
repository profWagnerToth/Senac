<?php 
include('../models/Professor.php');

if (isset($_GET['action'])) {
    $controller = new ProfessorController();
    
    if ($_GET['action'] === 'cadastrar') {
        $controller->cadastrar();
    } elseif ($_GET['action'] === 'listar') {
        $controller->listar();
    }
}

    Class ProfessorController{
        public function cadastrar(){
            if($_SERVER['REQUEST_METHOD']==='POST'){
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $telefone = $_POST['telefone'];
                $especialidade = $_POST['especialidade'];

                if($nome && $email &&$telefone && $especialidade){
                    $profModel= new Professor();
                    $profModel->cadastrarProfessor($nome,$email,$telefone,$especialidade);
                }
            }
        }

        public function listar()
        {
            $professor = new Professor();
            $professores = $professor->listarProfessores();
            return $professores;
        }
    }
?>
