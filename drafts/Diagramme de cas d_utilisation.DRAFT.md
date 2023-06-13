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

actor Administrateur #9999ff

Administrateur -up- (Créer des joueurs)
Administrateur -up- (Créer des équipes)
Administrateur -right- (Configurer un pari)
Administrateur -left- (Affecter des équipes dans un match)
Administrateur -down- (Modifier un match)
Administrateur -down- (Accéder à son espace administrateur)

@enduml


---
## Super Administrateur

@startuml

skinparam actorStyle awesome
actor :Super Administrateur: as SuperAdmin << SuperBowlAdmin >> #555555

skinparam actorStyle default
actor Visiteur #ffff99
actor Utilisateur #ffbb88
actor Commentateur #99ff99
actor Administrateur #9999ff

Visiteur <|- Utilisateur
Utilisateur <|- SuperAdmin
Commentateur <|-left- SuperAdmin
Administrateur <|-up- SuperAdmin

@enduml
