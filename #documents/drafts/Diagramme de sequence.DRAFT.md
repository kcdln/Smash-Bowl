###### A coller tel quel dans : https://plantuml-editor.kkeisuke.dev/




## Visiteur

@startuml

hide footbox

actor Visiteur #ffff99
database BDD order 30


Visiteur -> Systeme ++ : S'inscrire

Systeme -> BDD ++ : Vérifier que l'adresse e-mail n'existe pas déjà
BDD --> Systeme: retour OK
Systeme -> BDD: Création du compte utilisateur
BDD --> Systeme -- : retour OK

Systeme -> Visiteur -- : Mail envoyé pour validation de l'inscription

Visiteur --> Visiteur: authentifié automatiquement en tant qu'utilisateur

== ==

Visiteur -> Systeme ++ : S'authentifier

Systeme -> BDD ++ : Vérifier que les identifiants existent et sont valides
BDD --> Systeme -- : retour OK

Systeme --> Visiteur -- : authentifié en tant qu'utilisateur

== ==

Visiteur -> Systeme ++ : Visualiser tous les matchs

Systeme -> BDD ++ : Récupération de tous les matchs et leurs informations
BDD --> Systeme -- : retour liste

alt Si statut match terminé ou en cours
  Systeme -> Visiteur : Afficher toutes les informations dont le score
else Sinon
  Systeme -> Visiteur : Afficher les informations sans le score
end

Systeme -> Visiteur -- : Afficher la liste des matchs


Visiteur -> Systeme ++ : Visualiser les détails d'un match de la liste

Systeme -> BDD ++ : Récupération de toutes les informations du match
BDD --> Systeme -- : retour liste

Systeme -> Visiteur -- : Afficher les détails du match

== ==

Visiteur -> Systeme: Parier sur une sélection de match
note right of Visiteur: Mais possibilité de miser qu'en tant qu'utilisateur

@enduml



## Utilisateur

@startuml

hide footbox

actor Utilisateur #ffbb88
database BDD order 30

Utilisateur -> Systeme ++ : Accéder à son espace utilisateur

Systeme -> BDD ++ : Vérifier le niveau d'accès autorisé
BDD --> Systeme: retour OK
Systeme -> BDD: Récupération des informations de l'utilisateur
BDD --> Systeme -- : retour liste

Systeme -> Utilisateur -- : Afficher l'espace utilisateur

== ==

Utilisateur -> Systeme ++ : Consulter son historique des mises

Systeme -> BDD ++ : Récupération de l'historique
BDD --> Systeme -- : retour liste

Systeme -> Utilisateur : Afficher l'historique

loop Pour chaque mise effectuée
  alt Si statut match terminé
    Systeme -> Utilisateur : Afficher le montant gagné ou perdu
  end

  alt Si statut match à venir
    Utilisateur -> Systeme : Boutons de mise-à-jour/suppression de la mise

    Systeme -> BDD ++ : Vérifier le niveau d'accès autorisé
    BDD --> Systeme: retour OK
    Systeme -> BDD: Mise-à-jour/Suppression de la mise
    BDD --> Systeme -- : retour OK
  end
end loop

Systeme -> Utilisateur -- : Afficher l'historique mis-à-jour

== ==

Utilisateur -> Systeme ++ : Demander un nouveau mot de passe

Systeme -> BDD ++ : Vérifier nom et adresse e-mail

alt Si le nom et l'adresse sont valides
  BDD --> Systeme : retour OK
  Systeme -> Systeme : Générer un nouveau mot de passe temporaire

  Systeme -> Utilisateur -- : Mail envoyé avec le nouveau mot de passe
else Sinon
  BDD --> Systeme -- : retour KO
  Systeme -> Utilisateur : Afficher une erreur
end

note right of Utilisateur: Le nouveau mot de passe est à modifier dès la prochaine connexion

== ==

Utilisateur -> Systeme ++ : Visualiser tous les matchs misés

Systeme -> BDD ++ : Récupération des matchs et leurs informations
BDD --> Systeme -- : retour liste

