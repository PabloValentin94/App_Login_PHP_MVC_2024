<?php

    namespace App\Controller;

    use App\Model\CargoModel;

    class CargoController extends Controller
    {

        public static function Form() : void
        {

            $model = new CargoModel();

            if(isset($_GET["id"]))
            {

                $model->List((int) $_GET["id"]);

                $model = $model->data;

            }

            parent::Render("Cargo/Form", $model);

        }

        public static function Save() : void
        {

            $model = new CargoModel(
                (int) $_POST["id"],
                $_POST["nome"]
            );

            if($model->Save())
            {

                parent::Redirect("/cargo/listagem");

            }

            else
            {

                parent::Alert("O nome informado já existe!", "/cargo");

            }

        }

        public function List() : void
        {

            $model = new CargoModel();

            $model->List();

            parent::Render("Cargo/Listagem", $model->data);

        }

    }

?>