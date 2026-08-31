<?php

/**
 * Controller da página de cadastro de usuário
 */

$result = [];

require_once $_SERVER["DOCUMENT_ROOT"] . "/inc/pdo.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/model/user.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";
    $name = $_POST["name"] ?? "";

    /*
     * Verifica se os campos estão vazios
     */

    if (empty($email) || empty($password) || empty($name)) {

        $result[] = "Todos os campos são obrigatórios.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $result[] = "O e-mail é inválido.";
    } else {

        $user = new User($PDO);

        /*
         * Verifica se o email já está cadastrado
         */

        if ($user->isEmailRegistered($email)) {

            $result[] = "O e-mail já está cadastrado.";
        } else {

            /*
             * Cadastra o usuário
             */

            if ($user->registerUser($name, $email, $password)) {

                $result[] = "Usuário cadastrado com sucesso.";
            } else {

                $result[] = "Não foi possível cadastrar o usuário.";
            }
        }
    }
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/view/signup.php";
