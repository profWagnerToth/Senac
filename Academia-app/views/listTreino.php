<?php 
include('../includes/header.php');
include('../models/treino.php');    
$treino = new Treino();
$treinos = $treino->listarTreinos();
?>

<div class="container mt-5">
    <h2>Lista de Treinos</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID Treino</th>
                <th scope="col">Descrição do Treino</th>
                <th scope="col">ID Aluno</th>
                <th scope="col">ID Professor</th>                
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($treinos as $treino): ?>
                <tr>
                    <th scope="row"><?php echo $treino['id']; ?></th>                    
                    <td><?php echo $treino['descricao']; ?></td>
                    <td><?php echo $treino['aluno_id']; ?></td>
                    <td><?php echo $treino['professor_id']; ?></td>                    
                    <td>
                        <a href="editarTreino.php?id=<?php echo $treino['id']; ?>" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include('../includes/footer.php'); ?>
