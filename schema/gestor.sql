CREATE DATABASE IF NOT EXISTS gestor DEFAULT CHARSET SET utf8mb4;
USE gestor;
CREATE TABLE IF NOT EXISTS users_table(
    u_id INT NOT NULL AUTO_INCREMENT,
    u_names VARCHAR(45) NULL,
    u_birthday DATE NULL,
    u_email VARCHAR(45),
    u_user VARCHAR(45),
    u_password TEXT NULL,
    u_insert DATETIME NOT NULL DEFAULT now(),
    PRIMARY KEY (u_id)
);
CREATE TABLE IF NOT EXISTS categories_table(
    category_id INT NOT NULL AUTO_INCREMENT,
    u_id INT NOT NULL,
    category_name VARCHAR(45) NOT NULL,
    category_insert DATETIME NOT NULL DEFAULT now(),
    PRIMARY KEY (category_id)
);
CREATE TABLE IF NOT EXISTS files_table(
	f_id INT auto_increment NOT NULL,
	u_id INT NOT NULL,
	category_id INT NOT NULL,
	f_name varchar(255) NOT NULL,
	f_type varchar(45) NOT NULL,
	f_path TEXT NOT NULL,
	f_insert DATETIME DEFAULT now() NOT NULL,
    PRIMARY KEY (f_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;