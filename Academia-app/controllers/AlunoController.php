<?php 
class AlunoController extends Controller {
    // Função de cadastro de aluno
    public function cadastrar() {
        // Verifica se os dados foram enviados via POST para salvar o aluno
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $alunoModel = $this->model('Aluno');
            // Supondo que o formulário de cadastro tenha um campo 'nome'
            $nome = $_POST['nome'];
            $alunoModel->cadastrarAluno($nome);
            header('Location: /aluno/listar'); // Redireciona após o cadastro
        } else {
            // Exibe o formulário de cadastro se for um GET
            $this->view('alunos/cadastro'); // Corrigi o caminho para a view correta
        }

    }

    // Função de listar alunos
    public function listar() {
        $alunoModel = $this->model('Aluno'); // Corrigi 'models' para 'model'
        $alunos = $alunoModel->listarAlunos();
        $this->view('alunos/listar', ['alunos' => $alunos]); // Ajusta caminho e passa o array direto
    }

    // Função de registrar Treino
    public function registrarTreino($alunoId, $treinoId) {
        $treinoModel = $this->model('Treino'); // Corrigi 'models' para 'model'
        $treinoModel->registrarTreino($alunoId, $treinoId);
        header('Location: /aluno/treinos/' . $alunoId); // Corrigi o caminho de redirecionamento
    }
}
?>
