<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réponses Entretien Technique: Question C</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <h2>1. Problème Résolu lors de la Refonte du Site Web</h2>
    <p>
        Durant la refonte from scratch du site web de l'unedic.org, nous étions confrontés à un défi majeur lié à la lenteur
        et à l'inefficacité du moteur de recherche de l'ancien site. J'ai proposé et mis en œuvre Algolia, une solution que
        j'avais découvert et utilisé dans un projet personnel. Cette solution a été validée par notre architecte technique et
        a considérablement amélioré l'expérience utilisateur du nouveau site.
    </p>

    <h2>2. Processus de Chargement du Site netanswer.fr</h2>
    <p>
        La séquence du processus de chargement d'une page web sur netanswer.fr peut être décrite en plusieurs étapes clés :
    </p>
    <ol>
        <li>Lorsque quelqu'un tape "netanswer.fr", le navigateur envoie une requête aux serveurs DNS pour obtenir
            l'adresse IP correspondante.</li>
        <li>Le navigateur établit une connexion TCP avec le serveur web Apache à l'adresse IP obtenue,
            sur le port approprié.</li>
        <li>Une fois la connexion établie, le navigateur envoie une requête HTTP au serveur Apache, demandant les fichiers
            nécessaires pour afficher la page.</li>
        <li>Si la page utilise PHP, le serveur Apache interprète et exécute les scripts PHP pour générer une page HTML dynamique.
            Ces scripts peuvent effectuer des opérations dynamiques, accéder à des bases de données.</li>
        <li>Le serveur renvoie la réponse au navigateur, contenant le code HTML, les feuilles de style, les scripts,
            et d'autres ressources nécessaires.</li>
        <li>Le navigateur commence à recevoir et à interpréter la réponse, chargeant et rendant le contenu au fur et à mesure.</li>
        <li>Une fois que toutes les ressources ont été reçues et que le rendu est complet, le visiteur voit la page complète
            de "netanswer.fr" dans son navigateur.</li>
    </ol>

    <h2>3. Propositions de Changements pour www.centraliens-lyon.net</h2>
    <p>
        C'est la question où je me suis dis c'est un peu flou, je cherche à comment améliorer les performances
        et implementer une solution de cache (redis par exemple), je cherche à une expérience utilisateur et est-ce que je suis satisfait
        sur les interfaces... Enfin j'ai pu constaté:
    </p>
    <ul>
        <li>Le site pèche du côté de l'accessibilité, ne respectant pas pleinement les normes requises pour offrir une expérience inclusive
            à tous les utilisateurs, y compris ceux ayant des besoins spécifiques.</li>
        <li>En plongeant dans le code, j'ai constaté que le CSS et le JavaScript sont exposés en clair. Pour améliorer la sécurité et optimiser
            les performances du site, il serait judicieux de les compresser dans un seul fichier, une pratique courante après la phase
            de construction, souvent réalisée avec des outils tels que Webpack. Cela réduirait la charge du serveur en ne nécessitant qu'un seul
            fichier .css et .js, ce qui, en fin de compte, améliorerait les performances. De plus, en obscurcissant le code JavaScript,
            on minimise les risques d'exploitation malveillante par des personnes examinant le code.</li>
        <li>Il y a également du code JavaScript injecté directement dans le HTML, ce qui va à l'encontre des bonnes pratiques. Une approche
            plus propre serait d'externaliser ce code dans un fichier distinct. De même, la présence de code CSS intégré pourrait être améliorée
            en définissant des classes CSS dans un fichier distinct et en les appliquant de manière sélective aux éléments HTML concernés.
            Cela améliorerait la lisibilité et la maintenabilité globale du code.</li>
        <li>Le code charge jQuery à plusieurs reprises. Cela peut entraîner des conflits et des problèmes de performances.
            Il est préférable de charger jQuery une seule fois et de s'assurer que toutes les dépendances en dépendent.</li>
        <li>Je suggère d'améliorer le fichier /sitemap.xml en y intégrant toutes les pages du site selon un format correct. Cette démarche offrira 
            plusieurs avantages techniques liés à un sitemap.xml valide, tels que l'amélioration de l'indexation par les moteurs de recherche, 
            la facilitation de la découverte des pages par les robots d'exploration, et une meilleure gestion des priorités d'exploration. 
            En corrigeant le sitemap.xml, nous renforcerons la visibilité en ligne du site, favorisant ainsi son référencement et son accessibilité 
            pour les utilisateurs et les moteurs de recherche. Ce processus peut être implémenté efficacement en utilisant des fonctionnalités PHP 
            dédiées à la génération dynamique du sitemap.xml</li>
    </ul>

    <h3><a href="../index.php">Retour à la page d'accueil</a></h3>

</body>
</html>
