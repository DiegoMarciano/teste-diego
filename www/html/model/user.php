<?php

/**
 * Classe User
 * 2026-08-27
 * Diego Perez Marciano
 */

class User
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function isEmailRegistered(string $email)
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $emailExists = $stmt->fetchColumn() > 0;
        return $emailExists;
    }

    public function registerUser(string $name, string $email, string $password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hash);
        return $stmt->execute();
    }

    public function login(string $email, string $password)
    {
        $stmt = $this->pdo->prepare("SELECT id_user, name, email, password
        FROM users WHERE email =:email");

        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user["password"])) {
            return false;
        }

        return $user;
    }
}
