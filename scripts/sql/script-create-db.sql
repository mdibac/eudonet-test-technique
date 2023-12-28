
-- Création de la base de données test_technique_eudonet
CREATE DATABASE IF NOT EXISTS test_technique_eudonet;
USE test_technique_eudonet;

-- Création de la table "groupes"
CREATE TABLE IF NOT EXISTS groupes (
    id INT PRIMARY KEY,
    nom VARCHAR(255),
    date_creation DATE,
    type VARCHAR(255)
);

-- Création de la table "personnes"
CREATE TABLE IF NOT EXISTS personnes (
    id INT PRIMARY KEY,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    date_naissance DATE
);

-- Création de la table "personnes2groupes"
CREATE TABLE IF NOT EXISTS personnes2groupes (
    id INT PRIMARY KEY,
    id_groupe INT,
    id_personne INT,
    date_entree DATE,
    FOREIGN KEY (id_groupe) REFERENCES groupes(id),
    FOREIGN KEY (id_personne) REFERENCES personnes(id)
);
