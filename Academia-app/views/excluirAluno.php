<?php
include_once '../models/Aluno.php';
include_once '../includes/header.php';

if (isset($_GET['id'])) {
    $aluno = new Aluno();
    $aluno->excluirAluno($_GET['id']);
}
include_once '../includes/footer.php';
?>

