<?php 
include ('../bd/conexao.php');

class Treino {
    private $db;

    public function __construct() {
        $this->db = Conexao::novaConexao();
    }

    public function cadastrarTreino($descricao, $idAluno, $idProfessor) {
        $cadTreino = $this->db->prepare("INSERT INTO treinos (descricao, aluno_id, professor_id) VALUES (?,?,?)");
        $cadTreino->execute([$descricao, $idAluno, $idProfessor]);
    }

    public function listarTreinos() {
        $listTreino = $this->db->query("SELECT * FROM treinos");
        return $listTreino->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizarTreino($id, $descricao, $idAluno, $idProfessor) {
        $updateTreino = $this->db->prepare("UPDATE treinos SET descricao = ?, aluno_id = ?, professor_id = ? WHERE id = ?");
        $updateTreino->execute([$descricao, $idAluno, $idProfessor, $id]);
    }

    public function buscarTreinoPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM treinos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
