<?php
/**
 * Recherche et retourne les stations Vélib situées à moins de 1 km d'un point donné.
 *
 * @param float $lat Latitude du point de référence.
 * @param float $lng Longitude du point de référence.
 * @return array Tableau des stations Vélib à moins de 1 km avec leurs détails.
 */
function trouveStations($lat, $lng) {
    // Récupérer les caractéristiques et localisation des stations Vélib
    $stationInfoUrl = "https://velib-metropole-opendata.smovengo.cloud/opendata/Velib_Metropole/station_information.json";
    $stationInfoData = json_decode(curlGet($stationInfoUrl), true);

    // Récupérer le nombre de vélos et de bornettes disponibles par station
    $stationStatusUrl = "https://velib-metropole-opendata.smovengo.cloud/opendata/Velib_Metropole/station_status.json";
    $stationStatusData = json_decode(curlGet($stationStatusUrl), true);

    // Initialiser un tableau pour stocker les stations à moins de 1 km
    $stationsProches = [];

    // Coordonnées d'un point donné
    $point = ['lat' => $lat, 'lng' => $lng];

    // Parcourir les données de localisation des stations
    $stationStatusMap = [];
    foreach ($stationStatusData['data']['stations'] as $stationStatus) {
        $stationStatusMap[$stationStatus['station_id']] = $stationStatus;
    }

    // Parcourir les données de localisation des stations
    foreach ($stationInfoData['data']['stations'] as $stationInfo) {
        // Récupérer la station correspondante dans les données de statut
        $stationStatus = $stationStatusMap[$stationInfo['station_id']] ?? null;

        // Si la station existe dans les données de statut
        if ($stationStatus) {
            // Calculer la distance entre le point donné et la station
            $distance = distance($point['lat'], $point['lng'], $stationInfo['lat'], $stationInfo['lon']);

            // Si la distance est inférieure à 1 km, ajouter la station au tableau
            if ($distance < 1.0) {
                // Ajouter des détails supplémentaires tels que le nombre de vélos disponibles
                $numBikesAvailable = isset($stationStatus['numBikesAvailable']) ? $stationStatus['numBikesAvailable'] : 'N/A';

                $stationsProches[] = [
                    'name' => $stationInfo['name'],
                    'latitude' => $stationInfo['lat'],
                    'longitude' => $stationInfo['lon'],
                    'distance' => $distance,
                    'numBikesAvailable' => $numBikesAvailable
                ];
            }
        }
    }

    // Trier les stations par distance
    usort($stationsProches, function ($a, $b) {
        return $a['distance'] <=> $b['distance'];
    });

    return $stationsProches;
}

/**
 * Calcule la distance entre deux points sur la surface de la Terre en utilisant la formule de Haversine.
 *
 * @param float $lat1 Latitude du premier point.
 * @param float $lon1 Longitude du premier point.
 * @param float $lat2 Latitude du deuxième point.
 * @param float $lon2 Longitude du deuxième point.
 * @return float Distance entre les deux points en kilomètres.
 */
function distance($lat1, $lon1, $lat2, $lon2) {
    $earthRadius = 6371; // Rayon de la Terre en kilomètres
    $dLat = deg2rad($lat2 - $lat1);
    $dLon = deg2rad($lon2 - $lon1);
    $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $distance = $earthRadius * $c; // Distance en kilomètres

    return $distance;
}

/**
 * Effectue une requête cURL et récupère les données à partir de l'URL spécifiée.
 *
 * @param string $url URL de la requête.
 * @return mixed Les données récupérées à partir de l'URL.
 */
function curlGet($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    curl_close($ch);
    
    return $data;
}