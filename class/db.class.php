
<?php
class DbConnection {
    /*private $servername = "mysql.laplazainmobiliaria.com";
    *private $username = "dblaplaza";
    *private $password = "4739Eerr";
    *private $dbName = "laplazainmobiliaria";
    */
    
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbName = "plaza";

    public $connection;

    function __construct(){
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbName", $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connection success!";
            $this->connection = $conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

?>