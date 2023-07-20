<?php $sRelativePath = '../../../'; ?>
<?php $sAbsolutePath = __DIR__ . '/' . $sRelativePath; ?>
<?php require_once $sAbsolutePath . 'src/classes/DBConnectionSingleton.php'; ?>
<?php
    $iIdUser = 2; //TODO replace this hard-coded value with a session ID
    
    // Retrieve id_match to display all details about it
    $iIdMatch = $_GET['id'] ?? 1; //TODO replace this hard-coded value with a GET parameter
    /* if (isset($_GET['id']) && (int) $_GET['id'] > 0) {
        $iIdMatch = (int) $_GET['id'];
    } else {
        http_response_code(503); // Error code 503 Service Unavailable
        $sRedirectionUrl = $_SERVER['HTTP_REFERER'] ?? '/';

        header('Location: ' . $sRedirectionUrl);
    } */
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Smash Bowl</title>

        <!-- Import CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link href="<?= $sRelativePath; ?>src/assets/css/main.css" rel="stylesheet">
        <link href="<?= $sRelativePath; ?>src/assets/css/match/details.css" rel="stylesheet">
    </head>
    <body>
        <!-- Header & Nav -->
        <?php include_once $sAbsolutePath . 'src/widgets/header.php'; ?>
        
        <main>
            <div class="p-0 px-sm-3">
                <h2 class="d-none d-sm-block">Détails du match</h2>

            <?php
                $database = DBConnectionSingleton::getInstance();
                $connection = $database->getConnection();
                
                $sQuery = "
                    SELECT
                        M.id_match, M.date_start_at, M.hour_start_at, M.hour_end_at, M.status, M.weather, M.id_team1, M.id_team2, M.score_team1, M.score_team2,
                        T1.name AS 'name_team1', T2.name AS 'name_team2',
                        B.odds_team1, B.odds_team2,
                        H.id_team, H.amount
                    FROM smash_bowl.match M
                    INNER JOIN team T1 ON T1.id_team = M.id_team1
                    INNER JOIN team T2 ON T2.id_team = M.id_team2
                    LEFT JOIN bet B ON B.id_match = M.id_match
                    LEFT JOIN userbethistoric H ON H.id_bet = B.id_bet AND H.id_user = $iIdUser
                    WHERE M.id_match = $iIdMatch
                ";
                $statement = $connection->query($sQuery);
                $match = $statement->fetch(PDO::FETCH_ASSOC);
                
                $bMatchInProgress = $match['status'] === 'IN_PROGRESS';
                
                $dDateStart = new DateTimeImmutable($match['date_start_at'] . $match['hour_start_at']);
                $dDateEnd = new DateTimeImmutable($match['date_start_at'] . $match['hour_end_at']);
                
                $bHasUserBet = (bool) ($match['id_team'] && $match['amount']);
                if ($bHasUserBet) {
                    $sBetUserTeamName = $match['id_team'] === $match['id_team2'] ? $match['name_team2'] : $match['name_team1'];
                    $fOddsOfBetTeam = $match['id_team'] === $match['id_team2'] ? $match['odds_team2'] : $match['odds_team1'];
                    $fPotentialGain = number_format(($match['amount'] * $fOddsOfBetTeam) - $match['amount'], 2, '.', '');
                }
                
                
                
                $sQuery = "
                    SELECT P.firstname, P.lastname, P.id_team, P.jersey_number
                    FROM player P
                    WHERE P.id_team IN (" . $match['id_team1'] . ", " . $match['id_team2'] . ")
                    ORDER BY P.jersey_number
                ";
                $statement = $connection->query($sQuery);
                $aPlayersOfBothTeams = $statement->fetchAll(PDO::FETCH_ASSOC);
                $aCompositionTeam1 = array_values(array_filter($aPlayersOfBothTeams, fn($p) => $p['id_team'] === $match['id_team1']));
                $aCompositionTeam2 = array_values(array_filter($aPlayersOfBothTeams, fn($p) => $p['id_team'] === $match['id_team2']));
                
                
                
                $sQuery = "
                    SELECT C.short_description, C.long_description, C.created_at
                    FROM comment C
                    WHERE C.id_match = $iIdMatch
                    ORDER BY C.created_at
                ";
                $statement = $connection->query($sQuery);
                $aComments = $statement->fetchAll(PDO::FETCH_ASSOC);
            ?>

                <section>
                    <article class="<?php if ($bMatchInProgress): ?>match-in-progress<?php endif; ?> d-flex justify-content-center align-items-center flex-wrap">
                        <!-- Teams names -->
                        <div class="container">
                            <div class="body-bold row justify-content-center align-items-center">
                                <div class="col-5 col-md-4 col-lg-3 text-end"><?= $match['name_team1']; ?></div>
                                <div class="col-2 body-regular text-center">VS</div>
                                <div class="col-5 col-md-4 col-lg-3"><?= $match['name_team2']; ?></div>
                            </div>
                        </div>
                        <!-- Scores -->
                        <div class="container">
                            <div class="as-h2 row justify-content-center">
                                <div class="col-5 col-md-4 col-lg-3"><?= $match['score_team1']; ?></div>
                                <div class="col-1">-</div>
                                <div class="col-5 col-md-4 col-lg-3"><?= $match['score_team2']; ?></div>
                            </div>
                        </div>
                        <!-- Hours -->
                        <div class="container">
                            <div class="row justify-content-end justify-content-md-evenly">
                                <p class="d-none d-md-block col-5 col-md-4 col-lg-3 mb-0 text-end">Météo prévue : <span><?= $match['weather']; ?></span></p>
                                <p class="col-5 col-md-4 col-lg-3 mb-0">
                                    Fin prévue : <time datetime="<?= $dDateEnd->format('d-m-Y H:i:s'); ?>"><?= $dDateEnd->format('H\hi'); ?></time>
                                </p>
                            </div>
                        </div>
                    </article>
                    
                    <!-- Mobile only -->
                    <div class="container-fluid d-block d-md-none bg-color-neutral-400">
                        <div class="row">
                            <div class="col-12">
                                <?php if ($bHasUserBet): ?>
                                <p class="mb-1"><span class="body-bold"><?= number_format($match['amount'], 2, '.', ''); ?>€ misé</span> sur "<?= $sBetUserTeamName; ?>"</p>
                                <p class="mb-0"><span class="body-bold"><?= $fPotentialGain; ?>€ de gain</span> potentiel (côte : <?= number_format($fOddsOfBetTeam, 2, '.', ''); ?>)</p>
                                <?php else: ?>
                                <p class="my-1 text-center"><span class="body-bold">Pas de mise enregistrée pour ce match</span></p>
                                <p class="text-center">Veuillez placer une mise depuis notre application web sur cette même page</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                
                    <!-- Desktop only -->
                    <div class="container-fluid d-none d-md-block">
                        <!-- Bet button & odds -->
                        <div class="row bg-color-neutral-400 align-items-center text-center">
                            <div class="col-5">
                                <p class="mb-0">Côte de l'équipe "<?= $match['name_team1']; ?>"</p>
                                <p class="body-bold mb-0"><?= number_format($match['odds_team1'], 2, '.', ''); ?></p>
                            </div>
                            <div class="col-2">
                                <button class="as-h3 btn" type="button" data-bs-toggle="modal" data-bs-target="#modal-user-bet">Miser</button>

                                <!-- Modal - User bet -->
                                <div id="modal-user-bet" class="modal fade">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Miser sur votre équipe favorite</h4>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"aria-label="Close"></button>
                                            </div>
                                            <form id="form-user-bet" class="needs-validation custom-needs-at-least-one-input" action="" method="post" novalidate>
                                                <div class="modal-body">
                                                    <div class="body-bold row justify-content-between align-items-center">
                                                        <div class="col-5"><?= $match['name_team1']; ?></div>
                                                        <div class="col-1 p-0 body-regular text-center">VS</div>
                                                        <div class="col-5"><?= $match['name_team2']; ?></div>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-4">
                                                            <label for="user-bet-team1">Mise</label>
                                                            <input id="user-bet-team1" class="form-control w-100" type="number" name="user-bet-team1" <?php if ($bHasUserBet && $match['id_team'] === $match['id_team1']): ?>value="<?= $match['amount']; ?>"<?php endif; ?> min="0.01" step="0.01" required>
                                                        </div>
                                                        <div class="col-2 border-start border-end">
                                                            <label>Côte</label>
                                                            <div class="body-bold"><?= number_format($match['odds_team1'], 2, '.', ''); ?></div>
                                                        </div>
                                                        <div class="col-2 border-start border-end">
                                                            <label>Côte</label>
                                                            <div class="body-bold"><?= number_format($match['odds_team2'], 2, '.', ''); ?></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="user-bet-team2">Mise</label>
                                                            <input id="user-bet-team2" class="form-control w-100" type="number" name="user-bet-team2" <?php if ($bHasUserBet && $match['id_team'] === $match['id_team2']): ?>value="<?= $match['amount']; ?>"<?php endif; ?> min="0.01" step="0.01" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="invisible text-danger">Veuillez miser sur au moins une des deux équipes</div>
                                                    <button class="btn" type="submit">Miser</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <p class="mb-0">Côte de l'équipe "<?= $match['name_team2']; ?>"</p>
                                <p class="body-bold mb-0"><?= number_format($match['odds_team2'], 2, '.', ''); ?></p>
                            </div>
                        </div>
                        
                        <!-- Teams composition -->
                        <h2>Compositions d'équipe</h2>
                        <div class="row justify-content-center">
                            <div class="col-4 col-xxl-3">
                            <?php foreach ($aCompositionTeam1 as $k => $compo1): ?>
                                <?php $bOneOnTwo = $k % 2 === 0; ?>
                                
                                <div class="team-player row align-items-center">
                                    <?php if ($bOneOnTwo): ?>
                                        <div class="col-2 d-flex justify-content-center">
                                        <p class="body-bold"><?= $compo1['jersey_number']; ?></p>
                                        <img src="<?= $sRelativePath; ?>src/assets/img/player_jersey.jpg" alt="Maillot de joueur" width="50" loading="lazy">
                                    </div>
                                <?php endif; ?>

                                    <div class="col-10<?php if (!$bOneOnTwo): ?> text-end<?php endif; ?>"><p class="d-inline-block mb-0"><?= $compo1['firstname']; ?> <?= $compo1['lastname']; ?></p></div>
                                        
                                <?php if (!$bOneOnTwo): ?>
                                    <div class="col-2 d-flex justify-content-center">
                                        <p class="body-bold"><?= $compo1['jersey_number']; ?></p>
                                        <img src="<?= $sRelativePath; ?>src/assets/img/player_jersey.jpg" alt="Maillot de joueur" width="50" loading="lazy">
                                    </div>
                                <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                            </div>
                            <div class="col-1"></div>
                            <div id="teams-composition-separator" class="col-1 d-flex justify-content-center align-items-center border-start border-end">
                                <img src="<?= $sRelativePath; ?>src/assets/img/lombardi-trophy.png" alt="Trophée Vince-Lombardi">
                            </div>
                            <div class="col-1"></div>
                            <div class="col-4 col-xxl-3">
                            <?php foreach ($aCompositionTeam2 as $k => $compo2): ?>
                                <?php $bOneOnTwo = $k % 2 !== 0; ?>
                                
                                <div class="team-player row align-items-center">
                                    <?php if ($bOneOnTwo): ?>
                                        <div class="col-2 d-flex justify-content-center">
                                        <p class="body-bold"><?= $compo2['jersey_number']; ?></p>
                                        <img src="<?= $sRelativePath; ?>src/assets/img/player_jersey.jpg" alt="Maillot de joueur" width="50" loading="lazy">
                                    </div>
                                <?php endif; ?>

                                    <div class="col-10<?php if (!$bOneOnTwo): ?> text-end<?php endif; ?>"><p class="d-inline-block mb-0"><?= $compo2['firstname']; ?> <?= $compo2['lastname']; ?></p></div>
                                        
                                <?php if (!$bOneOnTwo): ?>
                                    <div class="col-2 d-flex justify-content-center">
                                        <p class="body-bold"><?= $compo2['jersey_number']; ?></p>
                                        <img src="<?= $sRelativePath; ?>src/assets/img/player_jersey.jpg" alt="Maillot de joueur" width="50" loading="lazy">
                                    </div>
                                <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            
            <!-- Comments -->
            <h2 class="mt-2">Commentaires</h2>
            
            <div class="container bg-color-neutral-400 mb-2 g-md-5 g-xl-0">
                <div class="row pt-3 mx-1 mx-md-0">
                    <?php if ($aComments): ?>
                    <?php foreach ($aComments as $comment): ?>
                        <?php $dCreatedDate = new DateTimeImmutable($comment['created_at']); ?>
                    
                    <div class="col-2 col-md-1 text-md-end">
                        <time class="body-bold" datetime="<?= $dCreatedDate->format('d-m-Y H:i:s'); ?>"><?= $dCreatedDate->format('H\hi'); ?></time>
                    </div>
                    <div class="col-10 col-md-11">
                        <p><?= $comment['long_description'] ?? $comment['short_description']; ?></p>
                    </div>
                    
                    <?php endforeach; ?>
                    <?php else: ?>
                    <p class="my-1 text-center"><span class="body-bold">Ce match n'a pas de commentaires</span></p>
                    <p class="text-center">Nos commentateurs sont prêts à entamer cette rubrique dès le début du match</p>
                    <?php endif; ?>
                </div>
            </div>
        </main>
        
        <footer class="container-fluid d-block d-md-none sticky-bottom as-h3 p-3">
            <a class="link-underline link-underline-opacity-0" href="src/views/match/list.php">
                <div class="row">
                    <div class="col-12">
                        <img src="<?= $sRelativePath; ?>src/assets/icon/arrow-left-short.svg" alt="Flèche gauche">
                        <p class="d-inline-block as-h3 m-0">Retour à la liste</p>
                    </div>
                </div>
            </a>
        </footer>

        <!-- Import JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script src="<?= $sRelativePath; ?>src/assets/js/form.js"></script>
    </body>
</html>
