<?php

/**
 * Affiche le contenu d'un fichier SQL en le sécurisant.
 *
 * @param string $filename.
 */
function displaySQLContent($filename) {
    try {
        if (!file_exists($filename) || !is_readable($filename)) {
            throw new Exception('Le fichier n\'existe pas ou n\'est pas accessible.');
        }

        $content = file_get_contents($filename);

        if ($content === false) {
            throw new Exception('Impossible de lire le fichier.');
        }

        echo htmlspecialchars($content);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réponses Entretien Technique: Question A</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/prism.css">
 </head>
<body>
    <div>
        <pre>
            <code class="language-sql">
                <span class="token comment">
                    /* **************************************************************
                    Création de la BDD "test_technique_eudonet"
                    Table "groupes" : id, nom, date_creation, type
                    Table "personnes" : id, nom, prenom, date_naissance
                    Table "personnes2groupes" : id, id_groupe, id_personne, date_entree
                    Tous les "id" sont numériques et les dates au format yyyy-mm-dd
                    ******************************************************************** */
                </span>
                <?php displaySQLContent('sql/script-create-db.sql'); ?>
            </code>
        </pre>

        <pre>
            <code class="language-sql">
                <span class="token comment">
                    /* **************************************************
                        Alimenter la BDD avec des données aléatoires
                    ************************************************** */
                </span>
                <?php displaySQLContent('sql/script-fixtures.sql'); ?>
            </code>
        </pre>

        <pre>
            <code class="language-sql">
                <span class="token comment">
                    /* *****************************
                        Les réponses aux questions
                    ********************************* */
                </span>
                <?php displaySQLContent('sql/reponses-parties-a.sql'); ?>
            </code>
        </pre>

        <h3><a href="../index.php">Retour à la page d'accueil</a></h3>
    </div>
    
    <script src="../assets/js/prism.js"></script>
</body>
</html>