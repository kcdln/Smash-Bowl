
##Gestion de projet

La gestion du projet s'est débuté par un listing à la main des différentes phases du projet. Dans la foulée il y a eu l'élaboration d'un [diagramme de Gantt](./drafts/GANTT SmashBowl.gan) que j'ai réalisé, à l'aide de GanttProject, avec des échéances optimistes mais réalistes, du fait du délai plutôt serré dont j'avais à ma disposition. C'est ce qui m'a permi rapidemment d'évaluer l'étendue des grandes phases du projet.

J'ai par la suite préféré créer et suivre un tableau Kanban sous Jira. Il est découpé de façon plutôt classique en 4 colonnes qui sont :
- Backlog : Cette colonne recense au départ l'ensemble des tâches à réaliser et si possible classées par ordre de priorité et/ou d'importance.
- TODO : Ici sont présentées les tâches qui sont à effectuées dans le jalon en court - on parlerait d'ailleurs de sprint dans une méthodologie Agile. J'y ai configuré cette colonne pour que 6 tâches maximum puissent être dans cette colonne en même temps, ceci afin de ne pas surcharger l'outil et de se concentrer sur un ensemble de tâches avant de passer aux suivantes.
- In progress : Les fonctionnalités en cours de développement et de tests sont catégorisées dans cette colonne. Le nombre maximum de tâches qu'on peut mettre dans cette colonne est de 4 pour les mêmes raisons que pour la colonne TODO.
- Done : Toutes les tâches terminées et testées, ou même les tâches annulées, se retrouvent listées ici afin de marquer celles-ci comme traitées définitivement.

Tout au long du projet, j'ai prêté une attention particulière à ce que mon outil de gestion de projet soit toujours à jour, afin de visualiser au mieux où j'en étais et ce qu'il m'attendait.
J'ai par exemple paramétré mon tableau Kanban pour qu'il affiche sur chaque tâche un aperçu du nombre de jours écoulés depuis que le ticket est dans la même colonne, un pourcentage d'avancement entre l'estimation originale et le temps réel passé sur celui-ci.
J'ai donc pu effectué le suivi et le contrôle de mon projet grâce à cet outil assez complet d'Atlassian.

Durant la phase de développement, j'ai essayé de mettre en place de bonnes pratiques.
Que ce soit dans les recommandations standards de PHP ([PSR](https://www.php-fig.org/psr/)) ou même dans l'usage de Git : 1 commit par fonctionnalité, ne pas faire de commit de fin de journée mais plutôt privilégier le stash, rédiger des messages de commit clairs et courts, etc.
J'ai aussi fait attention à commenter mon code aussi souvent que possible sans pour autant en faire trop : j'ai privilégié les commentaires courts mais qui expliquait pour quelle(s) raison(s) le code avait été écrit de cette manière plutôt que de résumer ce qu'il faisait.

Ce projet a été sincèrement agréable à gérer de façon autonome. Avec du recul, j'admets avoir pris de plus en plus de retard sur une grande partie des phases du projet. C'est principalement dû à ma façon de travailler qui veut que je termine complètement et de façon quasi définitive une fonctionnalité ou autre avant de pouvoir passer à la suite. Je comprends maintenant d'avantage l'intéret de traiter les étapes l'une après l'autre sans jamais déborder et de manière organisée afin de gagner en productivité et en maîtrise sur les délais de son projet.
