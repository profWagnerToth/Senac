<?php // index.php
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];

    require_once "app/controllers/{$controller}.php";
    $controllerObject = new $controller();
    $controllerObject->$action();
} else {
    // Página inicial ou redirecionamento para outra ação
    echo "Página inicial da academia";
}
?>