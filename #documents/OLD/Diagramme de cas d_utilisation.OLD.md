###### A coller tel quel dans : https://plantuml-editor.kkeisuke.dev/




## Visiteur

@startuml

actor Visiteur #ffff99

Visiteur -down- (Se connecter)
Visiteur -left- (Visualiser les matchs)
Visiteur -up- (Parier)
Visiteur -right- (Voir les détails d'un match)
Visiteur -down- (Créer un compte)

@enduml


---
## Utilisateur

@startuml

actor Visiteur #ffff99
actor Utilisateur #ffbb88

Visiteur <|-right- Utilisateur

Utilisateur -up- (Miser sur un match)
Utilisateur -up- (Miser sur une sélection de matchs)
Utilisateur -down- (Demander un nouveau mot de passe)
Utilisateur -down- (Accéder à son espace utilisateur)
Utilisateur -right- (Consulter son historique des mises)

@enduml


---
## Commentateur

@startuml

actor Commentateur #99ff99

Commentateur -up- (Voir les détails d'un match)
Commentateur -up- (Visualiser les matchs)
Commentateur -down- (Commenter un match)
Commentateur -down- (Fermer un match)

@enduml


---
## Administrateur

@startuml

actor Visiteur #ffff99
actor Utilisateur #ffbb88
actor Commentateur #99ff99
actor Administrateur #9999ff

Visiteur <|-up- Administrateur
Utilisateur <|-up- Administrateur
Commentateur <|-up- Administrateur

Administrateur -left- (Accéder à son espace administrateur)
Administrateur -right- (Renseigner les côtes des équipes)
Administrateur -up- (Modifier un match)
Administrateur -up- (Affecter des équipes dans un match)
Administrateur -up- (Créer des joueurs)
Administrateur -up- (Créer des équipes)

@enduml
