<?php $sRelativePath = ''; ?>
<?php $sAbsolutePath = __DIR__ . '/' . $sRelativePath; ?>
<?php require_once $sAbsolutePath . 'src/classes/DBConnectionSingleton.php'; ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Smash Bowl</title>
        
        <!-- Import CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link href="<?= $sRelativePath; ?>src/assets/css/main.css" rel="stylesheet">
        <link href="<?= $sRelativePath; ?>src/assets/css/index.css" rel="stylesheet">
    </head>
    <body>
        <script src="<?= $sRelativePath; ?>src/assets/js/redirect-on-mobile.js"></script>

        <!-- Header & Nav -->
        <?php include_once $sAbsolutePath . 'src/widgets/header.php'; ?>
        
        <main class="large-content">
            <!-- Event & app presentation -->
            <!-- @source picture not restricted by any rights on Pixabay (https://pixabay.com/fr/photos/football-am%C3%A9ricain-des-sports-63109/) -->
            <div class="container-fluid bg-image p-5" style="background-image: url('<?= $sRelativePath; ?>src/assets/img/super-bowl-presentation.jpg')">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-9 col-xl-8 col-xxl-7 bg-blur">
                        <h4>Bienvenue sur Smash Bowl, la destination ultime pour l'événement du Super Bowl !</h4>
                        <p>Rejoignez-nous pour célébrer la nouvelle édition de ce rendez-vous tant attendu. Préparez-vous à vivre des matchs passionnants, une action à couper le souffle et des moments inoubliables qui vous tiendront en haleine.</p>
                        <p>Sur Smash Bowl, nous vous proposons tous les matchs qui ont lieu lors de cette journée spéciale. Des rivalités intenses aux confrontations épiques, notre plateforme vous tient informé des scores en direct, des compositions d'équipes, des commentaires éclairés de nos experts et bien plus.</p>
                        <p>Êtes-vous prêt(e)s pour une expérience inoubliable ? Que l'aventure Smash Bowl commence !</p>
                    </div>
                </div>
            </div>
            
            <h2>Matchs du jour</h2>
            
            <?php
                $database = DBConnectionSingleton::getInstance();
                $connection = $database->getConnection();
                
                $sQuery = "
                    SELECT
                        M.id_match, M.date_start_at, M.hour_start_at, M.hour_end_at, M.status, M.score_team1, M.score_team2,
                        T1.name AS 'name_team1', T2.name AS 'name_team2'
                    FROM smash_bowl.match M
                    INNER JOIN team T1 ON T1.id_team = M.id_team1
                    INNER JOIN team T2 ON T2.id_team = M.id_team2
                    WHERE M.status = 'IN_PROGRESS' OR M.date_start_at = DATE_FORMAT(NOW(), '%Y-%m-%d')
                    ORDER BY FIELD(M.status, 'IN_PROGRESS') DESC, M.date_start_at, M.hour_start_at
                ";
                $statement = $connection->query($sQuery);
                $aMatches = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?>
            
            <section>
                <?php if (!count($aMatches)): ?>
                <div class="no-result">
                    <p class="text-center">Aucun match n'est prévu aujourd'hui, revenez dès demain.</p>
                    <p class="text-center">Vous pouvez aussi parcourir la liste de tous les matchs dans la rubrique "<a class="" href="<?= $sRelativePath; ?>src/views/match/list.php">Voir les matchs</a>".</p>
                </div>
                
                <?php else: ?>

                <div class="container">
                    <div class="row gx-5 gy-4 justify-content-evenly justify-content-xxl-between">

                    <?php foreach ($aMatches as $m): ?>
                        <?php $dDateStart = new DateTimeImmutable($m['date_start_at'] . $m['hour_start_at']); ?>
                        <?php $dDateEnd = new DateTimeImmutable($m['date_start_at'] . $m['hour_end_at']); ?>
                        <?php $bMatchInProgress = $m['status'] === 'IN_PROGRESS'; ?>
                    
                        <article class="<?php if ($bMatchInProgress): ?>match-in-progress<?php endif; ?> col-md-5 col-xxl-4 d-flex justify-content-between align-items-center flex-wrap">
                            <!-- Teams names -->
                            <div class="container">
                                <div class="body-bold row justify-content-between align-items-center">
                                    <div class="col-5 text-end"><?= $m['name_team1']; ?></div>
                                    <div class="col-2 body-regular text-center">VS</div>
                                    <div class="col-5"><?= $m['name_team2']; ?></div>
                                </div>
                            </div>
                            
                            <?php if ($bMatchInProgress): ?>
                            
                            <!-- Scores -->
                            <div class="container text-center">
                                <div class="as-h2 row justify-content-between">
                                    <div class="col-5"><?= $m['score_team1']; ?></div>
                                    <div class="col-2">-</div>
                                    <div class="col-5"><?= $m['score_team2']; ?></div>
                                </div>
                            </div>
                            <!-- Hours -->
                            <div class="container">
                                <div class="row">
                                    <p class="mb-0 text-end">
                                        Fin prévue : <time datetime="<?= $dDateEnd->format('d-m-Y H:i:s'); ?>"><?= $dDateEnd->format('H\hi'); ?></time>
                                    </p>
                                </div>
                            </div>
                            
                            <?php else: ?>
                            
                            <!-- Date & Hours -->
                            <div class="container text-end">
                                <div class="row">
                                    <p class="mb-0">
                                        Le <time datetime="<?= $dDateStart->format('d-m-Y'); ?>"><?= $dDateStart->format('d/m/Y'); ?></time>
                                        de <time datetime="<?= $dDateStart->format('d-m-Y H:i:s'); ?>"><?= $dDateStart->format('H\hi'); ?></time>
                                        à <time datetime="<?= $dDateEnd->format('d-m-Y H:i:s'); ?>"><?= $dDateEnd->format('H\hi'); ?></time>
                                    </p>
                                </div>
                            </div>
                            
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            </section>
        </main>

        <!-- Import JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>
