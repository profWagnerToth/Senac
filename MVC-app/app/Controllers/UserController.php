<?php 
# Este é o controlador responsável por interagir com o modelo de usuários e exibir as views relacionadas.

class UserController extends Controller{
    //Método padrão que será chamado na rota/users
    public function index(){
        //Carregar o modelo de usuários
        $userModel = $this->models('User');
        //Obtem a lista de usuarios do modelo
        $users=$userModel->getUsers();
        //Carrega a view 'users' passando os dados dos usuarios
        $this->view('userView',['users'=>$users]);
    }
}
?>