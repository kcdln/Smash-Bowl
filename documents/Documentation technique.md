##Sommaire
#####[Configuration de l'environnement de travail](#work-environment)

---

##Configuration de l'environnement de travail {#work-environment}
J'ai commencé la configuration de mon environnement de travail par générer une paire de clé SSH privée/publique via la commande :
```
$ ssh-keygen -t rsa -b 4096 -C "kcoadalen@gmail.com"
```

J'ai alors copié/collé le contenu de ma clé publique dans les paramètres de mon compte GitHub.
Aussi j'ai ajouté ma clé privée à l'agent SSH après avoir lancé ce dernier grace aux commandes :
```
$ eval "$(ssh-agent -s)"
$ ssh-add ~/.ssh/id_rsa
```

Par le biai de mon environnement de développement (VS Code), j'ai par ailleurs cloné mon dépôt distant en local ainsi que configuré mes informations Git pour l'historique de chaque commit via les commandes suivantes :
```
$ git clone git@github.com:kcdln/Smash-Bowl.git
$ git config user.email "kcoadalen@gmail.com"
$ git config user.name "Kenny C."
```

Puis vérifié le tout à l'aide des commandes suivantes :
```
$ ssh-add -l
$ git remote -v
```

Ensuite j'ai configuré VS Code en y intégrant un lot d'extensions utiles, telles que (pour ne citer que les plus utilisées) :
- [Bootstrap 4, Font awesome 4, Font Awesome 5 Free & Pro snippets](https://marketplace.visualstudio.com/items?itemName=thekalinga.bootstrap4-vscode)
- [Git Graph](https://marketplace.visualstudio.com/items?itemName=mhutchie.git-graph)
- [GitLens — Git supercharged](https://marketplace.visualstudio.com/items?itemName=eamodio.gitlens)
- [HTML CSS Support](https://marketplace.visualstudio.com/items?itemName=ecmel.vscode-html-css)
- [Live Server](https://marketplace.visualstudio.com/items?itemName=ritwickdey.LiveServer)
- [Markdown Preview Enhanced](https://marketplace.visualstudio.com/items?itemName=shd101wyy.markdown-preview-enhanced)
- [PHP Intelephense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client)
- [Prettier - Code formatter](https://marketplace.visualstudio.com/items?itemName=esbenp.prettier-vscode)
