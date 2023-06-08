###### A coller tel quel dans : https://plantuml-editor.kkeisuke.dev/




## Visiteur

@startuml

hide footbox

actor Visiteur #ffff99
database BDD order 30


Visiteur -> Serveur ++ : S'inscrire

Serveur -> BDD ++ : Vérifier que l'adresse e-mail n'existe pas déjà
BDD --> Serveur: retour OK
Serveur -> BDD: Création du compte utilisateur
BDD --> Serveur -- : retour OK

Serveur -> Visiteur -- : Mail envoyé pour validation de l'inscription

Visiteur --> Visiteur: authentifié automatiquement en tant qu'utilisateur

== ==

Visiteur -> Serveur ++ : S'authentifier

Serveur -> BDD ++ : Vérifier que les identifiants existent et sont valides
BDD --> Serveur -- : retour OK

Serveur --> Visiteur -- : authentifié en tant qu'utilisateur

== ==

Visiteur -> Serveur ++ : Visualiser tous les matchs

Serveur -> BDD ++ : Récupération de tous les matchs et leurs infos
BDD --> Serveur -- : retour liste

Serveur -> Visiteur -- : Afficher la liste des matchs


Visiteur -> Serveur ++ : Visualiser les détails d'un match de la liste

Serveur -> BDD ++ : Récupération de toutes les informations du match
BDD --> Serveur -- : retour liste

Serveur -> Visiteur -- : Afficher les détails du match

== ==

Visiteur -> Serveur: Parier sur une sélection de match
note right of Visiteur: Mais possibilité de miser qu'en tant qu'utilisateur


@enduml



## Utilisateur

@startuml

hide footbox

actor Utilisateur #ffbb88
database BDD order 30

Utilisateur -> Serveur ++ : Accéder à son espace utilisateur

Serveur -> BDD ++ : Vérifier le niveau d'accès autorisé
BDD --> Serveur: retour OK
Serveur -> BDD: Récupération des infos de l'utilisateur
BDD --> Serveur -- : retour liste

Serveur -> Utilisateur -- : Afficher l'espace utilisateur

== ==

Utilisateur -> Serveur ++ : Consulter son historique des mises

Serveur -> BDD ++ : Récupération de l'historique
BDD --> Serveur -- : retour liste

Serveur -> Utilisateur -- : Afficher l'historique

== ==

Utilisateur -> Serveur ++ : Demander un nouveau mot de passe

Serveur -> BDD ++ : Vérifier nom et adresse e-mail
BDD --> Serveur -- : retour OK

Serveur -> Utilisateur -- : Mail envoyé avec le nouveau mot de passe
note right of Utilisateur: Le nouveau mot de passe est à modifier dès la prochaine connexion

== ==

Utilisateur -> Serveur ++ : Miser sur une sélection de match

loop Boucle: tant qu'il y a des matchs dont l'utilisateur a souhaité faire un pari

Utilisateur -> Serveur : Miser sur un match

Serveur -> BDD ++ : Enregistrement de la mise
BDD --> Serveur -- : retour OK

end loop

Serveur -> Utilisateur -- : Notifier l'utilisateur de l'enregistrement de la mise

@enduml



## Commentateur

@startuml

hide footbox

actor Commentateur #99ff99
database BDD order 30

Commentateur -> Serveur ++ : Consulter les matchs du jour

Serveur -> BDD ++: TODO
BDD --> Serveur --: TODO

Serveur -> Commentateur -- : Afficher la liste des matchs

== ==



@enduml



## Administrateur

@startuml

hide footbox

actor Administrateur #9999ff
database BDD order 30

Administrateur -> Serveur ++ : Accéder à son espace administrateur

Serveur -> BDD ++ : Vérifier le niveau d'accès autorisé
BDD --> Serveur: retour OK
Serveur -> BDD: Récupération des infos de l'administrateur
BDD --> Serveur -- : retour liste

Serveur -> Administrateur -- : Afficher l'espace administrateur

== ==

Administrateur -> Serveur ++ : Créer des joueurs et des équipes

Serveur -> BDD ++: Enregistrement des joueurs et équipes créés
BDD --> Serveur --: retour OK

Serveur -> Administrateur -- : Notifier l'administrateur de l'enregistrement

== ==

Administrateur -> Serveur ++ : Affecter des équipes dans un match
Administrateur -> Serveur : Renseigner les côtes des équipes

Serveur -> BDD ++: Enregistrement des affectations & côtes
BDD --> Serveur --: retour OK


Serveur -> Administrateur -- : Afficher le nouveau match


@enduml
