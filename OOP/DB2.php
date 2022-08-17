<?php
class DB2
{

    public const SERVER = "webserver-db-1";
    public const DB = "test";
    public const USER_NAME = "root";
    public const PASSWORD = "test";

    private string $table;
    private ?PDO $connection = null;

    public function __construct(string $table)
    {
        $this->connection = new PDO(
            "mysql:host=" . self::SERVER . ";dbname=" . self::DB,
            self::USER_NAME,
            self::PASSWORD
        );
        $this->table = $table;
        // set the PDO error mode to exception
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    

    public function select(int $limit = 50)
    {
        $sql = "SELECT * FROM " . self::DB . "." . $this->table . " LIMIT " . $limit . ";";
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
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $row;
                // array_push($rows, $row);
            }
            return $rows;
        } else {
            return [];
        }
    }

    //good article on INSERT INTO using prepare, NOT class-based... https://www.phptutorial.net/php-pdo/php-pdo-insert/

    public function insert(array $data)
    {
        foreach ($data as $itemKey => $item) {
            $header = [];
            $values = [];
            foreach ($item as $columnName => $value) {
                $header[] = $columnName;
                $headerParams[] = ":" . $columnName;

                if ($value === null) {
                    $values[] = "NULL";
                } else {
                    $values[] = '"' . $value . '"'; //"'" . $value . "'"; //PDO::quote($value);
                    /* Nice internet people say prepare() statements + execute() are the only sensible method and anything else is an ugly hack.
                    https://stackoverflow.com/questions/39611859/how-to-escape-a-string-to-insert-into-mysql-via-pdo-without-using-prepared-sta
                    
                    W3Schools explains PDO prepare() and execute() https://www.w3schools.com/php/php_mysql_prepared_statements.asp#:~:text=Prepared%20Statements%20in%20PDO
                    */
                }
            }
            $headerAsString = implode(",", $header);
            $headerParamsAsString = implode(",", $headerParams);
            $valuesAsString = implode(",", $values);

            $sql = "INSERT INTO " . self::DB . "." . $this->table . "(" . $headerAsString . ") VALUES (" . $headerParamsAsString . ");";
        }
    }
}

//problem, how to escape and wrap values in quotes so the format is accepted by MySQL???