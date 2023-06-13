/* Intégration des données en base */

/* Populate de la table `user` ("Utilisateurs") */
INSERT INTO `user` (`firstname`, `lastname`, `email`, `password`) VALUES
    ('John', 'Doe', 'john.doe@e.mail', '82f7e5c472d283d372e2102f61c049e7445eebb1');

INSERT INTO `user` (`firstname`, `lastname`, `email`, `password`, `role`) VALUES
    ('Jean', 'Porte', 'jean.porte@email.fr', 'dbeba0185a787a65073a59ca01f27053bb69fc16', 'USER'),
    ('Jacques', 'Uze', 'jacques.uze@email.de', 'e3ef7bdf071bdac0823ac01c78c5c3830d99ded7', 'COMMENTATOR'),
    ('Phil', 'Hature', 'phil.hature@email.en', 'b1580c7bc04d86bb312b8ba32ea4ac6ec4839345', 'ADMINISTRATOR');

INSERT INTO `user` (`firstname`, `lastname`, `email`, `password`, `role`) VALUES
    ('SuperBowl', 'Admin', 'superbowl.admin@email.guru', '3eff4807eabe7c5e360aed2d0e4a9433e7c302ce', 'VISITOR,USER,COMMENTATOR,ADMINISTRATOR');

/* Populate de la table `team` ("Equipes") */
INSERT INTO `team` (`name`, `country`) VALUES
    ('Falcons de l''Atlantique', 'États-Unis'),
    ('Tigres de la Ville', 'Canada'),
    ('Éléphants de l''Est', 'France'),
    ('Chevaliers du Nord', 'Suède'),
    ('Aigles de la Montagne', 'Suisse'),
    ('Renards du Sud', 'Australie'),
    ('Loups de l''Ouest', 'États-Unis'),
    ('Ours Grizzlis', 'Canada'),
    ('Faucons Cendrés', 'France'),
    ('Dragons de Feu', 'Chine');

/* Populate de la table `player` ("Joueurs") */
SET @t := 0; SET @n := 0;
INSERT INTO `player` (`id_team`, `jersey_number`, `firstname`, `lastname`)
VALUES
	(@t:=(@t%10)+1, @n:=(@n%99)+1, 'Andrew', 'Reed'),
	(@t:=(@t%10)+1, @n:=(@n%99)+1, 'Antonio', 'Johnson'),
	(@t:=(@t%10)+1, @n:=(@n%99)+1, 'Adam', 'Stephenson'),
	(@t:=(@t%10)+1, @n:=(@n%99)+1, 'Daniel', 'Waller'),
	(@t:=(@t%10)+1, @n:=(@n%99)+1, 'Cody', 'Gray'),
	(@t:=(@t%10)+1, @n:=(@n%99)+1, 'Jason', 'Martin'),
	(@t:=(@t%10)+1, @n:=(@n%99)+1, 'Jeffrey', 'Howard'),
	(@t:=(@t%10)+1, @n:=(@n%99)+1, 'Andrew', 'Walker'),
	(@t:=(@t%10)+1, @n:=(@n%99)+1, 'Joseph', 'Carter'),
    /* ... */
	(@t:=(@t%10)+1, @n:=(@n%99)+1, 'Steven', 'Reilly');

/* Populate de la table `match` ("Matchs") */
INSERT INTO `match` (`id_team1`, `id_team2`, `date_start_at`, `hour_start_at`, `status`, `weather`)
SELECT t1.`id_team`, t2.`id_team`, NOW() + INTERVAL (FLOOR(RAND() * 10) + 1) DAY, 
       MAKETIME(FLOOR(RAND() * 24), FLOOR(RAND() * 60), FLOOR(RAND() * 60)),
       'TO_COME',
       CASE FLOOR(RAND() * 7)
           WHEN 0 THEN 'CLEAR'
           WHEN 1 THEN 'SUNNY'
           WHEN 2 THEN 'CLOUDY'
           WHEN 3 THEN 'RAINY'
           WHEN 4 THEN 'STORMY'
           WHEN 5 THEN 'SNOWY'
           WHEN 6 THEN 'FOGGY'
       END
FROM `team` t1
JOIN `team` t2 ON t1.`id_team` <> t2.`id_team`;

/* Populate de la table `bet` ("Paris disponibles") */
INSERT INTO `bet` (`id_match`, `odds_team_1`, `odds_team_2`, `status`)
SELECT `id_match`, ROUND(RAND() * 10 + 1, 2), ROUND(RAND() * 10 + 1, 2), 'READY'
FROM `match`;

