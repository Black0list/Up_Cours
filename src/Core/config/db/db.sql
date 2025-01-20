CREATE DATABASE upcours_database;

USE upcours_database;

CREATE TABLE roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    role_name VARCHAR(25) UNIQUE,
    description TEXT
) ENGINE = INNODB;

CREATE TABLE utilisateurs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30),
    email VARCHAR(50) UNIQUE,
    password VARCHAR(50),
    role_id INT,
    status VARCHAR(55),
    FOREIGN KEY (role_id) REFERENCES roles (id) ON DELETE SET NULL
) ENGINE = INNODB;

CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) UNIQUE,
    description TEXT
) ENGINE = INNODB;

CREATE TABLE tags (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(35) UNIQUE,
    description TEXT
) ENGINE = INNODB;

CREATE TABLE cours (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    description TEXT,
    content VARCHAR(255),
    categorie_id INT,
    enseignant_id INT,
    FOREIGN KEY (categorie_id) REFERENCES categories (id) ON DELETE SET NULL,
    FOREIGN KEY (enseignant_id) REFERENCES utilisateurs (id) ON DELETE CASCADE
) ENGINE = INNODB;

CREATE TABLE subscriptions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    cour_id INT,
    FOREIGN KEY (cour_id) REFERENCES cours (id) ON DELETE CASCADE,
    etudiant_id INT,
    FOREIGN KEY (etudiant_id) REFERENCES utilisateurs (id) ON DELETE SET NULL,
) ENGINE = INNODB;

CREATE TABLE cours_tags (
    id INT PRIMARY KEY AUTO_INCREMENT,
    cour_id INT,
    FOREIGN KEY (cour_id) REFERENCES cours (id) ON DELETE CASCADE,
    tag_id INT,
    FOREIGN KEY (tag_id) REFERENCES tags (id) ON DELETE CASCADE,
) ENGINE = INNODB;
