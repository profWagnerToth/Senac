<?php 
    class Controller{
        //Método para carregar o modelo
        public function models($model){
            //Requerer o arquivo do modelo
            require_once '../app/Models/'.$model.'.php';
            //Retorna uma nova instancia do modelo
            return new $model();
        }

        //Método para carrega a view
        public function view($view, $data=[]){
            //Requer o arquivo da view
            require_once '../app/Views/'.$view.'.php';
        }
    }
?>