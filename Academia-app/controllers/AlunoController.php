<?php 
class AlunoController extends Controller{
    #Função de cadastro de aluno
    public function cadastrar(){
        $this->view('../views/aluno/cadastro');
    }

    #Função de listar aluno
    public function listar(){
        $alunoModel= $this->models('Aluno');
        $alunos = $alunoModel->getAll();
        $this ->view('../views/listar',['alunos'=>"$alunos"]);
    }

    #Função de registrar Treino
    public function registrarTreino($alunoId, $treinoId){
        $treinoModel = $this->models('Treino');
        $treinoModel -> registrarTreino($alunoId,$treinoId);
        header('Location: ../views/aluno/treinos/'.$alunoId);
    }
}
?>