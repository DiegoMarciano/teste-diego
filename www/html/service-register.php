<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: /");
    exit;
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/service-register.php";
