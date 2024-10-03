<?php
// Usar caminho absoluto para evitar erros de diretório
include_once dirname(__DIR__) . '/models/Aluno.php';

// Verifique se a ação foi passada na URL
if (isset($_GET['action']) && $_GET['action'] === 'cadastrar') {
    // echo "Chamando a função cadastrar()!<br>";  // Depuração: Verificar se a rota está funcionando
    $controller = new AlunoController();
    $controller->cadastrar();
} else {
    echo "Nenhuma ação foi passada!<br>";  // Depuração: Se não houver ação
}

if (isset($_GET['action']) && $_GET['action'] === 'listar') {
    // echo "Chamando a função listar()!<br>";  // Depuração: Verificar se a rota está funcionando
    $controller = new AlunoController();
    $controller->listar();
} else {
    echo "Nenhuma ação foi passada!<br>";  // Depuração: Se não houver ação
}

class AlunoController
{
    public function cadastrar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $data_nascimento = $_POST['data_nascimento'];
            $genero = $_POST['genero'];

            if ($nome && $email && $telefone && $data_nascimento && $genero) {
                $alunoModel = new Aluno();
                $alunoModel->cadastrarAluno($nome, $email, $telefone, $data_nascimento, $genero);

            }
        }
    }

    public function listar()
    {
        $aluno = new Aluno;
        $alunos = $aluno->listarAlunos();
        return $alunos;
    }
}
?>