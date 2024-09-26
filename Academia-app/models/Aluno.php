<?php 

class Aluno {    
    private $db;  
    
    // Construtor para inicializar a conexão com o banco de dados
    public function __construct() {
        $this->db = Conexao::novaConexao();
    }  

    // Método para listar todos os alunos
    public function listarAlunos() {
        $query = $this->db->query("SELECT * FROM alunos");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para cadastrar um novo aluno
    public function cadastrarAluno($nome,$email, $telefone,$data_nascimento,$genero) {        
        $cadAluno = $this->db->prepare("INSERT INTO alunos (nome,email,telefone,data_nascimento,genero) VALUES (?, ?, ?,?,?)");
        $cadAluno->execute([$nome,$email, $telefone,$data_nascimento,$genero]);
    }     
}
?>
