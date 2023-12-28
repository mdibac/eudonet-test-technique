-- 1. Combien de personnes ont ou vont avoir 50 ans cette année ?
SELECT COUNT(*) AS nombre_personnes_50_ans
FROM personnes
WHERE YEAR(CURDATE()) - YEAR(date_naissance) = 50;

-- 2. Combien de personnes différentes sont dans au moins un groupe de type 3 ?
SELECT COUNT(DISTINCT p.id) AS nombre_personnes_dans_groupe_type_3
FROM personnes p
INNER JOIN personnes2groupes pg ON p.id = pg.id_personne
INNER JOIN groupes g ON pg.id_groupe = g.id
WHERE g.type = 'Type 3';

-- 3. Quels sont les 10 groupes qui ont le plus grand nombre de membres ?
SELECT groupes.nom AS nom_groupe, COUNT(personnes2groupes.id_personne) AS nombre_membres
FROM groupes
INNER JOIN personnes2groupes ON groupes.id = personnes2groupes.id_groupe
GROUP BY groupes.id
ORDER BY nombre_membres DESC
LIMIT 10;

-- 4. En quelle année le prénom martin a-t-il été donné le plus de fois ?
SELECT YEAR(date_naissance) AS annee, COUNT(*) AS nombre_occurrences
FROM personnes
WHERE prenom = 'Martin'
GROUP BY annee
ORDER BY nombre_occurrences DESC
LIMIT 1;

-- 5. Pour chaque groupe, quel est l'âge moyen ? (deux colonnes : nom du groupe + cet âge moyen)

-- Si vous souhaitez exclure les groupes sans membres,
-- Si vous souhaitez afficher l'âge moyen sous la forme de 49.5 par exemple
SELECT g.nom AS nom_groupe, ROUND(AVG(YEAR(CURRENT_DATE) - YEAR(p.date_naissance)),2) AS age_moyen
FROM groupes g
INNER JOIN personnes2groupes pg ON g.id = pg.id_groupe
INNER JOIN personnes p ON pg.id_personne = p.id
GROUP BY g.id;

-- Si vous souhaitez exclure les groupes sans membres,
-- Si vous souhaitez afficher l'âge moyen sous la forme de "49 ans et 6 mois" par exemple
SELECT
  g.nom AS nom_groupe,
  CONCAT(
    FLOOR(AVG(YEAR(CURRENT_DATE) - YEAR(p.date_naissance))),
    ' ans et ',
    FLOOR(
      AVG(
        CASE
          WHEN MONTH(CURRENT_DATE) >= MONTH(p.date_naissance) THEN
            MONTH(CURRENT_DATE) - MONTH(p.date_naissance)
          ELSE
            12 + MONTH(CURRENT_DATE) - MONTH(p.date_naissance)
        END
      )
    ),
    ' mois'
  ) AS age_moyen
FROM groupes g
INNER JOIN personnes2groupes pg ON g.id = pg.id_groupe
INNER JOIN personnes p ON pg.id_personne = p.id
GROUP BY g.id;


-- Si vous souhaitez inclure tous les groupes, même ceux sans membres
-- Si vous souhaitez afficher l'âge moyen sous la forme de 49.5 par exemple
SELECT groupes.nom AS nom_groupe, ROUND(AVG(YEAR(CURRENT_DATE) - YEAR(personnes.date_naissance)),2) AS age_moyen
FROM groupes
LEFT JOIN personnes2groupes ON groupes.id = personnes2groupes.id_groupe
LEFT JOIN personnes ON personnes2groupes.id_personne = personnes.id
GROUP BY groupes.id;

-- Si vous souhaitez inclure tous les groupes, même ceux sans membres
-- Si vous souhaitez afficher l'âge moyen sous la forme de "49 ans et 6 mois" par exemple
SELECT
  groupes.nom AS nom_groupe,
  CONCAT(
    FLOOR(AVG(YEAR(CURRENT_DATE) - YEAR(personnes.date_naissance))),
    ' ans et ',
    FLOOR(
      AVG(
        CASE
          WHEN MONTH(CURRENT_DATE) >= MONTH(personnes.date_naissance) THEN
            MONTH(CURRENT_DATE) - MONTH(personnes.date_naissance)
          ELSE
            12 + MONTH(CURRENT_DATE) - MONTH(personnes.date_naissance)
        END
      )
    ),
    ' mois'
  ) AS age_moyen
FROM groupes
LEFT JOIN personnes2groupes ON groupes.id = personnes2groupes.id_groupe
LEFT JOIN personnes ON personnes2groupes.id_personne = personnes.id
GROUP BY groupes.id;
