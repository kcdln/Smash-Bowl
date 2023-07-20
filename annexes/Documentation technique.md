#Documentation technique de l'application

##Sommaire

1 [Reflexions initiales technologiques sur le sujet](#reflexions-initiales-technologiques-sur-le-sujet)

2 [Configuration de l environnement de travail](#configuration-de-l-environnement-de-travail)

3 [Modele conceptuel de donnees](#modele-conceptuel-de-donnees)

4 [Diagramme d utilisation et diagramme de sequence](#diagramme-d-utilisation-et-diagramme-de-sequence)

5 [Explication du plan de test](#explication-du-plan-de-test)

---



##Reflexions initiales technologiques sur le sujet


Mon choix de stack technique s'est porté sur PHP/MySQL. Initialement je comptai utiliser l'ORM Doctrine pour faciliter la gestion des données, évitant ainsi l'écriture de requêtes SQL basiques. J'ai finalement décidé de me concentrer sur le fonctionnement de mon application avec un usage natif de PHP. J'ai préféré HTML/CSS/JS pour leur compatibilité native et leur popularité, bénéficiant d'une large communauté de développeurs pour m'aider à résoudre les éventuels problèmes.

Bootstrap m'a grandement aidé à styliser l'application et c'est pour son gain de temps que je l'ai rapidement choisi. Bien que j'aurais aimé apprendre ReactJS, j'ai préféré me concentrer sur les versions mobile et web, en laissant de côté l'application bureautique pour l'instant. Je prévois de la développer ultérieurement avec Flutter ou Python.
J'ai opté pour Fly.io pour le déploiement, même si je ne le connaissais pas initialement, car j'ai découvert que le processus de déploiement était simplifié une fois que je me suis familiarisé avec la plateforme.

Ces choix ont été faits en fonction des besoins du client, en assurant une structure robuste et performante. Les données sont sécurisées et bien gérées, tandis que les interfaces sont réactives et adaptées aux trois types de plateformes demandées. L'ensemble de ces technologies complémentaires forme une stack technique cohérente pour répondre efficacement à la demande spécifiée.



##Configuration de l environnement de travail


J'ai commencé la configuration de mon environnement de travail par générer une paire de clé SSH privée/publique, en prenant le soin d'y ajouter une phrase secrète, via la commande :
```
$ ssh-keygen -t rsa -b 4096 -C "kcoadalen@gmail.com"
```

J'ai alors copié/collé le contenu de ma clé publique dans les paramètres de mon compte GitHub.
Aussi j'ai ajouté ma clé privée à l'agent SSH après avoir lancé ce dernier grâce aux commandes :
```
$ eval "$(ssh-agent -s)"
$ ssh-add ~/.ssh/id_rsa
```

Par le biai de mon environnement de développement (VS Code), j'ai par ailleurs cloné mon nouveau dépôt distant en local ainsi que configuré mes informations Git pour l'historique de chaque commit via les commandes suivantes :
```
$ git clone git@github.com:kcdln/Smash-Bowl.git
$ cd Smash-Bowl/
$ git config user.email "kcoadalen@gmail.com"
$ git config user.name "Kenny Coadalen"
```

Puis j'ai vérifié le tout à l'aide des commandes suivantes :
```
$ ssh-add -l
$ git remote -v
```

Ensuite j'ai configuré VS Code en y activant Emmet (très pratique pour tout ce qui est snippets et autres raccourcis de code) et en y intégrant tout un lot d'extensions utiles, telles que :
- [Bootstrap 5 & Font Awesome Snippets](https://marketplace.visualstudio.com/items?itemName=HansUXdev.bootstrap5-snippets)
- [Git Graph](https://marketplace.visualstudio.com/items?itemName=mhutchie.git-graph)
- [GitLens — Git supercharged](https://marketplace.visualstudio.com/items?itemName=eamodio.gitlens)
- [HTML CSS Support](https://marketplace.visualstudio.com/items?itemName=ecmel.vscode-html-css)
- [Live Server (Five Server)](https://marketplace.visualstudio.com/items?itemName=yandeu.five-server)
- [Markdown Preview Enhanced](https://marketplace.visualstudio.com/items?itemName=shd101wyy.markdown-preview-enhanced)
- [PHP Intelephense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client)
- [Prettier - Code formatter](https://marketplace.visualstudio.com/items?itemName=esbenp.prettier-vscode)
- [SonarLint](https://marketplace.visualstudio.com/items?itemName=SonarSource.sonarlint-vscode)



##Modele conceptuel de donnees


![Modèle Conceptuel de Données](../drafts/Modele_Conceptuel_de_Donnees.png)



##Diagramme d utilisation et diagramme de sequence


#### Diagramme de cas d'utilisation

###### Visiteur

![Diagramme de cas d'utilisation - Visiteur](../drafts/Diagramme_de_cas_d_utilisation_-_Visiteur.png)

###### Utilisateur

![Diagramme de cas d'utilisation - Utilisateur](../drafts/Diagramme_de_cas_d_utilisation_-_Utilisateur.png)

###### Commentateur

![Diagramme de cas d'utilisation - Commentateur](../drafts/Diagramme_de_cas_d_utilisation_-_Commentateur.png)

###### Administrateur

![Diagramme de cas d'utilisation - Administrateur](../drafts/Diagramme_de_cas_d_utilisation_-_Administrateur.png)

###### Super Administrateur

![Diagramme de cas d'utilisation - Super Administrateur](../drafts/Diagramme_de_cas_d_utilisation_-_Super_Administrateur.png)


#### Diagramme de séquence

###### Visiteur

![Diagramme de séquence - Visiteur](../drafts/Diagramme_de_sequence_-_Visiteur.png)

###### Utilisateur

![Diagramme de séquence - Utilisateur](../drafts/Diagramme_de_sequence_-_Utilisateur.png)

###### Commentateur

![Diagramme de séquence - Commentateur](../drafts/Diagramme_de_sequence_-_Commentateur.png)

###### Administrateur

![Diagramme de séquence - Administrateur](../drafts/Diagramme_de_sequence_-_Administrateur.png)



##Explication du plan de test


J'ai effectué des tests, notamment applicatifs et d'ergonomie, pour chaque fonctionnalité de l'application. Mon plan était de vérifier par exemple en priorité le rendu sur mobile tout en vérifiant simultanément celui de la version web et sur les différents supports existants tels que les tablettes.

Ces tests m'ont permis de garantir que l'application est entièrement responsive, peu importe les dimensions de l'appareil utilisé. Bien que cela prenne plus de temps dans le développement, c'est essentiel pour éviter les problèmes et les pertes de temps à l'avenir. La rigueur de ces tests garantit une expérience utilisateur fluide sur tous les appareils.
