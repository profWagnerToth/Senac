<?php
include ('../bd/conexao.php');
class Aluno {    
    private $db;  
    
    public function __construct() {
        $this->db = Conexao::novaConexao();
    }  

    public function cadastrarAluno($nome, $email, $telefone, $data_nascimento, $genero) {
        try {
            // Depuração: Verificar dados antes da inserção
            echo "Inserindo no banco: Nome: $nome, Email: $email, Telefone: $telefone, Data de Nascimento: $data_nascimento, Gênero: $genero <br>";

            $cadAluno = $this->db->prepare("INSERT INTO alunos (nome, email, telefone, data_nascimento, genero) VALUES (?, ?, ?, ?, ?)");
            $cadAluno->execute([$nome, $email, $telefone, $data_nascimento, $genero]);

            echo "Dados gravados com sucesso!<br>";
        } catch (PDOException $e) {
            echo "Erro ao gravar no banco de dados: " . $e->getMessage();
        }
    }     
}
?>
