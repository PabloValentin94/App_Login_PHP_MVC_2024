<?php

    namespace App\DAO;

    use PDO;

    use Exception;
    use PDOException;

    abstract class DAO extends PDO
    {

        protected $connection = null;

        public function __construct()
        {

            try
            {

                $dsn = "mysql:host=" . $_ENV["database"]["host"] . ";dbname=" . $_ENV["database"]["db_name"];

                $user = $_ENV["database"]["user"];

                $password = $_ENV["database"]["password"];

                $options = [
        
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"

                ];

                $this->connection = new PDO($dsn, $user, $password, $options);

            }

            catch(PDOException $ex)
            {

                $this->Error($ex);

            }
            
        }

        private function Error(PDOException $ex) : void
        {

            throw new Exception($ex->getMessage(), $ex->getCode(), $ex);

        }

    }

?>