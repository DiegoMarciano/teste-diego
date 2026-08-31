<?php

/**
 * Rota de logout
 * Limpa a sessão se existir e redireciona para a rota inicial
 */

session_start();

$_SESSION = [];

session_destroy();

header("Location: /");

exit;
