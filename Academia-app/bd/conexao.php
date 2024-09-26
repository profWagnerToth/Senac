<?php 
class Conexao {
    private static $instance;

    public static function novaConexao() {
        if (!isset(self::$instance)) {
            try {
                // Conexão com charset UTF-8 para suporte a acentos
                self::$instance = new PDO('mysql:host=localhost;dbname=academia;charset=utf8', 'root', '');
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // Exibe uma mensagem de erro e finaliza a execução em caso de falha na conexão
                die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
            }
        }
        return self::$instance;
    }
}
?>
