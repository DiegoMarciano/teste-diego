<?php

/**
 * Arquivo de conexão ao banco de dados
 * 2026-08-27
 * Diego Perez Marciano
 */

require_once $_SERVER["DOCUMENT_ROOT"] . "/inc/env.php";

try {
    // Abre conexão com DB via PDO
    $PDO = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USER, DB_PSWD);

    // Configura o PDO para lançar exceções em caso de erro
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Verifica conexão
    echo "Erro na conexão: " . $e->getMessage();
}
