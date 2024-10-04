<?php
// Usar caminho absoluto para evitar erros de diretório
include_once dirname(__DIR__) . '/models/Aluno.php';

// A verificação das ações foi reorganizada para corrigir o erro
if (isset($_GET['action'])) {
    $controller = new AlunoController();
    
    if ($_GET['action'] === 'cadastrar') {
        $controller->cadastrar();
    } elseif ($_GET['action'] === 'listar') {
        $controller->listar();
    } else {
        echo "Ação inválida!";
    }
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
            
            } else {
                echo "Dados inválidos!<br>";
            }
        } else {
            echo "Método não é POST!<br>";
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