/* Populate de la table `userBetHistoric` ("Historique des mises des utilisateurs") */
INSERT INTO `userbethistoric` (`id_bet`, `id_user`, `id_team`, `amount`)
SELECT b.`id_bet`, u.`id_user`, t.`id_team`, ROUND(RAND() * 1000, 2)
FROM `bet` AS b
JOIN `match` AS m ON m.`id_match` = b.`id_match`
JOIN `team` AS t ON t.`id_team` = m.`id_team1` OR t.`id_team` = m.`id_team2`
CROSS JOIN `user` AS u
LIMIT 100;

/* Populate de la table `comment` ("Commentaires") */
INSERT INTO comment (id_user, id_match, short_description, long_description, created_at)
VALUES
(3, 1, 'Incroyable début de match !', 'Le Super Bowl a commencé sur les chapeaux de roue avec une action intense dès le coup d''envoi.', '2023-02-05 18:00:00'),
(3, 1, 'Touchdown spectaculaire de l''équipe 1', 'L''équipe 1 a marqué un touchdown spectaculaire grâce à une passe précise.', '2023-02-05 18:10:00'),
(3, 1, 'Réplique immédiate de l''équipe 2', 'L''équipe 2 ne s''est pas laissée faire et a répondu avec un touchdown puissant.', '2023-02-05 18:15:00'),
(3, 1, 'Interception cruciale de l''équipe 1', NULL, '2023-02-05 18:25:00'),
(5, 1, 'Field goal réussi pour l''équipe 1', 'L''équipe 1 a converti un field goal pour ajouter des points à leur avance.', '2023-02-05 18:30:00'),
(3, 1, 'Touchdown de l''équipe 1 juste avant la mi-temps', 'L''équipe 1 a réussi un touchdown crucial juste avant la mi-temps, leur donnant une confortable avance.', '2023-02-05 18:45:00'),
(3, 1, 'Superbe jeu défensif de l''équipe 2', 'L''équipe 2 a réalisé une série de jeux défensifs impressionnants pour stopper l''attaque de l''équipe 1.', '2023-02-05 19:00:00'),
(3, 1, 'Nouveau touchdown de l''équipe 1', 'L''équipe 1 a trouvé une faille dans la défense de l''équipe 2 et a marqué un autre touchdown.', '2023-02-05 19:15:00'),
(3, 1, 'Énorme retour de l''équipe 2', 'L''équipe 2 a réalisé un énorme retour avec une série de touchdowns successifs, renversant complètement la situation.', '2023-02-05 19:30:00'),
(5, 1, 'Touchdown de la victoire pour l''équipe 1', 'L''équipe 1 a réussi un dernier touchdown dans les dernières secondes du match, scellant leur victoire.', '2023-02-05 19:45:00'),
(3, 2, 'Début explosif du Super Bowl', 'Le Super Bowl a commencé avec une série d''actions explosives de la part des deux équipes.', '2023-02-05 18:00:00'),
(3, 2, 'Touchdown de l''équipe 3', 'L''équipe 3 a marqué un touchdown spectaculaire, donnant le ton du match.', '2023-02-05 18:10:00'),
(3, 2, 'Réponse immédiate de l''équipe 4', 'L''équipe 4 a répondu rapidement avec un touchdown éclatant.', '2023-02-05 18:15:00'),
(3, 2, 'Belle interception de l''équipe 4', NULL, '2023-02-05 18:25:00'),
(5, 2, 'Field goal réussi pour l''équipe 3', 'L''équipe 3 a converti un field goal pour prendre l''avantage au score.', '2023-02-05 18:30:00'),
(3, 2, 'Touchdown de l''équipe 3 avant la mi-temps', 'L''équipe 3 a réussi un touchdown crucial juste avant la mi-temps, prenant une avance confortable.', '2023-02-05 18:45:00'),
(3, 2, 'Superbe jeu défensif de l''équipe 4', 'L''équipe 4 a réalisé une série de jeux défensifs impressionnants pour contrer l''offensive de l''équipe 3.', '2023-02-05 19:00:00'),
(3, 2, 'Nouveau touchdown de l''équipe 3', 'L''équipe 3 a exploité une faille dans la défense de l''équipe 4 et a marqué un autre touchdown.', '2023-02-05 19:15:00'),
(3, 2, 'Remontée fantastique de l''équipe 4', 'L''équipe 4 a réalisé une remontée incroyable avec une série de touchdowns successifs, renversant complètement le match.', '2023-02-05 19:30:00'),
(5, 2, 'Touchdown de la victoire pour l''équipe 3', 'L''équipe 3 a réussi un dernier touchdown décisif dans les derniers instants du match, remportant la victoire.', '2023-02-05 19:45:00');
