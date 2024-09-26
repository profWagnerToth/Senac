<?php 
class AlunoController extends Controller{
    #Função de cadastro de aluno
    public function cadastrar(){
        //Verificar se od dados foram enviados via POST para salvar o aluno
        if($_SERVER['REQUEST_METHOD']==='POST'){
            //Captura os dados do formulário
            $nome = $_POST['nome'];
            $idade = $_POST['idade'];
            $email = $_POST['email'];

            //Criar uma instância do model Aluno e chamar o método de cadastro
            $alunoModel = $this->models('Aluno');
            $alunoModel ->cadastrar_aluno($nome,$idade,$email); 

            header('Location: ../aluno/listar');
        }

        //Exibe o formulário de cadastro se for um GET
        $this->view('aluno/cadastro');
    }

    #Função de listar aluno
    public function listar(){
        $alunoModel= $this->models('Aluno');
        $alunos = $alunoModel->listarAlunos();
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