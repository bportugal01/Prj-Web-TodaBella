<html>
    <head>        
        <meta charset = "UTF-8">
        <title> conectar </title>
    </head>	    
    <body>

    <?php


    class Conexao extends PDO {
        private static $instancia;
        private $query;
        private $host = "127.0.0.1"; // endereço do servidor
        private $usuario = "root"; // nome do usuário do banco de dados
        private $senha = ""; // senha do banco de dados
        private $db = "BdBeleza"; // nome do banco de dados
    
        public function __construct() {
            parent::__construct("mysql:host=$this->host;dbname=$this->db", $this->usuario, $this->senha);
        }
    
        public static function getInstance() {
            if (!isset(self::$instancia)) {
                try {
                    self::$instancia = new Conexao();
                    echo ' ';
                } catch (Exception $e) {
                    echo 'Erro ao conectar';
                    exit();
                }
            }
            return self::$instancia;
        }
    
        public function executarQuery($query) {
            $stmt = $this->prepare($query);
            $stmt->execute();
        }
    }
    
    ?>
    
    </body>
</html>