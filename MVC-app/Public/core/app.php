<?php
class App{
    //Definir controlador e método padrão
    protected $controller = 'UserControler';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        //Obtem a URL e a transforma em um array

        $url = $this->parseUrl();

        //Verifica se o controlador existe no diretório de Controladores

        if(file_exists('../app/Controllers/'.$url[0].'.php')){
            //Remove o primeiro elemento do array (controlador)para continuar o processando
            unset($user[0]);
        }
        //Requerer o arquivo controlador
        require_once '../app/Controllers/'.$this->controller.'.php';
        #INSTANCIANDO O CONTROLLER
        $this->controller = new $this->controller;

        //Verifica se o controlador existe no ditório de Controladores

        if(file_exists('../app/Controllers/'.$url[0].'.php')){
            //Define o controlador a partir da URL
            $this->controller=$url[0];
            //Remove o primeiro elemento do ARRAY (controlador)para continuar processando
            unset($url[0]);
        }

        # Requer o arquivo do controlador
        require_once '../app/controllers/'.$this->controller.'.php';
        #Instancia o controlador
        $this->controller = new $this_controller;

        #Verifica se existe um método (ação) no controlado a ser chamado
        
    }

}
?>