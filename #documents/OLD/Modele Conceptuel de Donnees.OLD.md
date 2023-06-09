###### A coller tel quel dans : https://plantuml-editor.kkeisuke.dev/




@startuml

hide empty members

class Match {
    - ID: int
    - équipe1: Equipe
    - équipe2: Equipe
    - date: Date
    - heureDébut: Time
    - heureFin: Time
    - statut: string
    - score: string
    - météo: string
    - commentaires: Liste<Commentaire>
}

class Commentaire {
    - ID: int
    - commentateur: Commentateur
    - descriptionCourte: string
    - descriptionLongue: string
    - dateHeure: DateTime
}

class Equipe {
    - ID: int
    - nom: string
    - pays: string
    - listeJoueurs: Liste<Joueur>
}

class Joueur {
    - ID: int
    - nom: string
    - prénom: string
    - numéro: int
}

class Pari {
    - ID: int
    - match: Match
    - coteEquipe1: double
    - coteEquipe2: double
    - coteMatchNul: double
    - statut: string
    - résultat: string
}

class Mise {
    - ID: int
    - pariAssocié: Pari
    - équipeMisée: Equipe
    - utilisateur: Utilisateur
    - montant: double
    - dateHeure: DateTime
    - gainOuPerte: double
}

class Visiteur {
    - ID: int
}

class Utilisateur {
    - ID: int
    # nom: string
    # prénom: string
    # email: string
    # motDePasse: string
}

class Commentateur {
    - ID: int
}

class Administrateur {
    - ID: int
}


Match "0,n" -down- "1,1" Commentaire: a >
Match "2" o-right- "0,1" Equipe: inclu >
Equipe "0,n" *-right--- "0,1" Joueur: contient >
Match "0,1" o-left- "1,1" Pari: < concerne
Pari "0,1" -left- "0,n" Mise: < est réalisé sur

Visiteur "0,n" .. "1,1" Pari: amorce >
Visiteur "0,n" .. "0,1" Match: visualise >

Utilisateur "0,n" .. "1,1" Pari: amorce >
Utilisateur "0,n" .. "0,1" Match: visualise >
Utilisateur "0,n" .. "1,1" Mise: effectue >

Commentateur "0,n" .. "1,1" Commentaire: rédige >
Commentateur "0,n" .. "0,1" Match: ferme >

Administrateur "0,n" .up. "1,1" Pari: configure >
Administrateur "0,n" .. "1,1" Match: conçoit >
Administrateur "0,n" .. "1,1" Equipe: créé >
Administrateur "0,n" .. "1,1" Joueur: affecte >

@enduml
