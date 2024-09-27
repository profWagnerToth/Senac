<?php
include_once '../models/Aluno.php'; // Certifique-se de que o caminho está correto

// Verifique se a ação foi passada na URL
if (isset($_GET['action']) && $_GET['action'] === 'cadastrar') {
    // echo "Chamando a função cadastrar()!<br>";  // Depuração: Verificar se a rota está funcionando
    $controller = new AlunoController();
    $controller->cadastrar();
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
            } else {
                echo "Dados inválidos!<br>";
            }
        } else {
            echo "Método não é POST!<br>";
        } */
              }
        }
    }
}
?>