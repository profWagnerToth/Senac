<?php 
include '../../includes/header.php';
?>
<div class="container mt-5">
    <h2>Cadastro de Professor</h2>
    <form action="../../controllers/ProfessorController.php?action=cadastrar" method="POST">
        <div class="mb-3">
            <label for="nome" class="'form-label">Nome:</label>
            <input type="text" class="'form-control" id="nome" name="nome" required>
        </div>    
        
        <div class="mb-3">
            <label for="email" class="'form-label">Email:</label>
            <input type="email" class="'form-control" id="email" name="email" required>
        </div>    
        
        <div class="mb-3">
            <label for="telefone" class="'form-label">Telefone:</label>
            <input type="text" class="'form-control" id="telefone" name="telefone" required>
        </div>    

        
        <div class="mb-3">
            <label for="especialidade" class="'form-label">Especialidade:</label>
            <input type="text" class="'form-control" id="especialidade" name="especialidade" required>
        </div>  
        <button class="btn btn-primary" type="submit">Cadastrar</button>  
    </form>
    <?php include('../../includes/footer.php')?>
</div>