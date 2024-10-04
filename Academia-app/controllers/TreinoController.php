<?php 
include('../models/Treino.php');

if (isset($_GET['action'])) {
    $controller = new TreinoController();
    
    if ($_GET['action'] === 'cadastrar') {
        $controller->cadastrar();
    } elseif ($_GET['action'] === 'listar') {
        $controller->listar();
    }
}

class TreinoController{
    public function cadastrar(){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $descricao = $_POST['descricao'];
            $idAluno = $_POST['idAluno'];
            $idProfessor=$_POST['idProfessor'];         

            if($descricao && $idAluno && $idProfessor){
                $treinoModel = new Treino();
                $treinoModel->cadastrarTreino($descricao,$idAluno,$idProfessor);
            }
        }        
    }

    public function listar()
    {
        $treino = new Treino;
        $treinos = $treino->listarTreinos();
        return $treinos;
    }
}
?>