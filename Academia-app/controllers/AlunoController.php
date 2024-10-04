<?php
include_once '../models/Aluno.php'; // Certifique-se de que o caminho está correto

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
            
            /*
            var_dump($nome, $email, $telefone, $data_nascimento, $genero);  // Depuração: Mostrar os dados
            */

            if ($nome && $email && $telefone && $data_nascimento && $genero) {
                $alunoModel = new Aluno();
                $alunoModel->cadastrarAluno($nome, $email, $telefone, $data_nascimento, $genero);
                /*
                try {
                    echo "Aluno cadastrado com sucesso!<br>";
                } catch (Exception $e) {
                    echo "Erro ao cadastrar o aluno: " . $e->getMessage();
                }
                */
            } else {
                echo "Dados inválidos!<br>";
            }
        } else {
            echo "Método não é POST!<br>";
        }
    }

    public function listar(){
        $alunoModel = new Aluno(); // Cria uma nova instância do modelo Aluno
        $alunos = $alunoModel->listarAlunos(); // Captura a lista de alunos        
        
        // Depuração: Verifique se a variável $alunos está recebendo os dados corretamente
        if(empty($alunos)) {
            echo "Nenhum aluno encontrado na listagem.<br>"; // Mensagem se não houver alunos
        } else {
            echo "Total de alunos encontrados: " . count($alunos) . "<br>"; // Mostra total de alunos
        }

        
        include('../views/aluno/listar.php'); // Inclui a view
    }
} 

$x=new AlunoController();

$x->listar();

$lista = $x;
print_r($lista);
?>