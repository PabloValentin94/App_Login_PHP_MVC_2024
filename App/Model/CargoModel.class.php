<?php

    namespace App\Model;

    use App\DAO\CargoDAO;

    class CargoModel extends Model
    {

        private $id, $nome;

        public function __construct(int $id = 0, string $nome = "")
        {

            if(empty($this->id))
            {

                $this->id = $id;

                $this->nome = $nome;

            }
            
        }

        public function Save() : void
        {

            $dao = new CargoDAO();

            ($this->id === 0) ? $dao->Insert($this) : $dao->Update($this);

        }

        public function List(?int $id = null) : void
        {

            $dao = new CargoDAO();

            $this->data = ($id === null) ? $dao->Select() : $dao->Search($id);

            if($id !== null && $this->data === false)
            {

                $this->data = new CargoModel();

            }

        }

        // GET.

        public function GET_ID() : int { return $this->id; }

        public function GET_Nome() : string { return $this->nome; }

    }

?>