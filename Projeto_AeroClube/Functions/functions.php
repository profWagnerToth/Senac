<?php
use Stripe\Billing\Alert;
// functions.php

// Função para conectar ao banco de dados
function connectDatabase()
{
    $host = 'localhost';   // Host do banco de dados
    $db = 'aeroclube';      // Nome do banco de dados
    $user = 'root';         // Usuário do banco de dados
    $pass = '';             // Senha do banco de dados

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }
}

// functions.php

// Função para fazer login do usuário
function loginUser($username, $password)
{
    $pdo = connectDatabase();

    // Prepara a consulta para buscar o usuário pelo nome de usuário
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    // Busca o resultado
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o usuário foi encontrado e se a senha está correta
    if ($user && password_verify($password, $user['password'])) {
        // Login bem-sucedido
        return $user;
    } else {
        // Falha no login
        return false;
    }
}

//********************************************** ALUNOS ********************************************************************
// functions/functions.php
function insertAluno($nomeAluno, $dtNasc, $enderecoAluno, $bairroAluno, $cidadeAluno, $estadoAluno, $foneAluno, $fotoAluno)
{
    $pdo = connectDatabase();

    $sql = "INSERT INTO alunos (nomeAluno, dtNasc, enderecoAluno, bairroAluno, cidadeAluno, estadoAluno, foneAluno) 
            VALUES (:nomeAluno, :dtNasc, :enderecoAluno, :bairroAluno, :cidadeAluno, :estadoAluno, :foneAluno, :fotoAluno)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':nomeAluno', $nomeAluno, PDO::PARAM_STR);
    $stmt->bindParam(':dtNasc', $dtNasc, PDO::PARAM_STR);
    $stmt->bindParam(':enderecoAluno', $enderecoAluno, PDO::PARAM_STR);
    $stmt->bindParam(':bairroAluno', $bairroAluno, PDO::PARAM_STR);
    $stmt->bindParam(':cidadeAluno', $cidadeAluno, PDO::PARAM_STR);
    $stmt->bindParam(':estadoAluno', $estadoAluno, PDO::PARAM_STR);
    $stmt->bindParam(':foneAluno', $foneAluno, PDO::PARAM_STR);
    $stmt->bindParam(':fotoAluno', $fotoAluno, PDO::PARAM_STR);

    if ($stmt->execute()) {
        // Obter o ID do último registro inserido
        $lastId = $pdo->lastInsertId();

        // Obter o último registro inserido
        $sql = "SELECT * FROM alunos WHERE idAluno = :idAluno";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idAluno', $lastId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function getAlunosAtivos()
{
    $pdo = connectDatabase();
    $stmt = $pdo->query("SELECT * FROM alunos WHERE ativo = 1");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Função para obter um aluno pelo ID
function getAlunoById($id)
{
    $pdo = connectDatabase();
    $stmt = $pdo->prepare("SELECT * FROM alunos WHERE idAluno = :idAluno");
    $stmt->bindParam(':idAluno', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Função para atualizar os dados do aluno
function updateAluno($id, $nome, $dtNasc, $endereco, $bairro, $cidade, $estado, $fone)
{
    $pdo = connectDatabase();
    $stmt = $pdo->prepare("UPDATE alunos SET nomeAluno = :nomeAluno, dtNasc = :dtNasc, enderecoAluno = :enderecoAluno, bairroAluno = :bairroAluno, cidadeAluno = :cidadeAluno, estadoAluno = :estadoAluno, foneAluno = :foneAluno WHERE idAluno = :idAluno");
    $stmt->bindParam(':idAluno', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nomeAluno', $nome);
    $stmt->bindParam(':dtNasc', $dtNasc);
    $stmt->bindParam(':enderecoAluno', $endereco);
    $stmt->bindParam(':bairroAluno', $bairro);
    $stmt->bindParam(':cidadeAluno', $cidade);
    $stmt->bindParam(':estadoAluno', $estado);
    $stmt->bindParam(':foneAluno', $fone);
    return $stmt->execute();
}

// Função para desativar um aluno
function desativarAluno($id)
{
    $pdo = connectDatabase();
    $stmt = $pdo->prepare("UPDATE alunos SET ativo = 0 WHERE idAluno = :idAluno");
    $stmt->bindParam(':idAluno', $id, PDO::PARAM_INT);
    return $stmt->execute();
}

// Buscar aluno por ID
function getAlunoById_editar($id)
{
    $pdo = connectDatabase();
    $stmt = $pdo->prepare("SELECT * FROM alunos WHERE idAluno = :idAluno AND ativo = 1");
    $stmt->bindParam(':idAluno', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Buscar alunos por nome
function getAlunosByName($name)
{
    $pdo = connectDatabase();
    $stmt = $pdo->prepare("SELECT * FROM alunos WHERE nomeAluno LIKE :nomeAluno AND ativo = 1");
    $name = "%$name%";
    $stmt->bindParam(':nomeAluno', $name, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Buscar aluno por ID
function getAlunoById_excluir_aluno($id)
{
    $pdo = connectDatabase();
    $stmt = $pdo->prepare("SELECT * FROM alunos WHERE idAluno = :idAluno AND ativo = 1");
    $stmt->bindParam(':idAluno', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//************************************  INSTRUTORES ****************************************************************** */
function insertInstrutor($nomeInstrutor, $matriculaInstrutor, $breveInstrutor, $dtNasc, $enderecoInstrutor, $bairroInstrutor, $cidadeInstrutor, $estadoInstrutor, $foneInstrutor, $fotoInstrutor)
{
    $pdo = connectDatabase();

    $sql = "INSERT INTO Instrutores (nomeInstrutor,matriculaInstrutor, breveInstrutor, dtNasc, enderecoInstrutor, bairroInstrutor, cidadeInstrutor, estadoInstrutor, foneInstrutor) 
            VALUES (:nomeInstrutor, :matriculaInstrutor, :breveInstrutor, :dtNascInstrutor, :enderecoInstrutor, :bairroInstrutor, :cidadeInstrutor, :estadoInstrutor, :foneInstrutor, :fotoInstrutor)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':nomeInstrutor', $nomeInstrutor, PDO::PARAM_STR);
    $stmt->bindParam(':matriculaInstrutor', $matriculaInstrutor, PDO::PARAM_STR);
    $stmt->bindParam(':breveInstrutor', $breveInstrutor, PDO::PARAM_STR);
    $stmt->bindParam(':dtNascInstrutor', $dtNasc, PDO::PARAM_STR);
    $stmt->bindParam(':enderecoInstrutor', $enderecoInstrutor, PDO::PARAM_STR);
    $stmt->bindParam(':bairroInstrutor', $bairroInstrutor, PDO::PARAM_STR);
    $stmt->bindParam(':cidadeInstrutor', $cidadeInstrutor, PDO::PARAM_STR);
    $stmt->bindParam(':estadoInstrutor', $estadoInstrutor, PDO::PARAM_STR);
    $stmt->bindParam(':foneInstrutor', $foneInstrutor, PDO::PARAM_STR);
    $stmt->bindParam(':fotoInstrutor', $fotoInstrutor, PDO::PARAM_STR);

    if ($stmt->execute()) {
        // Obter o ID do último registro inserido
        $lastId = $pdo->lastInsertId();

        // Obter o último registro inserido
        $sql = "SELECT * FROM Instrutores WHERE idInstrutor = :idInstrutor";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idInstrutor', $lastId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function getInstrutoresAtivos()
{
    $pdo = connectDatabase();
    $stmt = $pdo->query("SELECT * FROM Instrutores WHERE ativo = 1");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Função para obter um Instrutor pelo ID
function getInstrutorById($id)
{
    $pdo = connectDatabase();
    $stmt = $pdo->prepare("SELECT * FROM Instrutores WHERE idInstrutor = :idInstrutor");
    $stmt->bindParam(':idInstrutor', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Função para atualizar os dados do Instrutor
function updateInstrutor($id, $nome, $matricula, $breve, $dtNasc, $endereco, $bairro, $cidade, $estado, $fone)
{
    // echo"$id, $nome, $matricula, $breve,$dtNasc, $endereco, $bairro, $cidade, $estado, $fone";
    $pdo = connectDatabase();
    $stmt = $pdo->prepare("UPDATE Instrutores SET nomeInstrutor = :nomeInstrutor, matriculaInstrutor = :matriculaInstrutor, breveInstrutor = :breveInstrutor, dataNascInstrutor = :dataNascInstrutor, enderecoInstrutor = :enderecoInstrutor, bairroInstrutor = :bairroInstrutor, cidadeInstrutor = :cidadeInstrutor, estadoInstrutor = :estadoInstrutor, foneInstrutor = :foneInstrutor WHERE idInstrutor = :idInstrutor");

    $stmt->bindParam(':idInstrutor', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nomeInstrutor', $nome);
    $stmt->bindParam(':matriculaInstrutor', $matricula);
    $stmt->bindParam(':breveInstrutor', $breve);
    $stmt->bindParam(':dataNascInstrutor', $dtNasc);
    $stmt->bindParam(':enderecoInstrutor', $endereco);
    $stmt->bindParam(':bairroInstrutor', $bairro);
    $stmt->bindParam(':cidadeInstrutor', $cidade);
    $stmt->bindParam(':estadoInstrutor', $estado);
    $stmt->bindParam(':foneInstrutor', $fone);
    return $stmt->execute();
}

// Função para desativar um Instrutor
function desativarInstrutor($id)
{
    $pdo = connectDatabase();
    $stmt = $pdo->prepare("UPDATE Instrutores SET ativo = 0 WHERE idInstrutor = :idInstrutor");
    $stmt->bindParam(':idInstrutor', $id, PDO::PARAM_INT);
    return $stmt->execute();
}

// Buscar Instrutor por ID
function getInstrutorById_editar($id)
{
    $pdo = connectDatabase();
    $stmt = $pdo->prepare("SELECT * FROM Instrutores WHERE idInstrutor = :idInstrutor AND ativo = 1");
    $stmt->bindParam(':idInstrutor', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Usando fetch() para obter um único registro
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


// Buscar Instrutores por nome
function getInstrutoresByName($name)
{
    $pdo = connectDatabase();
    $stmt = $pdo->prepare("SELECT * FROM Instrutores WHERE nomeInstrutor LIKE :nomeInstrutor AND ativo = 1");
    $name = "%$name%";
    $stmt->bindParam(':nomeInstrutor', $name, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Buscar Instrutor por ID
function getInstrutorById_excluir_Instrutor($id)
{
    $pdo = connectDatabase();
    $stmt = $pdo->prepare("SELECT * FROM Instrutores WHERE idInstrutor = :idInstrutor AND ativo = 1");
    $stmt->bindParam(':idInstrutor', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//************************* FORMAÇÕES ADICIONAIS ********************************************************** */
function insertFormacaoAdicional($nomeFormacao, $cargaHoraria)
{
    $pdo = connectDatabase();

    // Preparar a consulta SQL para inserir a formação adicional
    $stmt = $pdo->prepare("INSERT INTO Formacoes_Adicionais (nomeFormacao, cargaHoraria) VALUES (:nomeFormacao, :cargaHoraria)");

    // Vincular os parâmetros
    $stmt->bindParam(':nomeFormacao', $nomeFormacao);
    $stmt->bindParam(':cargaHoraria', $cargaHoraria);

    // Executar a consulta
    return $stmt->execute();
}

// Função para buscar formação por ID
function buscarFormacaoPorId($id)
{
    $pdo = connectDatabase();
    $stmt = $pdo->prepare("SELECT * FROM Formacoes_Adicionais WHERE idFormAdd = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Função para buscar formação por nome (parte do nome)
function buscarFormacaoPorNome($nome)
{
    $pdo = connectDatabase();
    $stmt = $pdo->prepare("SELECT * FROM Formacoes_Adicionais WHERE nomeFormacao LIKE :nome");
    $nome = '%' . $nome . '%';  // Permite a busca por qualquer parte do nome
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Função para buscar todas as formações
function buscarTodasFormacoes()
{
    $pdo = connectDatabase();
    $stmt = $pdo->query("SELECT * FROM Formacoes_Adicionais where ativo =1 ORDER BY idFormAdd ASC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// functions.php

function excluirFormacao($idFormAdd)
{
    // Conectar ao banco de dados
    $pdo = connectDatabase();

    // Preparar a instrução SQL para atualizar o campo "ativo" para 0
    $stmt = $pdo->prepare("UPDATE formacoes_adicionais SET ativo = 0 WHERE idFormAdd = :idFormAdd");
    $stmt->bindParam(':idFormAdd', $idFormAdd, PDO::PARAM_INT);

    // Executar a atualização
    return $stmt->execute();
}

/****************** FUNÇÕES X INSTRUTORES ********************************************************* */

// Buscar todos os instrutores
function buscarTodosInstrutores()
{
    $pdo = connectDatabase();
    $stmt = $pdo->query("SELECT idInstrutor, nomeInstrutor, matriculaInstrutor FROM instrutores WHERE ativo=1");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Buscar todas as formações ativas
function buscarFormacoesAtivas()
{
    $pdo = connectDatabase();
    $stmt = $pdo->query("SELECT idFormAdd, nomeFormacao FROM formacoes_adicionais WHERE ativo = 1");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Inserir a formação do instrutor na tabela formacoesInstrutores
function inserirFormacaoInstrutor($instrutorId, $formacaoId, $dataObtencao, $matriculaInstrutor)
{
    $pdo = connectDatabase();
    $stmt = $pdo->prepare("INSERT INTO formacoesInstrutores (idInstrutor, idFormAdd, dataObtencao, matriculaInstrutor) VALUES (:instrutorId, :formacaoId, :dataObtencao, :matriculaInstrutor)");
    $stmt->bindParam(':instrutorId', $instrutorId, PDO::PARAM_INT);
    $stmt->bindParam(':formacaoId', $formacaoId, PDO::PARAM_INT);
    $stmt->bindParam(':dataObtencao', $dataObtencao);
    $stmt->bindParam(':matriculaInstrutor', $matriculaInstrutor);
    return $stmt->execute();
}


function buscarFormacoesXInstrutor()
{
    $pdo = connectDatabase();

    if ($pdo === null) {
        throw new Exception('Conexão com o banco de dados não inicializada.');
    }

    $sql = "SELECT * FROM formacoesInstrutores
            JOIN instrutores ON formacoesInstrutores.idInstrutor = instrutores.idInstrutor
            JOIN formacoes_Adicionais ON formacoesInstrutores.idInstrutor = formacoes_Adicionais.idFormAdd";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function buscarFormacoesXInstrutores()
{
    $pdo = connectDatabase();

    if ($pdo === null) {
        throw new Exception('Conexão com o banco de dados não inicializada.');
    }

    $sql = "SELECT 
                f.idInstrutor,
                i.nomeInstrutor,
                f.idFormAdd,
                fa.nomeFormacao
            FROM formacoesInstrutores f
            JOIN instrutores i ON f.idInstrutor = i.idInstrutor
            JOIN formacoes_Adicionais fa ON f.idFormAdd = fa.idFormAdd
            ORDER BY f.idInstrutor, f.idFormAdd";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarInstrutorPorId($idInstrutor)
{
    $pdo = connectDatabase();

    try {
        $sql = "SELECT * FROM instrutores WHERE idInstrutor = :idInstrutor";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idInstrutor', $idInstrutor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao buscar o instrutor: " . $e->getMessage();
        return false;
    }
}

function buscarFormacoesPorInstrutorId($idInstrutor)
{
    $pdo = connectDatabase();

    try {
        $sql = "
            SELECT f.idFormAdd, f.nomeFormacao, fi.dataObtencao
            FROM formacoesInstrutores fi
            JOIN formacoes_adicionais f ON fi.idFormAdd = f.idFormAdd
            WHERE fi.idInstrutor = :idInstrutor
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idInstrutor', $idInstrutor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao buscar as formações do instrutor: " . $e->getMessage();
        return [];
    }
}

// Função para buscar uma formação por ID
function buscarFormacaoPorId_detalhes($idFormAdd)
{
    $pdo = connectDatabase();
    $stmt = $pdo->prepare("SELECT formacoes_adicionais.idFormAdd, formacoes_adicionais.nomeFormacao, formacoes_adicionais.cargaHoraria, formacoesInstrutores.dataObtencao  FROM formacoes_adicionais
inner join formacoesInstrutores on formacoesInstrutores.idFormAdd = formacoes_adicionais.idFormAdd WHERE formacoes_adicionais.idFormAdd =  :idFormAdd");

    $stmt->bindParam(':idFormAdd', $idFormAdd);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Função para atualizar uma formação
function atualizarFormacao($idFormAdd, $nomeFormacao, $dataObtencao, $cargaHoraria)
{
    $pdo = connectDatabase();

    // Atualiza a tabela formacoes_adicionais
    $stmt1 = $pdo->prepare("UPDATE formacoes_adicionais SET nomeFormacao = :nomeFormacao, cargaHoraria = :cargaHoraria WHERE idFormAdd = :idFormAdd");
    $stmt1->bindParam(':nomeFormacao', $nomeFormacao);
    $stmt1->bindParam(':cargaHoraria', $cargaHoraria);
    $stmt1->bindParam(':idFormAdd', $idFormAdd);
    $result1 = $stmt1->execute();

    // Atualiza a tabela formacoesInstrutores
    $stmt2 = $pdo->prepare("UPDATE formacoesInstrutores SET dataObtencao = :dataObtencao WHERE idFormAdd = :idFormAdd");
    $stmt2->bindParam(':dataObtencao', $dataObtencao);
    $stmt2->bindParam(':idFormAdd', $idFormAdd);
    $result2 = $stmt2->execute();

    // Retorna true se ambas as operações foram bem-sucedidas
    return $result1 && $result2;
}
?>