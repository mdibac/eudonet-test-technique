USE test_technique_eudonet;
-- Insertion de données dans la table "groupes"
INSERT INTO groupes (id, nom, date_creation, type)
VALUES
    (1, 'Groupe A', '2022-01-01', 'Type 1'),
    (2, 'Groupe B', '2022-02-01', 'Type 2'),
    (3, 'Groupe C', '2022-03-01', 'Type 3'),
    (4, 'Groupe D', '2022-04-01', 'Type 1'),
    (5, 'Groupe E', '2022-05-01', 'Type 2'),
    (6, 'Groupe F', '2022-06-01', 'Type 3'),
    (7, 'Groupe G', '2022-07-01', 'Type 1'),
    (8, 'Groupe H', '2022-08-01', 'Type 2'),
    (9, 'Groupe I', '2022-09-01', 'Type 3'),
    (10, 'Groupe J', '2022-10-01', 'Type 1'),
    (11, 'Groupe K', '2022-11-01', 'Type 2'),
    (12, 'Groupe L', '2022-12-01', 'Type 3'),
    (13, 'Groupe M', '2023-01-01', 'Type 1'),
    (14, 'Groupe N', '2023-02-01', 'Type 2'),
    (15, 'Groupe O', '2023-03-01', 'Type 3'),
    (16, 'Groupe P', '2023-04-01', 'Type 1'),
    (17, 'Groupe Q', '2023-05-01', 'Type 2'),
    (18, 'Groupe R', '2023-06-01', 'Type 3'),
    (19, 'Groupe S', '2023-07-01', 'Type 1'),
    (20, 'Groupe T', '2023-08-01', 'Type 2');

-- Insertion de données dans la table "personnes"
INSERT INTO personnes (id, nom, prenom, date_naissance)
VALUES
    (1, 'Doe', 'John', CASE WHEN RAND() > 0.5 THEN '1973-01-15' ELSE '1974-01-15' END),
    (2, 'Smith', 'Jane', CASE WHEN RAND() > 0.5 THEN '1973-05-20' ELSE '1974-05-20' END),
    (3, 'Johnson', 'Bob', '1995-08-10'),
    (4, 'Williams', 'Alice', '1973-03-25'),
    (5, 'Brown', 'Charlie', '1992-11-12'),
    (6, 'Davis', 'Martin', '1980-09-08'),
    (7, 'Wilson', 'Frank', '1973-07-04'),
    (8, 'Moore', 'Grace', '1987-02-18'),
    (9, 'Miller', 'Harry', '1991-12-30'),
    (10, 'Taylor', 'Isabel', '1974-06-14'),
    (11, 'Anderson', 'Jack', '1973-04-02'),
    (12, 'Clark', 'Kelly', '1989-10-17'),
    (13, 'White', 'Louis', '1974-08-22'),
    (14, 'Young', 'Mia', '1986-01-07'),
    (15, 'Harris', 'Nathan', '1974-05-31'),
    (16, 'Allen', 'Olivia', '1982-11-24'),
    (17, 'Baker', 'Paul', '1996-09-18'),
    (18, 'Cooper', 'Quinn', '1974-03-03'),
    (19, 'Evans', 'Ryan', '1998-07-28'),
    (20, 'Fisher', 'Sophia', '1973-12-12');

-- Insertion de données dans la table "personnes2groupes"
INSERT INTO personnes2groupes (id, id_groupe, id_personne, date_entree)
VALUES
    (1, 1, 1, '2022-01-02'),
    (2, 1, 2, '2022-01-03'),
    (3, 2, 3, '2022-02-05'),
    (4, 2, 4, '2022-02-10'),
    (5, 3, 5, '2022-03-15'),
    (6, 3, 6, '2022-03-20'),
    (7, 4, 7, '2022-04-25'),
    (8, 4, 8, '2022-04-30'),
    (9, 5, 9, '2022-05-05'),
    (10, 5, 10, '2022-05-10'),
    (11, 6, 12, '2022-06-15'),
    (12, 6, 13, '2022-06-20'),
    (13, 7, 14, '2022-07-25'),
    (14, 7, 15, '2022-07-30'),
    (15, 8, 17, '2022-08-04'),
    (16, 8, 18, '2022-08-09'),
    (17, 9, 19, '2022-09-14'),
    (18, 9, 20, '2022-09-19'),
    (19, 10, 1, '2022-10-24'),
    (20, 10, 2, '2022-10-29');
