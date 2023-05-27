<?
include_once('debug.php');

class Application
{

    //db connection
    private $dbParams = array(
        "servername" => '',
        "username" => '',
        "password" => '',
        "dbname" => ''

    );

    private $connection;
    private $connectionLive = false;

    public function __construct()
    {
        $this->connectDb();
    }

    private function connectDb()
    {
        $this->connection = new mysqli($this->dbParams['servername'], $this->dbParams['username'], $this->dbParams['password'], $this->dbParams['dbname']);

        if ($this->connection->connect_error) {
            die("Connection failed:" . $this->connection->connect_error);
        }
        $this->connectionLive = true;
    }

    protected function isDbConnectionLive()
    {
        return $this->connectionLive;
    }

    
}
