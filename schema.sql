-- Schema do projeto
-- 2026/08/27
-- Diego Perez Marciano

-- Descarta banco caso já exista
DROP DATABASE IF EXISTS teste_diego;

-- Cria banco caso não exista
CREATE DATABASE IF NOT EXISTS teste_diego;

-- Seleciona o banco
USE teste_diego;

-- Cria tabela de usuários
CREATE TABLE users(
    id_user BIGINT(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(150) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(60) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NULL,
    active TINYINT(1) NOT NULL DEFAULT '1'
) ENGINE=INNODB;

-- Cria tabela de serviços
CREATE TABLE services(
    id_service BIGINT(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    description VARCHAR(150) NOT NULL,
    price DECIMAL(11,3) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME  NULL,
    finished_at DATETIME  NULL,
    commission_user DECIMAL(11,3) NOT NULL,
    user_id_user BIGINT(20) NOT NULL
) ENGINE=INNODB;