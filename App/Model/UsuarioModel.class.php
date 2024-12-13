<?php

    namespace App\Model;

    use App\DAO\
    {

        UsuarioDAO,
        CargoDAO

    };

    class UsuarioModel extends Model
    {

        private $id, $nome, $email, $senha, $fk_cargo;

        private $cargo;

        public function __construct(int $id = 0, string $nome = "", string $email = "", string $senha = "", int $fk_cargo = 0)
        {

            if(empty($this->id))
            {

                $this->id = $id;

                $this->nome = $nome;

                $this->email = $email;

                $this->senha = $senha;

                $this->fk_cargo = $fk_cargo;

            }

            else
            {

                $this->cargo = (new CargoDAO())->Search($this->fk_cargo);

            }
            
        }

        public function Save() : bool
        {

            $dao = new UsuarioDAO();

            if($dao->FindRepetition($this->email) === false)
            {

                ($this->id === 0) ? $dao->Insert($this) : $dao->Update($this);

                return true;
                
            }

            else
            {

                return false;

            }

        }

        public function List(?int $id = null) : void
        {

            $dao = new UsuarioDAO();

            $this->data = ($id === null) ? $dao->Select() : $dao->Search($id);

            if($id !== null && $this->data === false)
            {

                $this->data = new UsuarioModel();

            }

        }

        public function Login(string $email, string $senha) : bool
        {

            $this->data = (new UsuarioDAO())->Login($email);

            return (gettype($this->data) === "object" && password_verify($senha, $this->data->GET_Senha()));

        }

        // GET.

        public function GET_ID() : int { return $this->id; }

        public function GET_Nome() : string { return $this->nome; }

        public function GET_Email() : string { return $this->email; }

        public function GET_Senha() : string { return $this->senha; }

        public function GET_FK_Cargo() : int { return $this->fk_cargo; }

        public function GET_Cargo() : CargoModel { return $this->cargo; }

    }

?>