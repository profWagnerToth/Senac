<?php
include ('../bd/conexao.php');

class Professor{
    private $db;

    public function __construct(){
        $this->db = Conexao::novaConexao();
    }

    public function cadastrarProfessor($nome, $email, $telefone, $especialidade){
        $cadProf = $this->db->prepare("INSERT INTO professores (nome, email, telefone, especialidade) VALUES (?, ?, ?, ?)");
        $cadProf->execute([$nome, $email, $telefone, $especialidade]);
    }

    public function listarProfessores(){
        $listProfessor = $this->db->query("SELECT * FROM professores");
        return $listProfessor->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarProfessorPorId($id) {
        $buscaProfessor = $this->db->prepare("SELECT * FROM professores WHERE id = ?");
        $buscaProfessor->execute([$id]);
        return $buscaProfessor->fetch(PDO::FETCH_ASSOC);
    }

    public function editarProfessor($id, $nome, $email, $telefone, $especialidade) {
        $editProf = $this->db->prepare("UPDATE professores SET nome = ?, email = ?, telefone = ?, especialidade = ? WHERE id = ?");
        $editProf->execute([$nome, $email, $telefone, $especialidade, $id]);
    }

    public function excluirProfessor($id) {
        try {
            // Tentar excluir o aluno
            $delAluno = $this->db->prepare("DELETE FROM professores WHERE id = ?");
            $delAluno->execute([$id]);
    
            // Se a exclusão for bem-sucedida, exibir mensagem e botão para voltar à listagem
            echo "
            <div class='alert alert-success'>
                Professor excluído com sucesso!
            </div>
            <a href='listProf.php' class='btn btn-primary mt-3'>Voltar à lista de professores</a>";
            
        } catch (PDOException $e) {
            // Capturar o erro e verificar se é uma violação de integridade referencial
            if ($e->getCode() == 23000) {
                // Exibir uma mensagem amigável para o usuário com um botão para voltar
                echo "
                <div class='alert alert-danger'>
                    Não foi possível excluir o pofessor, pois ele está relacionado a outros registros (como treinos).
                    Exclua os registros associados primeiro.
                </div>
                <a href='javascript:history.back()' class='btn btn-primary mt-3'>Voltar</a>";
            } else {
                // Tratar outros erros que possam ocorrer
                echo "<div class='alert alert-danger'>Erro ao tentar excluir o professor: " . $e->getMessage() . "</div>";
            }
        }
    }
}
?>
