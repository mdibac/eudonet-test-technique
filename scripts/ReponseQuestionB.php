<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réponses Entretien Technique: Question B</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <h2>Quels sont pour toi, après ton utilisation, les points forts et les points faibles/soucis
        que tu vois avec bootstrap ou un autre système de grille css que tu as déjà utilisé ?</h2>
    <p>
        Les points forts de Bootstrap, selon mon expérience, incluent sa rapidité de mise en place,
        sa facilité d'utilisation, sa documentation complète et sa capacité à accélérer le processus 
        de développement en fournissant un ensemble de composants prêts à l'emploi. Cependant,
        un point faible que j'ai parfois rencontré est la difficulté à personnaliser certains aspects 
        pour s'aligner parfaitement avec les besoins du projet.
        Parfois, la surcharge de code généré peut être plus importante que nécessaire, impactant les performances.
    </p>

    <h2>Quels principes utilises-tu pour rendre tes sites internet utilisables sur un téléphone ? 
    Quels problèmes as-tu déjà expérimenté lors de leur mise en place ?</h2>
    <p>
        <strong>Principes pour la conception mobile :</strong>
    </p>
    <ul>
        <li>Utilisation de media queries pour ajuster la mise en page en fonction de la taille de l'écran.</li>
        <li>Optimisation des images pour des chargements plus rapides.</li>
        <li>Priorisation du contenu important pour une expérience utilisateur mobile fluide.</li>
    </ul>
    <p>
        <strong>Problèmes rencontrés lors de la mise en place :</strong>
    </p>
    <ul>
        <li>Gestion des différentes tailles d'écrans pour garantir une expérience cohérente.</li>
        <li>Assurer la compatibilité entre navigateurs mobiles.</li>
        <li>Nécessité d'ajustements spécifiques pour certains dispositifs.</li>
        <li>Testabilité sur divers appareils et navigateurs pour résoudre les problèmes et garantir une expérience utilisateur optimale.</li>
    </ul>

    <h2>Dans une page HTML, à quel endroit est-il en général préférable de charger les feuilles de style 
    et à quel endroit est-il préférable de charger les scripts ? Pourquoi ?</h2>
    <p>
        En général, il est préférable de charger les feuilles de style (CSS) dans la section &lt;head&gt; de la page HTML. 
        Cela permet un chargement plus rapide et garantit que les styles sont appliqués dès le début du rendu de la page, 
        améliorant ainsi l'expérience utilisateur. En revanche, il est souvent recommandé de charger les scripts (JavaScript) 
        juste avant la fermeture du corps (&lt;/body&gt;). Cela évite de bloquer le rendu initial de la page, car les scripts peuvent 
        être gourmands en ressources. Placer les scripts à la fin garantit que le contenu principal de la page
        est rendu avant que les scripts ne commencent à s'exécuter, améliorant ainsi les performances perçues par l'utilisateur.
    </p>

    <h3><a href="../index.php">Retour à la page d'accueil</a></h3>

</body>
</html>
