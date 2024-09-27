<?php 
include('../models/Professor.php');

if(isset($_GET['action']) && $_GET['action'] == 'cadastrar'){
    $controller = new ProfessorController();

    $controller->cadastrar();
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
    }
?>
