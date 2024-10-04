<?php
include('../../includes/header.php');
?>
<div class="container mt-5">
    <h2>Lista de Alunos</h2>
    <table class="table">
        <thead>
            <tr>
                <td scope="col">ID</td>
                <td scope="col">Nome</td>
                <td scope="col">Email</td>
                <td scope="col">Telefone</td>
                <td scope="col">Data Nascimento</td>
                <td scope="col">Gênero</td>
                <td scope="col">Data Cadastro</td>
            </tr>
        </thead>
        <tbody>          
            
                <?php foreach ($alunos as $aluno): ?>
                    <tr>
                        <td><?php echo $aluno['id']; ?></td>
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
<?php include('../../includes/footer.php'); ?>
