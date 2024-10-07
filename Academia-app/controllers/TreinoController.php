<?php 
include('../models/Treino.php');

if (isset($_GET['action'])) {
    $controller = new TreinoController();
    
    if ($_GET['action'] === 'cadastrar') {
        $controller->cadastrar();
    } elseif ($_GET['action'] === 'listar') {
        $controller->listar();
    } elseif ($_GET['action'] === 'atualizar') {
        $controller->atualizar();
    }
}

class TreinoController{
    public function cadastrar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $descricao = $_POST['descricao'];
            $idAluno = $_POST['idAluno'];
            $idProfessor = $_POST['idProfessor'];         

            if($descricao && $idAluno && $idProfessor){
                $treinoModel = new Treino();
                $treinoModel->cadastrarTreino($descricao, $idAluno, $idProfessor);
            }
        }        
    }

    public function listar()
    {
        $treino = new Treino;
        $treinos = $treino->listarTreinos();
        return $treinos;
    }

    public function atualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
            $descricao = $_POST['descricao'];
            $idAluno = $_POST['idAluno'];
            $idProfessor = $_POST['idProfessor'];
            $id = $_GET['id'];

            if ($descricao && $idAluno && $idProfessor) {
                $treinoModel = new Treino();
                $treinoModel->atualizarTreino($id, $descricao, $idAluno, $idProfessor);

                // Redireciona para a lista de treinos após a atualização
                header("Location: ../views/litTreino.php");
                exit(); // Certifique-se de sair após o redirecionamento
            }
        }        
    }
}
?>
