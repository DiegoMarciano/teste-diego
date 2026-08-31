<?php

/**
 * Controller da página inicial (login)
 */

$result = [];

require_once $_SERVER["DOCUMENT_ROOT"] . "/inc/pdo.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/model/user.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";

    if (empty($email) || empty($password)) {

        $result[] = "Todos os campos são obrigatórios.";
    } else {

        $user = new User($PDO);

        $loggedUser = $user->login($email, $password);

        if ($loggedUser === false) {

            $result[] = "Email ou senha inválidos";
        } else {

            session_regenerate_id(true);

            $_SESSION["user_id"] = $loggedUser["id_user"];
            $_SESSION["user_name"] = $loggedUser["name"];
            $_SESSION["user_email"] = $loggedUser["email"];

            header("Location: /dashboard.php");
            exit;
        }
    }
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/view/index.php";
