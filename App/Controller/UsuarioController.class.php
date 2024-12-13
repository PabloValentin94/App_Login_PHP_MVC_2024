<?php

    namespace App\Controller;

    use App\Model\
    {

        UsuarioModel,
        CargoModel

    };

    class UsuarioController extends Controller
    {

        public static function Form(string $form = "Login") : void
        {

            if($form === "Login")
            {

                parent::Render("Usuario/$form", null);

            }

            else
            {

                $cargos = new CargoModel();

                $cargos->List();

                parent::Render("Usuario/$form", $cargos->data);

            }

        }

        public static function Save() : void
        {

            if($_POST["senha"] === $_POST["confirmacao_senha"])
            {

                $model = new UsuarioModel(
                    (int) $_POST["id"],
                    $_POST["nome"],
                    $_POST["email"],
                    password_hash($_POST["senha"], PASSWORD_DEFAULT),
                    (int) $_POST["fk_cargo"]
                );
    
                if($model->Save())
                {

                    parent::Redirect("/");

                }
    
                else
                {

                    parent::Alert("O e-mail informado já está em uso!", "/cadastro");

                }

            }

            else
            {

                parent::Alert("As senhas passadas não são idênticas! Corrija-as e tente novamente.", "/cadastro");

            }

        }

        public static function Login() : void
        {

            $model = new UsuarioModel();

            if($model->Login($_POST["email"], $_POST["senha"]))
            {

                $_SESSION["usuario"]["id"] = $model->data->GET_ID();

                $_SESSION["usuario"]["nome"] = $model->data->GET_Nome();

                $_SESSION["usuario"]["email"] = $model->data->GET_Email();

                $_SESSION["usuario"]["fk_cargo"] = $model->data->GET_FK_Cargo();

                parent::Redirect("/");

            }

            else
            {

                parent::Alert("Dados incorretos! Verifique se já possui um cadastro e tente novamente.", "/login");

            }

        }

        public function Verify() : void
        {

            exit(var_dump($_SESSION));

        }

        public static function Logout() : void
        {

            $_SESSION = array();

            session_destroy();

            parent::Redirect("/");

        }

    }

?>