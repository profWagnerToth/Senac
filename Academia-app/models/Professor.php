<?php
include ('../bd/conexao.php');

class Professor{
    private $db;

    public function __construct(){
        $this->db=Conexao::novaConexao();
    }

    public function cadastrarProfessor($nome,$email,$telefone, $especialidade){
        $cadProf = $this->db->prepare("INSERT INTO professores (nome,email,telefone,especialidade) VALUES (?,?,?,?)");

        $cadProf->execute([$nome,$email,$telefone,$especialidade]);
    }

    public function listarProfessores(){
        $listProfessor = $this->db->query("SELECT * FROM Professores");
        return $listProfessor->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>