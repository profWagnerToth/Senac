<?php
#Este arquivo será responsável por lidar com os dados dos usuários.

class User{
    //Simulando a obtenção de dados do usuário
    Public function getUsers(){
        //Em um caso real, você teria a conexão com o banco de dados
        return [
            ['id'=>1,'name'=>'João', 'email'=>'joao@email.com'],
            ['id' =>2,'name'=>'Maria', 'email'=>'maria@email.com']
        ];
    }
}
?>