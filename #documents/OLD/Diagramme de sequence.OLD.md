###### A coller tel quel dans : https://plantuml-editor.kkeisuke.dev/




## Visiteur

@startuml

actor Visiteur
database BDD order 30

Visiteur -> Serveur: S'inscrire
activate Serveur

Serveur -> BDD: Vérifier que l'adresse e-mail n'existe pas déjà
activate BDD
BDD --> Serveur: retour OK
Serveur -> BDD: Création du compte utilisateur
BDD --> Serveur: retour OK
deactivate BDD

Serveur -> Visiteur: Mail envoyé pour validation de l'inscription

deactivate Serveur

Visiteur --> Visiteur: authentifié automatiquement en tant qu'utilisateur

== ==

Visiteur -> Serveur: S'authentifier
activate Serveur
Serveur -> BDD: Vérifier que les identifiants existent et sont valides
activate BDD
BDD --> Serveur: retour OK
deactivate BDD

Serveur --> Visiteur: authentifié en tant qu'utilisateur
deactivate Serveur

== ==

Visiteur -> Serveur: Visualiser tous les matchs
activate Serveur

Serveur -> BDD: Récupération de tous les matchs et leurs infos
activate BDD
BDD --> Serveur: retour liste
deactivate BDD

Serveur --> Visiteur: affiche la liste des matchs
deactivate Serveur

Visiteur -> Serveur: Visualiser les détails d'un match de la liste
activate Serveur

Serveur -> BDD: Récupération de toutes les informations du match
activate BDD
BDD --> Serveur: retour liste
deactivate BDD

Serveur --> Visiteur: affiche les détails du match
deactivate Serveur

== ==

Visiteur -> Serveur: Parier sur une sélection de match
note right of Visiteur: Mais possibilité de miser qu'en tant qu'utilisateur


@enduml



## Utilisateur

@startuml

actor Utilisateur
database BDD order 30

Utilisateur -> Serveur: Accéder à son espace utilisateur
activate Serveur

Serveur -> BDD: Vérifier le niveau d'accès autorisé
activate BDD
BDD --> Serveur: retour OK
Serveur -> BDD: Récupération des infos de l'utilisateur
BDD --> Serveur: retour liste
deactivate BDD

Serveur --> Utilisateur: affiche l'espace utilisateur
deactivate Serveur

== ==

Utilisateur -> Serveur: Consulter son historique des mises
activate Serveur

Serveur -> BDD: Vérifier le niveau d'accès autorisé
activate BDD
BDD --> Serveur: retour OK
deactivate BDD

Serveur --> Utilisateur: TODO
deactivate Serveur

== ==

Utilisateur -> Serveur: Demander un nouveau mot de passe
activate Serveur



Serveur --> Utilisateur: TODO
deactivate Serveur

== ==

Utilisateur -> Serveur: Miser sur un match
activate Serveur



Serveur --> Utilisateur: TODO
deactivate Serveur

== ==

Utilisateur -> Serveur: Miser sur une sélection de match
activate Serveur

#####TODO

Serveur --> Utilisateur: TODO
deactivate Serveur

@enduml
