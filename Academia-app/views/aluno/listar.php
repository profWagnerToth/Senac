<?php include ('../../includes/header.php');?>
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
                <td scope="col">Genero</td>
                <td scope="col">Data Cadastro</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($alunos as $aluno):?>
                <tr>
                    <th scope="row"><?php echo $aluno['id'];?></th>
                    <th scope="row"><?php echo $aluno['nome'];?></th>
                    <th scope="row"><?php echo $aluno['email'];?></th>
                    <th scope="row"><?php echo $aluno['telefone'];?></th>
                    <th scope="row"><?php echo $aluno['data_nascimento'];?></th>
                    <th scope="row"><?php echo $aluno['genero'];?></th>
                    <th scope="row"><?php echo $aluno['data_cadastro'];?></th>
                </tr>
                <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php include('../../includes/footer.php')?>