<?php 
    include ('../includes/header.php');
    include ('../models/professor.php');    
    $Professor = new Professor();
    $Professores = $Professor->listarProfessores();
 ?>
<div class="container mt-5">
    <h2>Lista de Professores</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">Especialidade</th>               
                <th scope="col">Data Contratação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Professores as $Professor): ?>
                <tr>
                    <th scope="row"><?php echo $Professor['id']; ?></th>
                    <td><?php echo $Professor['nome']; ?></td>
                    <td><?php echo $Professor['email']; ?></td>
                    <td><?php echo $Professor['telefone']; ?></td>
                    <td><?php echo $Professor['especialidade']; ?></td>                    
                    <td><?php echo $Professor['data_contratacao']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include('../includes/footer.php'); ?>
