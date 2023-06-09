###### A coller tel quel dans : https://plantuml-editor.kkeisuke.dev/




@startuml

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
    
    + créerCompte()
    + seConnecter(): Utilisateur
    # voirMatchs(): Liste<Match>
    # voirDétailsMatch(): Match
    # parier(): Pari
}

class Utilisateur {
    - ID: int
    # nom: string
    # prénom: string
    # email: string
    # motDePasse: string
    
    - regénérerMotDePasse(): string
    - créerMise(): Mise
    - éditerMise(): Mise
    - supprimerMise(): boolean
    - afficherHistoriqueMises(): Liste<Mise>
}

class Commentateur {
    - ID: int
    
    - commenterMatch(): Commentaire
    - fermerMatch(): Match
}

class Administrateur {
    - ID: int
    
    - créerEquipe(): Equipe
    - créerJoueur(): Joueur
    - creerMatch(): Match
    - modifierMatch(): Match
    - configurerPari(): Pari
}


Match -down- Commentaire
Match -up- Equipe
Equipe -right- Joueur
Match -up- Pari
Pari -up- Mise

Commentateur -left- Match
Commentateur -left- Commentaire
Visiteur -right- Pari
Visiteur -- Match
Utilisateur -- Pari
Utilisateur -- Match
Utilisateur -- Mise
Administrateur -down- Equipe
Administrateur -- Joueur
Administrateur -- Pari
Administrateur -- Match

@enduml
