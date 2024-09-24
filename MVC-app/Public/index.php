<?php
#Arquivo principal que inicia o aplicativo.Ele deve estar na pasta Public

//Incluir os arquivos principais da aplicação
require_once '../app/Core/App.php';
require_once '../app/Core/Controller.php';

//Inicia a aplicação
$app = new App();
?> 