loop Pour chaque match misé
  alt Si statut match terminé
    Systeme -> Utilisateur : Afficher nom des équipes, date du match et le score
  else Sinon
    Systeme -> Utilisateur : Afficher le nom des équipes et la date seulement
  end

  Systeme -> Utilisateur -- : Afficher la liste des matchs


  alt Si statut match en cours
    Utilisateur -> Systeme ++ : Visualiser les détails d'un match de la liste

    Systeme -> BDD ++ : Récupération de toutes les informations du match
    BDD --> Systeme -- : retour liste

    Systeme -> Utilisateur -- : Afficher les détails du match
  end
end loop

== ==

Utilisateur -> Systeme ++ : Miser sur un match ou une sélection de matchs

loop Pour chaque match de la sélection de l'utilisateur

alt Si statut match à venir
  Utilisateur -> Systeme : Effectuer une mise

  Systeme -> BDD ++ : Enregistrement/Mise-à-jour de la mise
  BDD --> Systeme -- : retour OK
end


end loop

Systeme -> Utilisateur -- : Notifier l'utilisateur de l'enregistrement

@enduml



## Commentateur

@startuml

hide footbox

actor Commentateur #99ff99
database BDD order 30

Commentateur -> Systeme ++ : Consulter les matchs du jour

Systeme -> BDD ++ : Récupération de tous les matchs et leurs informations
BDD --> Systeme -- : retour liste

Systeme -> Commentateur -- : Afficher la liste des matchs


Commentateur -> Systeme ++ : Voir les détails d'un match de la liste

Systeme -> BDD ++ : Récupération de toutes les informations du match
BDD --> Systeme -- : retour liste

Systeme -> Commentateur -- : Afficher les détails du match

== ==

Commentateur -> Systeme ++ : Commenter un match

Systeme -> BDD ++ : Vérifier le niveau d'accès autorisé
BDD --> Systeme: retour OK

Systeme -> BDD : Enregistrement du commentaire
BDD --> Systeme -- : retour liste

Systeme -> Commentateur -- : Afficher le nouveau commentaire à la suite

== ==

Commentateur -> Systeme ++ : Fermer un match

Systeme -> BDD ++ : Vérifier le niveau d'accès autorisé
BDD --> Systeme: retour OK


Systeme -> BDD : Mise-à-jour de l'état du match de en cours à terminé
alt Si il y a eu des prolongations dans le match
  Systeme -> BDD : Mise-à-jour de l'heure de fin du match
end
BDD --> Systeme -- : retour OK

Systeme -> Commentateur -- : Afficher les informations définitives du match

@enduml



## Administrateur

@startuml

hide footbox

actor Administrateur #9999ff
database BDD order 30

Administrateur -> Systeme ++ : Accéder à son espace administrateur

Systeme -> BDD ++ : Vérifier le niveau d'accès autorisé
BDD --> Systeme: retour OK
Systeme -> BDD: Récupération des informations de l'administrateur
BDD --> Systeme -- : retour liste

Systeme -> Administrateur -- : Afficher l'espace administrateur

== ==

Administrateur -> Systeme ++ : Créer des joueurs et des équipes

Systeme -> BDD ++: Enregistrement des joueurs et équipes créés
BDD --> Systeme --: retour OK

Systeme -> Administrateur -- : Notifier l'administrateur de l'enregistrement

== ==

Administrateur -> Systeme ++ : Créer un match en y affectant deux équipes
Administrateur -> Systeme : Renseigner les côtes des équipes

Systeme -> BDD ++: Enregistrement des affectations & côtes
BDD --> Systeme --: retour OK


Systeme -> Administrateur -- : Afficher le nouveau match

== ==

alt Si statut match à venir
  Administrateur -> Systeme ++ : Modifier les informations d'un match

  Systeme -> BDD ++: Mise-à-jour des informations
  BDD --> Systeme --: retour OK


  Systeme -> Administrateur -- : Afficher le match mis-à-jour
end

@enduml
