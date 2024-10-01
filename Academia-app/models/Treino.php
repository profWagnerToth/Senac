<?php 
include ('../bd/conexao.php');

class Treino{
    private $db;

    public function __construct(){
        $this->db=Conexao::novaConexao();
    }

    public function cadastrarTreino($descricao, $idAluno, $idProfessor){
        $cadTreino = $this->db->prepare("INSERT INTO treinos (descricao, aluno_id, professor_id) VALUES (?,?,?)");

        $cadTreino->execute([$descricao,$idAluno,$idProfessor]);
    }
}
?>