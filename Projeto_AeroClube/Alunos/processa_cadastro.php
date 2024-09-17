<?php
require '../Functions/functions.php'; // Ajuste o caminho conforme necessário

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pdo = connectDatabase();

    // Receber os dados do formulário
    $nomeAluno = $_POST['nomeAluno'];
    $dtNasc = $_POST['dtNasc'];
    $enderecoAluno = $_POST['enderecoAluno'];
    $bairroAluno = $_POST['bairroAluno'];
    $cidadeAluno = $_POST['cidadeAluno'];
    $estadoAluno = $_POST['estadoAluno'];
    $foneAluno = $_POST['foneAluno'];

    // Diretório onde a imagem será salva
    $diretorioImagem = '../Assets/images/';
    $imagemAluno = $_FILES['fotoAluno'];

    // Gera um nome único para a imagem
    $nomeImagem = uniqid() . '-' . basename($imagemAluno['name']); 
    $caminhoImagem = $diretorioImagem . $nomeImagem;

    // Verifica se o upload foi bem-sucedido
    if (move_uploaded_file($imagemAluno['tmp_name'], $caminhoImagem)) {
        // Preparar e executar a consulta SQL para inserir os dados
        $stmt = $pdo->prepare("
            INSERT INTO alunos (nomeAluno, dtNasc, enderecoAluno, bairroAluno, cidadeAluno, estadoAluno, foneAluno, fotoAluno) 
            VALUES (:nomeAluno, :dtNasc, :enderecoAluno, :bairroAluno, :cidadeAluno, :estadoAluno, :foneAluno, :fotoAluno)
        ");

        $stmt->execute([
            ':nomeAluno' => $nomeAluno,
            ':dtNasc' => $dtNasc,
            ':enderecoAluno' => $enderecoAluno,
            ':bairroAluno' => $bairroAluno,
            ':cidadeAluno' => $cidadeAluno,
            ':estadoAluno' => $estadoAluno,
            ':foneAluno' => $foneAluno,
            ':fotoAluno' => $caminhoImagem
        ]);

        // Redireciona para a página de cadastro com uma mensagem de sucesso
        $idAluno = $pdo->lastInsertId();
        header("Location: create.php?id=$idAluno&message=Aluno cadastrado com sucesso!");
        exit();
    } else {
        // Redireciona para a página de cadastro com uma mensagem de erro
        header("Location: create.php?message=Erro ao fazer upload da imagem.");
        exit();
    }
}
?>
