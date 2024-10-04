<?php
include('../bd/conexao.php');

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
     }  

     public function listarAlunos(){       
        $ListagemAlunos = $this->db->prepare("SELECT * FROM alunos");        
        $ListagemAlunos->execute();
        $ListagemAlunos->fetchAll(PDO::FETCH_ASSOC);
        
        global $x;
        $x=3;
        return $ListagemAlunos;
    }
}  

function listarAlunos(){

   
}


?>