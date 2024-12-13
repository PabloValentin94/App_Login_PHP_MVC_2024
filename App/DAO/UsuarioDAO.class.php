<?php

    namespace App\DAO;
    
    use App\Model\UsuarioModel;

    class UsuarioDAO extends DAO
    {

        public function __construct()
        {

            parent::__construct();
            
        }

        public function Insert(UsuarioModel $model) : void
        {

            $sql = "INSERT INTO Usuario(nome, email, senha, fk_cargo) VALUES(?, ?, ?, ?)";

            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(1, $model->GET_Nome());

            $stmt->bindValue(2, $model->GET_Email());

            $stmt->bindValue(3, $model->GET_Senha());

            $stmt->bindValue(4, $model->GET_FK_Cargo());

            $stmt->execute();

        }

        public function Update(UsuarioModel $model) : void
        {

            $sql = "UPDATE Usuario SET nome = ?, email = ?, senha = ?, fk_cargo = ? WHERE id = ?";

            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(1, $model->GET_Nome());

            $stmt->bindValue(2, $model->GET_Email());

            $stmt->bindValue(3, $model->GET_Senha());

            $stmt->bindValue(4, $model->GET_FK_Cargo());

            $stmt->bindValue(5, $model->GET_ID());

            $stmt->execute();

        }

        public function Select() : array
        {

            $sql = "SELECT * FROM Usuario ORDER BY id ASC";

            $stmt = $this->connection->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(DAO::FETCH_CLASS, "App\Model\UsuarioModel");

        }

        public function Search(int $id) : object | false
        {

            $sql = "SELECT * FROM Usuario WHERE id = ? ORDER BY id ASC";

            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(1, $id);

            $stmt->execute();

            return $stmt->fetchObject("App\Model\UsuarioModel");

        }

        public function FindRepetition(string $email) : object | false
        {

            $sql = "SELECT * FROM Usuario WHERE email = ? ORDER BY id ASC";

            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(1, $email);

            $stmt->execute();

            return $stmt->fetchObject("App\Model\UsuarioModel");

        }

        public function Login(string $email) : object | false
        {

            $sql = "SELECT * FROM Usuario WHERE email = ? ORDER BY id ASC";

            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(1, $email);

            $stmt->execute();

            return $stmt->fetchObject("App\Model\UsuarioModel");

        }
        
    }

?>