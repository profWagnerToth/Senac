<?php 
    class Conexao{
       private $host="locahost";
       private $db_name="academia";
       private $username='root';
       private $password='';
       public $conectar;

       public function novaConexao(){
        $this->conectar=null;
        try{
            $this->conectar=new PDO("mysql:host=".$this->host.";dbname=".$this->db_name, $this->username, $this->password);
        }catch (PDOException $exception){
            echo 'Connection error: '.$exception->getMessage();
        }
        return $this->conectar;
     }
    }
?>