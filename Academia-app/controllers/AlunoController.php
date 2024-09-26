<?php
include_once '../controllers/Controller.php'; // Atualize o caminho conforme necessário

class AlunoController extends Controller
{
    // Função de cadastro de aluno
    public function cadastrar()
    {
        // Alerta que a função cadastrar foi chamada
        echo "<script>alert('Função cadastrar chamada!');</script>";

        // Captura os dados do formulário
        $nome = $_POST['nome'] ?? null; // Usando null coalescing para evitar undefined variable
        $email = $_POST['email'] ?? null;
        $telefone = $_POST['telefone'] ?? null;
        $data_nascimento = $_POST['data_nascimento'] ?? null;
        $genero = $_POST['genero'] ?? null;

        // Verifica se os dados foram enviados via POST para salvar o aluno
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Chama o modelo para cadastrar o aluno
            $alunoModel = $this->model('Aluno');
            $alunoModel->cadastrarAluno($nome, $email, $telefone, $data_nascimento, $genero);
            // header('Location: /aluno/listar'); // Redireciona após o cadastro
        } else {
            // Exibe o formulário de cadastro se for um GET
            $this->view('alunos/cadastro'); // Corrigi o caminho para a view correta
        }
    }

    // Função de listar alunos
    public function listar()
    {
        $alunoModel = $this->model('Aluno'); // Corrigi 'models' para 'model'
        $alunos = $alunoModel->listarAlunos();
        $this->view('alunos/listar', ['alunos' => $alunos]); // Ajusta caminho e passa o array direto
    }

    // Função de registrar Treino
    public function registrarTreino($alunoId, $treinoId)
    {
        $treinoModel = $this->model('Treino'); // Corrigi 'models' para 'model'
        $treinoModel->registrarTreino($alunoId, $treinoId);
        header('Location: /aluno/treinos/' . $alunoId); // Corrigi o caminho de redirecionamento
    }
}

?>