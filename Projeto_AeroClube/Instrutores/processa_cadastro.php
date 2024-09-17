<?php
require '../Functions/functions.php'; // Ajuste o caminho conforme necessário

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pdo = connectDatabase();

    // Receber os dados do formulário
    $nomeInstrutor = $_POST['nomeInstrutor'];
    $matriculaInstrutor = $_POST['matriculaInstrutor'];
    $breveInstrutor = $_POST['breveInstrutor'];
    $dtNasc = $_POST['dtNascInstrutor'];
    $enderecoInstrutor = $_POST['enderecoInstrutor'];
    $bairroInstrutor = $_POST['bairroInstrutor'];
    $cidadeInstrutor = $_POST['cidadeInstrutor'];
    $estadoInstrutor = $_POST['estadoInstrutor'];
    $foneInstrutor = $_POST['foneInstrutor'];

    // echo "$nomeInstrutor, $matriculaInstrutor, $breveInstrutor,
    //         $dtNasc, $enderecoInstrutor, $bairroInstrutor,
    //         $cidadeInstrutor, $estadoInstrutor, $foneInstrutor,
    //         $caminhoImagem";


    // Diretório onde a imagem será salva
    $diretorioImagem = '../Assets/images/';
    $imagemInstrutor = $_FILES['fotoInstrutor'];

    // Gera um nome único para a imagem
    $nomeImagem = uniqid() . '-' . basename($imagemInstrutor['name']); 
    $caminhoImagem = $diretorioImagem . $nomeImagem;

    // Verifica se o upload foi bem-sucedido
    if (move_uploaded_file($imagemInstrutor['tmp_name'], $caminhoImagem)) {
        // Preparar e executar a consulta SQL para inserir os dados
        $stmt = $pdo->prepare("
            INSERT INTO Instrutores (nomeInstrutor,matriculaInstrutor, breveInstrutor, dataNascInstrutor, enderecoInstrutor, bairroInstrutor, cidadeInstrutor, estadoInstrutor, foneInstrutor, fotoInstrutor) 
            VALUES (:nomeInstrutor,:matriculaInstrutor, :breveInstrutor, :dataNascInstrutor, :enderecoInstrutor, :bairroInstrutor, :cidadeInstrutor, :estadoInstrutor, :foneInstrutor, :fotoInstrutor)
        ");

        $stmt->execute([
            ':nomeInstrutor' => $nomeInstrutor,
            ':matriculaInstrutor' => $matriculaInstrutor,
            ':breveInstrutor' => $breveInstrutor,
            ':dataNascInstrutor' => $dtNasc,
            ':enderecoInstrutor' => $enderecoInstrutor,
            ':bairroInstrutor' => $bairroInstrutor,
            ':cidadeInstrutor' => $cidadeInstrutor,
            ':estadoInstrutor' => $estadoInstrutor,
            ':foneInstrutor' => $foneInstrutor,
            ':fotoInstrutor' => $caminhoImagem
        ]);

        // Redireciona para a página de cadastro com uma mensagem de sucesso
        $idInstrutor = $pdo->lastInsertId();
        header("Location: create.php?id=$idInstrutor&message=Instrutor cadastrado com sucesso!");
        exit();
    } else {
        // Redireciona para a página de cadastro com uma mensagem de erro
        header("Location: create.php?message=Erro ao fazer upload da imagem.");
        exit();
    }
}
?>
