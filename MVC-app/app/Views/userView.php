<!-- Este arquivo será responsável por exibir a lista de usuarios.-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Lista de Usuários</h1>
    <!-- Exibir os usuários -->
     <ul>
        <?php foreach ($data['users'] as $user): ?>
            <li><?= htmlspecialchars($user['nome'])?> <?= htmlspecialchars($user['email']) ?></li>
        <?php endforeach;?>
     </ul>
</body>
</html>