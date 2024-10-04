<?php
include ('../bd/conexao.php');
class Aluno {    
    private $db;  
    
    public function __construct() {
        $this->db = Conexao::novaConexao();
        
        // Depuração: Verificar se a conexão foi estabelecida corretamente
        if ($this->db) {
            echo "Conexão estabelecida com sucesso!<br>";
        } else {
            echo "Erro na conexão com o banco de dados!<br>";
        }
    }

    public function cadastrarAluno($nome, $email, $telefone, $data_nascimento, $genero) {
        $cadAluno = $this->db->prepare("INSERT INTO alunos (nome, email, telefone, data_nascimento, genero) VALUES (?, ?, ?, ?, ?)");
        $cadAluno->execute([$nome, $email, $telefone, $data_nascimento, $genero]);
        /*
        try {
            // Depuração: Verificar dados antes da inserção
            // echo "Inserindo no banco: Nome: $nome, Email: $email, Telefone: $telefone, Data de Nascimento: $data_nascimento, Gênero: $genero <br>";


            echo "Dados gravados com sucesso!<br>";
        } catch (PDOException $e) {
            echo "Erro ao gravar no banco de dados: " . $e->getMessage();
        }*/
    }   
    
    public function listarAlunos(){
        $listAluno = $this->db->query("SELECT * FROM Alunos");
        return $listAluno->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>