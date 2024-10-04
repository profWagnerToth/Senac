<?php
include ('../bd/conexao.php');
class Aluno {    
    private $db;  
    
    public function __construct() {
        $this->db = Conexao::novaConexao();
    }

    public function cadastrarAluno($nome, $email, $telefone, $data_nascimento, $genero) {
        $cadAluno = $this->db->prepare("INSERT INTO alunos (nome, email, telefone, data_nascimento, genero) VALUES (?, ?, ?, ?, ?)");
        $cadAluno->execute([$nome, $email, $telefone, $data_nascimento, $genero]);       
    }   
    
    public function listarAlunos(){
        $listAluno = $this->db->query("SELECT * FROM Alunos");
        return $listAluno->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>