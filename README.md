# Ratrapage_Symfony

1. Qu'est-ce qu'un container de services ? Quel est son rôle ?
    Element php permettant de gerer les services necessaire au développement

2. Quelle est la différence entre les commandes make:entity et make:user lorsqu'on utilise la console
Symfony ?
    make:entity crée un entité classique ou le devellopeur ajoutera élément tandis que make:user créera une entité user avec les éléments necessaire a tous les users ainsi que l'encodage des mots de passe

3. Quelle commande utiliser pour charger les fixtures dans la base de données ?
    php bin/console doctrine:fixtures:load

4. Résumez de manière simple le fonctionnement du système de versions "Semver"
    permet de numéroter les versions

5. Qu'est-ce qu'un Repository ? A quoi sert-il ?
    Services permettant de discuter avec notre base de données

6. Quelle commande utiliser pour voir la liste des routes ?
    php bin/console debug:router


7. Dans un template Twig, quelle variable globale permet d'accéder à la requête courante, l'utilisateur
courant, etc...?
    app


8. Pour mettre à jour la structure de la base de données, quelles sont les 2 possibilités que nous avons
abordées en cours ?
    migrations
    mise a jour a la volée


9. Quelle commande permet de créer une classe de contrôleur ?
    php bin/console make:controller

10. Décrivez succintement l'outil Flex de Symfony
