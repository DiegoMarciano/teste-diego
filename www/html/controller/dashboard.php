<?php

/**
 * Controller do dashboard
 */

require_once $_SERVER["DOCUMENT_ROOT"] . "/inc/pdo.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/model/service.php";

$service = new Service($PDO);

/*
 * Filtros
 */

$description = $_GET["description"] ?? "";
$startDate = $_GET["start_date"] ?? "";
$endDate = $_GET["end_date"] ?? "";

/*
 * Serviço finalizado
 */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $serviceId = $_POST["service_id"] ?? null;

    if ($serviceId) {

        $service->finishService(
            (int) $serviceId,
            (int) $_SESSION["user_id"]
        );

        header("Location: /dashboard.php");
        exit;
    }
}

/*
 * Busca os serviços do usuário
 */

$services = $service->getServicesByUser(
    (int) $_SESSION["user_id"],
    $description,
    $startDate,
    $endDate
);

/*
 * Carrega a View
 */

require_once $_SERVER["DOCUMENT_ROOT"] . "/view/dashboard.php";
