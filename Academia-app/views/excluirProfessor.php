<?php
include_once '../models/Professor.php';
include_once '../includes/header.php';

if (isset($_GET['id'])) {
    $professor = new Professor();
    $professor->excluirProfessor($_GET['id']);
}
include_once '../includes/footer.php';
?>

