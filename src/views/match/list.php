<?php $sRelativePath = '../../../'; ?>
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
        <link href="<?= $sRelativePath; ?>src/assets/css/match/list.css" rel="stylesheet">
    </head>
    <body>
        <!-- Header & Nav -->
        <?php include_once $sAbsolutePath . 'src/widgets/header.php'; ?>
        
        <main>
            <h2 class="d-none d-sm-block">Liste de tous les matchs</h2>
            
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
                    WHERE M.status <> 'CANCELED'
                    ORDER BY M.date_start_at, M.hour_start_at
                ";
                $statement = $connection->query($sQuery);
                $aMatches = $statement->fetchAll(PDO::FETCH_ASSOC);
                
                $aMatchesInProgress = array_filter($aMatches, fn($m) => $m['status'] === 'IN_PROGRESS');
                $aMatchesToCome = array_filter($aMatches, fn($m) => $m['status'] === 'TO_COME');
                $aMatchesFinished = array_filter($aMatches, fn($m) => $m['status'] === 'FINISHED');
            ?>
            
            <!-- Match in progress -->
            <section>
                <h3 class="section-title <?php if (count($aMatchesInProgress)): ?>d-none<?php endif; ?> d-sm-flex justify-content-center align-items-center"><span class="pulse d-none d-md-inline-block"></span>En cours</h3>
                <?php if (!count($aMatchesInProgress)): ?>
                <div class="no-result d-flex align-items-center p-3"><p class="container mb-0 text-center">Aucun match présent dans cette rubrique</p></div>
                
                <?php else: ?>
                    <?php foreach ($aMatchesInProgress as $m): ?>
                        <?php $dDateEnd = new DateTimeImmutable($m['date_start_at'] . $m['hour_end_at']); ?>

                <article class="match-in-progress d-flex justify-content-between align-items-center flex-wrap flex-md-nowrap">
                    <!-- Teams names -->
                    <div class="container col-md-6 m-md-0">
                        <div class="body-bold row justify-content-between align-items-center">
                            <div class="col-5 text-end"><?= $m['name_team1']; ?></div>
                            <div class="col-2 body-regular text-center">VS</div>
                            <div class="col-5"><?= $m['name_team2']; ?></div>
                        </div>
                    </div>
                    <!-- Scores -->
                    <div class="container col-md-2 m-md-0 text-center">
                        <div class="as-h2 row justify-content-between">
                            <div class="col-5 col-md-4"><?= $m['score_team1']; ?></div>
                            <div class="col-2 col-md-4">-</div>
                            <div class="col-5 col-md-4"><?= $m['score_team2']; ?></div>
                        </div>
                    </div>
                    <!-- Hours -->
                    <div class="container col-md-4 m-md-0">
                        <div class="row">
                            <p class="mb-0 text-end">
                                Fin prévue : <time datetime="<?= $dDateEnd->format('d-m-Y H:i:s'); ?>"><?= $dDateEnd->format('H\hi'); ?></time>
                            </p>
                        </div>
                    </div>
                </article>
                
                    <?php endforeach; ?>
                <?php endif; ?>
            </section>
            
            <!-- Match to come -->
            <section>
                <h3 class="section-title <?php if (count($aMatchesToCome)): ?>d-none<?php endif; ?> d-sm-block">À venir</h3>
                <?php if (!count($aMatchesToCome)): ?>
                <div class="no-result d-flex align-items-center p-3"><p class="container mb-0 text-center">Aucun match présent dans cette rubrique</p></div>

                <?php else: ?>
                    <?php foreach ($aMatchesToCome as $m): ?>
                        <?php $dDateStart = new DateTimeImmutable($m['date_start_at'] . $m['hour_start_at']); ?>
                        <?php $dDateEnd = new DateTimeImmutable($m['date_start_at'] . $m['hour_end_at']); ?>
                
                <article class="d-flex justify-content-between align-items-center flex-wrap">
                    <!-- Teams names -->
                    <div class="container col-md-6 m-md-0">
                        <div class="body-bold row justify-content-between align-items-center">
                            <div class="col-5 text-end"><?= $m['name_team1']; ?></div>
                            <div class="col-2 body-regular text-center">VS</div>
                            <div class="col-5"><?= $m['name_team2']; ?></div>
                        </div>
                    </div>
                    <!-- Date (mobile only) -->
                    <div class="container m-md-0 d-block d-md-none">
                        <div class="row">
                            <p class="mb-0">
                                Date du match : <time class="body-bold" datetime="<?= $dDateStart->format('d-m-Y'); ?>">Le <?= $dDateStart->format('d/m/Y'); ?></time>
                            </p>
                        </div>
                    </div>
                    <!-- Hours (mobile only) -->
                    <div class="container m-md-0 d-block d-md-none">
                        <div class="row justify-content-between">
                            <p class="col-6 mb-0 text-start">
                                Début : <time datetime="<?= $dDateStart->format('d-m-Y H:i:s'); ?>"><?= $dDateStart->format('H\hi'); ?></time>
                            </p>
                            <p class="col-6 mb-0 text-end">
                                Fin prévue : <time datetime="<?= $dDateEnd->format('d-m-Y H:i:s'); ?>"><?= $dDateEnd->format('H\hi'); ?></time>
                            </p>
                        </div>
                    </div>
                    <!-- Date & Hours (not on mobile) -->
                    <div class="container col-md-4 m-md-0 d-none d-md-block text-end">
                        <div class="row">
                            <p class="mb-0">
                                Le <time datetime="<?= $dDateStart->format('d-m-Y'); ?>"><?= $dDateStart->format('d/m/Y'); ?></time>
                                de <time datetime="<?= $dDateStart->format('d-m-Y H:i:s'); ?>"><?= $dDateStart->format('H\hi'); ?></time>
                                à <time datetime="<?= $dDateEnd->format('d-m-Y H:i:s'); ?>"><?= $dDateEnd->format('H\hi'); ?></time>
                            </p>
                        </div>
                    </div>
                </article>

                    <?php endforeach; ?>
                <?php endif; ?>
            </section>
            
            <!-- Match done -->
            <section>
                <h3 class="section-title <?php if (count($aMatchesFinished)): ?>d-none<?php endif; ?> d-sm-block">Terminé</h3>
                <?php if (!count($aMatchesFinished)): ?>
                <div class="no-result d-flex align-items-center p-3"><p class="container mb-0 text-center">Aucun match présent dans cette rubrique</p></div>

                <?php else: ?>
                    <?php foreach ($aMatchesFinished as $m): ?>
                        <?php $dDateStart = new DateTimeImmutable($m['date_start_at'] . $m['hour_start_at']); ?>
                        <?php $dDateEnd = new DateTimeImmutable($m['date_start_at'] . $m['hour_end_at']); ?>
                
                <article class="d-flex justify-content-between align-items-center flex-wrap">
                    <!-- Teams names -->
                    <div class="container col-md-6 m-md-0">
                        <div class="body-bold row justify-content-between align-items-center">
                            <div class="col-5 text-end"><?= $m['name_team1']; ?></div>
                            <div class="col-2 body-regular text-center">VS</div>
                            <div class="col-5"><?= $m['name_team2']; ?></div>
                        </div>
                    </div>
                    <!-- Scores -->
                    <div class="container col-md-2 m-md-0 text-center">
                        <div class="as-h2 row justify-content-between">
                            <div class="col-5 col-md-4"><?= $m['score_team1']; ?></div>
                            <div class="col-2 col-md-4">-</div>
                            <div class="col-5 col-md-4"><?= $m['score_team2']; ?></div>
                        </div>
                    </div>
                    <!-- Date & Hours -->
                    <div class="container col-md-4 m-md-0 text-center text-md-end">
                        <div class="row">
                            <p class="mb-0">
                                Le <time datetime="<?= $dDateStart->format('d-m-Y'); ?>"><?= $dDateStart->format('d/m/Y'); ?></time>
                                de <time datetime="<?= $dDateStart->format('d-m-Y H:i:s'); ?>"><?= $dDateStart->format('H\hi'); ?></time>
                                à <time datetime="<?= $dDateEnd->format('d-m-Y H:i:s'); ?>"><?= $dDateEnd->format('H\hi'); ?></time>
                            </p>
                        </div>
                    </div>
                </article>
                
                    <?php endforeach; ?>
                <?php endif; ?>
            </section>
        </main>

        <!-- Import JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>
