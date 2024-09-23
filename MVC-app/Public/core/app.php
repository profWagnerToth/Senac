<?php
class App {
    // Definir controlador e método padrão
    protected $controller = 'UserController'; // Corrigi para 'UserController'
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        // Obtém a URL e a transforma em um array
        $url = $this->parseUrl();

        // Verifica se o controlador existe no diretório de Controladores
        if (isset($url[0]) && file_exists('../app/Controllers/' . $url[0] . '.php')) {
            // Define o controlador a partir da URL
            $this->controller = $url[0];
            // Remove o primeiro elemento do array (controlador) para continuar o processamento
            unset($url[0]);
        }

        // Requer o arquivo do controlador
        require_once '../app/Controllers/' . $this->controller . '.php';

        // Instancia o controlador
        $this->controller = new $this->controller;

        // Verifica se existe um método (ação) no controlador a ser chamado
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                // Define o método (ação) a ser chamado
                $this->method = $url[1];
                // Remove o segundo elemento do array (método)
                unset($url[1]);
            }
        }

        // Define os parâmetros restantes como parâmetros para o método
        $this->params = $url ? array_values($url) : [];

        // Chama o método do controlador com os parâmetros
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // Função para quebrar a URL em partes (Controlador, Método e Parâmetro)
    public function parseUrl() {
        if (isset($_GET['url'])) {
            // Remove barras extras e sanitiza a URL
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [];
    }
}
?>
