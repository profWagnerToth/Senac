<?php
include('../bd/conexao.php');

class Aluno
{
    private $db;

    public function __construct()
    {
        $this->db = Conexao::novaConexao();
    }

    public function cadastrarAluno($nome, $email, $telefone, $data_nascimento, $genero)
    {
        $cadAluno = $this->db->prepare("INSERT INTO alunos (nome, email, telefone, data_nascimento, genero) VALUES (?, ?, ?, ?, ?)");
        $cadAluno->execute([$nome, $email, $telefone, $data_nascimento, $genero]);
    }

    public function listarAlunos()
    {
        $listAluno = $this->db->query("SELECT * FROM alunos");
        return $listAluno->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarAlunoPorId($id)
    {
        $buscaAluno = $this->db->prepare("SELECT * FROM alunos WHERE id = ?");
        $buscaAluno->execute([$id]);
        return $buscaAluno->fetch(PDO::FETCH_ASSOC);
    }

    public function excluirAluno($id) {
        try {
            // Tentar excluir o aluno
            $delAluno = $this->db->prepare("DELETE FROM alunos WHERE id = ?");
            $delAluno->execute([$id]);
    
            // Se a exclusão for bem-sucedida, exibir mensagem e botão para voltar à listagem
            echo "
            <div class='alert alert-success'>
                Aluno excluído com sucesso!
            </div>
            <a href='listAluno.php' class='btn btn-primary mt-3'>Voltar à lista de alunos</a>";
            
        } catch (PDOException $e) {
            // Capturar o erro e verificar se é uma violação de integridade referencial
            if ($e->getCode() == 23000) {
                // Exibir uma mensagem amigável para o usuário com um botão para voltar
                echo "
                <div class='alert alert-danger'>
                    Não foi possível excluir o aluno, pois ele está relacionado a outros registros (como treinos).
                    Exclua os registros associados primeiro.
                </div>
                <a href='javascript:history.back()' class='btn btn-primary mt-3'>Voltar</a>";
            } else {
                // Tratar outros erros que possam ocorrer
                echo "<div class='alert alert-danger'>Erro ao tentar excluir o aluno: " . $e->getMessage() . "</div>";
            }
        }
    }
    
    


    public function excluirTreinosPorAluno($id)
    {
        $delTreinos = $this->db->prepare("DELETE FROM treinos WHERE aluno_id = ?");
        $delTreinos->execute([$id]);
    }

}
?>