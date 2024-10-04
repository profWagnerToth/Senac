<?php 
    include ('../includes/header.php');
    include ('../models/aluno.php');    
    $aluno = new Aluno();
    $alunos = $aluno->listarAlunos();
 ?>
<div class="container mt-5">
    <h2>Lista de Alunos</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">Data Nascimento</th>
                <th scope="col">Genero</th>
                <th scope="col">Data Cadastro</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alunos as $aluno): ?>
                <tr>
                    <th scope="row"><?php echo $aluno['id']; ?></th>
                    <td><?php echo $aluno['nome']; ?></td>
                    <td><?php echo $aluno['email']; ?></td>
                    <td><?php echo $aluno['telefone']; ?></td>
                    <td><?php echo $aluno['data_nascimento']; ?></td>
                    <td><?php echo $aluno['genero']; ?></td>
                    <td><?php echo $aluno['data_cadastro']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include('../includes/footer.php'); ?>
