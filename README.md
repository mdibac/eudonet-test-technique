# Test Technique Eudonet - Réponse par Hamdi Baccouch

Bienvenue dans l'application de réponse au test technique proposé par Eudonet et réalisé par Hamdi Baccouch dans le cadre d'une candidature au poste de développeur PHP.

## Prérequis

Assurez-vous d'avoir Docker et Docker Compose installés sur votre machine avant de continuer.

## Installation

1. Clonez le dépôt Git sur votre machine locale.

   git clone git@github.com:mdibac/eudonet-test-technique.git

2. Accédez au répertoire du projet.

    cd eudonet-test-technique  

3. Lancez les conteneurs Docker en utilisant Docker Compose

    docker-compose up -d

# Accès à l'application

Pour accéder à l'application, ouvrez votre navigateur à l'adresse http://127.0.0.1:8080/.

## Accès à la base de données

Utilisez http://127.0.0.1:8081/ pour accéder à la base de données. Connectez-vous avec les identifiants suivants :

- **Utilisateur :** root
- **Mot de passe :** (laissez le champ vide)

## Scripts SQL à Exécuter

Assurez-vous d'exécuter les scripts SQL suivants dans l'ordre indiqué pour préparer la base de données :

1. **Script de création de la base de données :**
   - Chemin : `scripts/sql/script-create-db.sql`

2. **Script d'alimentation de la base de données :**
   - Chemin : `scripts/sql/script-fixtures.sql`

3. **Scripts des réponses aux différentes questions :**
   - Chemin : `scripts/sql/reponses-parties-a.sql`

# NB.
Vous pouvez également trouver tous les scripts dans la page: http://127.0.0.1:8080/scripts/ReponseQuestionA.php


## Auteur
Cette application a été réalisée par Hamdi Baccouch dans le cadre du processus de candidature pour le poste de développeur PHP chez Eudonet.

Merci de prendre le temps de tester cette application. Si vous rencontrez des problèmes ou avez des questions, n'hésitez pas à me contacter.
