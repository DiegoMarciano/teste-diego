<?php

/**
 * Controller da página de cadastro de serviço
 */

$result = [];

require_once $_SERVER["DOCUMENT_ROOT"] . "/inc/pdo.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/model/service.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $description = $_POST["description"] ?? "";
    $price = $_POST["price"] ?? "";

    if (empty($description) || empty($price)) {

        $result[] = "Todos os campos são obrigatórios.";
    } elseif (!is_numeric($price)) {

        $result[] = "O preço informado é inválido.";
    } else {

        $service = new Service($PDO);

        $registered = $service->registerService(
            $description,
            (float) $price,
            (int) $_SESSION["user_id"]
        );

        if ($registered) {

            header("Location: /dashboard.php");
            exit;
        } else {

            $result[] = "Não foi possível cadastrar o serviço.";
        }
    }
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/view/service-register.php";
