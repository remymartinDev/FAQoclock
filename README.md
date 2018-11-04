# Faq

## Principe du programme : site de questions/réponses sur le modèle de Quora, ou encore StackOverflow

 * Le site répertorie des questions (auteur, intitulé, corps de la question), et plusieurs réponses (auteur     corps de la réponse).
 * Les visiteurs doivent pouvoir créer un compte sur le site, ils deviennent alors utilisateurs.
 * Les utilisateurs inscrits posent les questions, et peuvent également proposer des réponses aux questions déjà posées.
* Tout le monde peut consulter les contenus, mais il faut être identifié pour pouvoir poser une question ou proposer une réponse.  
* Pages accessibles à tous les visiteurs
    * Accueil : voir toutes les questions (les plus récentes d'abord),
    * Question (voir la question, avec toutes ses réponses),
    * Inscription (formulaire d'inscription),
    * Connexion (formulaire de login).
* Pages accessibles aux utilisateurs identifiés,
    * Poser une question,
    * Sur la page Question, un formulaire permettant d'Ajouter une réponse à cette question (directement dans la page, sous la question),
    * Dans la liste des réponses, un bouton permet de valider une réponse. Seul l'utilisateur qui a posé la question peut indiquer une réponse comme étant valide. La réponse validée s'affiche de façon distincte et en premier dans la liste des réponses.
* Mon Profil : permet de consulter ses propres informations utilisateur, la liste de ses questions, et de ses réponses, avec un lien pour s'y rendre.
    * Sur cette page, un lien Modifier mon Profil qui permet de modifier ses propres informations.
* Fonctions de modération
    * Certains utilisateurs sont aussi modérateurs. Les modérateurs peuvent bloquer une question ou une réponse non-conforme à la charte du site. Un admin peut donner les droits de modérateur à un utilisateur.
    * Sur la liste des questions (page Accueil) et la liste des réponses (page Question), un bouton permet aux modérateurs de bloquer ou débloquer facilement une question ou une réponse. Quand elle est bloquée, celle-ci ne s'affiche plus (ni depuis les listes, ni en accès direct), sauf pour les modérateurs et les admins.
* Page Admin users permet à l'admin de changer le statut d'un utilisateur.
## Technologies utilisées :

* PHP
* Symfony 4
* Twig / Bootstrap

## Login/password si vous souhaitez tester l'application :
* administrateur : admin / admin
* modérateur : modo / modo
* utilisateur 1 : user1 / user1
* utilisateur 2 : user2 / user2
* utilisateur 3 : user3 / user3
* utilisateur 4 : user4 / user4
* utilisateur 5 : user5 / user5
