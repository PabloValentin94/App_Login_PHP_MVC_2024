<?php

    namespace App\DAO;
    
    use App\Model\CargoModel;

    class CargoDAO extends DAO
    {

        public function __construct()
        {

            parent::__construct();
            
        }

        public function Insert(CargoModel $model) : void
        {

            $sql = "INSERT INTO Cargo(nome) VALUES(?)";

            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(1, $model->GET_Nome());

            $stmt->execute();

        }

        public function Update(CargoModel $model) : void
        {

            $sql = "UPDATE Cargo SET nome = ? WHERE id = ?";

            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(1, $model->GET_Nome());

            $stmt->bindValue(2, $model->GET_ID());

            $stmt->execute();

        }

        public function Select() : array
        {

            $sql = "SELECT * FROM Cargo ORDER BY id ASC";

            $stmt = $this->connection->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(DAO::FETCH_CLASS, "App\Model\CargoModel");

        }

        public function Search(int $id) : object | false
        {

            $sql = "SELECT * FROM Cargo WHERE id = ? ORDER BY id ASC";

            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(1, $id);

            $stmt->execute();

            return $stmt->fetchObject("App\Model\CargoModel");

        }

        public function FindRepetition(string $nome) : object | false
        {

            $sql = "SELECT * FROM Cargo WHERE nome = ? ORDER BY id ASC";

            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(1, $nome);

            $stmt->execute();

            return $stmt->fetchObject("App\Model\CargoModel");

        }
        
    }

?>