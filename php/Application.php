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

    //books list
    protected function getResultList($sql)
    {
        $resultList = array();
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultList[] = $row;
            }
        } else {
            $this->writeLog("nem talált értéket a lekérdezés", $sql);
        }

        return $resultList;
    }

    protected function writeLog($string, $sql)
    {
    }

    //id validation
    protected function isValidId($id)
    {
        if (is_int($id) && $id > 0) {
            return true;
        } else {
            return false;
        }
    }
}
