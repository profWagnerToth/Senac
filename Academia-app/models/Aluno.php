<?php
// Usar caminho absoluto para evitar erros de diretório
include_once dirname(__DIR__) . '/bd/conexao.php';

class Aluno {    
    private $db;  
    
    public function __construct() {
        $this->db = Conexao::novaConexao();
    }  

    public function cadastrarAluno($nome, $email, $telefone, $data_nascimento, $genero) {
        $cadAluno = $this->db->prepare("INSERT INTO alunos (nome, email, telefone, data_nascimento, genero) VALUES (?, ?, ?, ?, ?)");
        $cadAluno->execute([$nome, $email, $telefone, $data_nascimento, $genero]);
    }   
    
    public function listarAlunos() {
        // Buscar todos os alunos
        $listAluno = $this->db->query("SELECT * FROM alunos");
        $listAluno->execute();
        return $listAluno->fetchAll(PDO::FETCH_ASSOC);
    }
}
    
?>
