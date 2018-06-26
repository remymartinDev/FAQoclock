# FAQ O'Clock (à l'intention du correcteur)                     

## Informations utiles



### **Travail de préparation**

- [Modèle Conceptuel de Données](https://drive.google.com/open?id=1fqLuRvp_QlRKJ69PnlSj0BPRAjOOk_hd_6pPVqJdOYM)
- [Dictionnaire de Données](https://drive.google.com/open?id=1TZq1X6DWoTz7feyv41CRS8PetaHFd8J-aHeor5nEE3s)  
- [Trello](https://trello.com/b/zSFnC1RL/faq-eval)  


### **Données**

- Format de la base de donnée : fixtures
    - à la main (en 20min pour ne pas perdre trop de temps), je n'ai pas utilisé de faker
    - je n'ai pas réussi à générer des tags rattachés aux questions (ManyToMany)

### **Utilisateurs / Rôles**
- Informations de connexion : login / mot de passe
    - administrateur : admin / admin
    - modérateur : modo / modo
    - utilisateur 1 : user1 / user1
    - utilisateur 2 : user2 / user2
    - utilisateur 3 : user3 / user3
    - utilisateur 4 : user4 / user4
    - utilisateur 5 : user5 / user5


### **Ce que j'ai fait**
---
- **Ce qui était demandé** :
    - ce que j'ai réussi à faire
      - ce que je n'ai pas réussi à faire
---
- **Navigation** :
    - le user peut se connecter, se déconnecter, s'inscrire;  
    - le nom de l'appli fait office de bouton "/home";      
    - lorsque le user est connecté : un bouton "poser une question" et une div avec "bienvenu  NomDuUser" apparaissent.
- **Accueil** :
    - affiche la liste des questions
- **page _/question/show/id_** :
    - affiche la liste des réponses associées
    - consultable pour le visiteur
    - un user peut répondre / un message invite le visiteur à se connecter pour répondre
    - le user à l'origine de la question peut valider une réponse (celle-ci devient verte)
    - les réponses "validées" s'affichent en haut de la liste
- **page _/user/profile_** :
    - affiche et permet la modification des données du user
    - affiche et propose un lien vers les questions ET les réponses du user
- **Bouton _Valider_** :
    - il fonctionne (valider/invalider) et insère en BDD
      - un bug dû à **_include_** dans la boucle **_for_** fait que le chemin en POST ne fonctionne que dans la 1ere itération de la boucle. Les autres itérations envoient en GET vers un bouton, et cliquer sur ce bouton termine l'action. Je n'ai pas trouvé comment remédier à ce bug en SYMFONY

-
-
-
-
-
-
-


### **Ce que je n'ai pas fait**

-
-
