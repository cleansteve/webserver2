<?php
class DB {

    public const SERVER = "webserver-db-1";
    public const DB = "test";
    public const USER_NAME = "root";
    public const PASSWORD = "test";

    private string $table;
    public ?PDO $connection = null;

    public function __construct(string $table) {
        $this->connection = new PDO(
            "mysql:host=".self::SERVER.";dbname=".self::DB, 
            self::USER_NAME, 
            self::PASSWORD
        );
        $this->table = $table;
        // set the PDO error mode to exception
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function select(int $limit = 50) {
        $sql = "SELECT * FROM ".self::DB.".".$this->table." LIMIT " . $limit .";";
        $result = $this->connection->query($sql);
        
        if ($result->rowCount() > 0) {
            // output data of each row
            /*
            var_dump($result->fetch(PDO::FETCH_ASSOC));
            var_dump($result->fetch(PDO::FETCH_ASSOC));
            var_dump($result->fetch(PDO::FETCH_ASSOC));
            var_dump($result->fetch(PDO::FETCH_ASSOC));
            die();
            */
            $rows = [];
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $row;
                // array_push($rows, $row);
            }
            return $rows;
        } else {
            return [];
        }
    }
    public function insert(array $data) {
        //prepare the MySQL INSERT statement with placeholders for columns
        foreach($data AS $itemKey => $item){
            $header = [];
            $values = [];
            foreach($item AS $columnName => $value){
                $header[] = $columnName;               
            }
            $headerAsString = implode(",", $header);
            $valuesAsStringInPlaceholder = ":" . implode(",:", $header);

            $sql = "INSERT INTO ".self::DB.".".$this->table."(". $headerAsString .") VALUES (" . $valuesAsStringInPlaceholder . ");";
            
            $statement = $this->connection->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $statement->execute($item);

        }
    }
}

//problem, how to escape and wrap values in quotes so the format is accepted by MySQL???