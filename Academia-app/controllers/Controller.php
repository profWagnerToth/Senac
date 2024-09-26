<?php
class Controller {
    // Carrega um modelo
    protected function model($model) {
        // Inclui o arquivo do modelo
        require_once '../models/' . $model . '.php'; // Ajuste o caminho conforme necessário

        // Instancia e retorna o modelo
        return new $model();
    }

    // Carrega uma view
    protected function view($view, $data = []) {
        // Verifica se a view existe
        if (file_exists('../views/' . $view . '.php')) {
            // Extrai dados para a view
            if (!empty($data)) {
                extract($data);
            }
            // Inclui o arquivo da view
            require_once '../views/' . $view . '.php'; // Ajuste o caminho conforme necessário
        } else {
            // Se a view não existir, exibe um erro ou redireciona
            die("A view $view não existe.");
        }
    }
}
?>
