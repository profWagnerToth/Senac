<?php
// app.php

class App {
    public function run() {
        // Captura a URL
        $url = isset($_GET['url']) ? $_GET['url'] : '';
        $url = explode('/', $url);

        // Se não houver URL, redirecionar para a página inicial
        if (empty($url[0])) {
            require_once 'views/home/index.php';
            return;
        }

        // Definindo o controlador e a ação
        $controllerName = ucfirst($url[0]) . 'Controller';
        $action = isset($url[1]) ? $url[1] : 'index';

        // Incluindo o controlador
        if (file_exists("controllers/$controllerName.php")) {
            require_once "controllers/$controllerName.php";
            $controller = new $controllerName();

            // Verifique se a ação existe no controlador
            if (method_exists($controller, $action)) {
                $controller->$action();
            } else {
                echo "Ação não encontrada!";
            }
        } else {
            echo "Controlador não encontrado!";
        }
    }
}
