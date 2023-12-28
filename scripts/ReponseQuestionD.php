<?php

$filename = 'responses/StationVelib.php';

/**
 * Obtient les stations Vélib les plus proches pour une position géographique donnée.
 *
 * @param float $lat Latitude de la position.
 * @param float $lng Longitude de la position.
 * @return array Tableau contenant les informations des stations Vélib.
 */
function getVelibStations($lat, $lng) {
    require $GLOBALS['filename'];
    return trouveStations($lat, $lng);
}

/**
 * Affiche le contenu d'un fichier avec une gestion d'erreur.
 */
function displayFileContent() {
    try {
        if (!file_exists($GLOBALS['filename']) || !is_readable($GLOBALS['filename'])) {
            throw new Exception('Le fichier n\'existe pas ou n\'est pas accessible.');
        }

        $content = file_get_contents($GLOBALS['filename']);

        if ($content === false) {
            throw new Exception('Impossible de lire le fichier.');
        }

        echo htmlspecialchars($content);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

/**
 * Affiche un tableau HTML contenant les informations des stations Vélib.
 *
 * @param array $stations Tableau contenant les informations des stations Vélib.
 */
function displayVelibStationsTable($stations) {
    echo "<h2>Les Stations Vélib les plus proches - Les vélos dispos </h2>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Nom de la station</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Distance (km)</th>
            <th>Vélos disponibles</th>
        </tr>";
    foreach ($stations as $station) {
        echo "<tr>";
        echo "<td>" . $station['name'] . "</td>";
        echo "<td>" . $station['latitude'] . "</td>";
        echo "<td>" . $station['longitude'] . "</td>";
        echo "<td>" . number_format($station['distance'], 2) . "</td>";
        echo "<td>" . $station['numBikesAvailable'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test technique Eudonet: Station Vélib</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/prism.css">
</head>
<body>
    <?php
        // Ici il faut choisir ses coordonnées de sa position  
        $lat = 48.8890632;
        $lng = 2.249333;

        $stations = getVelibStations($lat, $lng);
        displayVelibStationsTable($stations);
    ?>

    <pre>
        <code class="language-php">
            <?php
                displayFileContent();
            ?>
        </code>
    </pre>

    <h3><a href="../index.php">Retour à la page d'accueil</a></h3>
    <script src="../assets/js/prism.js"></script>   
</body>
</html>
