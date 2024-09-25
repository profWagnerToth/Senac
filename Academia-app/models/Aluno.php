<?php 
    
class Aluno{    
    private $db;  
    public function __construct(){
        $this->db=Conexao::novaConexao();
    }  

    public function listarAlunos(){
        $query = $this->db->query("SELECT * FROM alunos");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cadastrarAluno($nome,$idade,$email){
        $cadAluno = $this->db->prepare("INSERT INTO alunos(nome,idade,email)VALUES(?,?,?)");
        $cadAluno->execute([$nome,$idade,$email]);
    }     
}
?>