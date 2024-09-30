<?php 
include('../models/Treino.php');

if(isset($_GET['action']) && $_GET['action']=='cadastrar'){
    $controller = new TreinoController();
    $controller->cadastrar();
}

class TreinoController{
    public function cadastrar(){
        if($_SERVER['REQUEST_METHOD'==='POST']){
            $descricao = $_POST['descricao'];
            $idAluno = $_POST['idAluno'];
            $idProfessor=$$_POST['idProfessor'];
        }        
    }
}
?>