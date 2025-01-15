
CREATE DATABASE upcours_database;

use upcours_database;

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
    Foreign Key (role_id) REFERENCES roles (id)
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
    Foreign Key (categorie_id) REFERENCES categories (id),
    Foreign Key (enseignant_id) REFERENCES utilisateurs (id)
) ENGINE = INNODB;

CREATE TABLE subscriptions (
    cour_id INT,
    FOREIGN KEY (cour_id) REFERENCES cours (id),
    etudiant_id INT,
    FOREIGN KEY (etudiant_id) REFERENCES utilisateurs (id),
    PRIMARY KEY (cour_id, etudiant_id)
) ENGINE = INNODB;

CREATE TABLE cours_tags (
    cour_id INT,
    FOREIGN KEY (cour_id) REFERENCES cours (id),
    tag_id INT,
    FOREIGN KEY (tag_id) REFERENCES tags (id),
    PRIMARY KEY (cour_id, tag_id)
) ENGINE = INNODB;