<?php $sRelativePath = '../../../'; ?>
<?php $sAbsolutePath = __DIR__ . '/' . $sRelativePath; ?>

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
                
                <section>
                    <article class="match-in-progress d-flex justify-content-center align-items-center flex-wrap">
                        <!-- Teams names -->
                        <div class="container">
                            <div class="body-bold row justify-content-center align-items-center">
                                <div class="col-5 col-md-4 col-lg-3">Falcons de l'Atlantique</div>
                                <div class="col-2 text-center">VS.</div>
                                <div class="col-5 col-md-4 col-lg-3">Éléphants de l'Est</div>
                            </div>
                        </div>
                        <!-- Scores -->
                        <div class="container">
                            <div class="as-h2 row justify-content-center">
                                <div class="col-5 col-md-4 col-lg-3">5</div>
                                <div class="col-2">-</div>
                                <div class="col-5 col-md-4 col-lg-3">7</div>
                            </div>
                        </div>
                        <!-- Hours -->
                        <div class="container">
                            <div class="row justify-content-end justify-content-md-evenly">
                                <p class="d-none d-md-block col-5 col-md-4 col-lg-3 mb-0">Météo prévue : <span>Ensoleillé</span></p>
                                <p class="col-5 col-md-4 col-lg-3 mb-0">Fin prévue : <time datetime="08-07-2023 21:15:00">21h15</time></p>
                            </div>
                        </div>
                    </article>
                    
                    <!-- Mobile only -->
                    <div class="container-fluid d-block d-md-none bg-color-neutral-400">
                        <div class="row">
                            <div class="col-12">
                                <p class="mb-1"><span class="body-bold">10,00€ misé</span> sur : Falcons de l'Atlantique</p>
                                <p class="mb-0"><span class="body-bold">30,00€ de gain</span> potentiel</p>
                            </div>
                        </div>
                    </div>
                
                    <!-- Desktop only -->
                    <div class="container-fluid d-none d-md-block">
                        <!-- Bet button & odds -->
                        <div class="row bg-color-neutral-400 align-items-center text-center">
                            <div class="col-5">
                                <p class="mb-0">Côte de l'équipe "Falcons de l'Atlantique"</p>
                                <p class="body-bold mb-0">4.0</p>
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
                                                        <div class="col-5">Falcons de l'Atlantique</div>
                                                        <div class="col-1 p-0 text-center">VS.</div>
                                                        <div class="col-5">Éléphants de l'Est</div>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-4">
                                                            <label for="user-bet-team1">Mise</label>
                                                            <input id="user-bet-team1" class="form-control w-100" type="number" name="user-bet-team1" min="0.01" step="0.01" required>
                                                        </div>
                                                        <div class="col-2 border-start border-end">
                                                            <label>Côte</label>
                                                            <div class="body-bold">4.0</div>
                                                        </div>
                                                        <div class="col-2 border-start border-end">
                                                            <label>Côte</label>
                                                            <div class="body-bold">1.4</div>
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="user-bet-team2">Mise</label>
                                                            <input id="user-bet-team2" class="form-control w-100" type="number" name="user-bet-team2" min="0.01" step="0.01" required>
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
                                <p class="mb-0">Côte de l'équipe "Éléphants de l'Est"</p>
                                <p class="body-bold mb-0">1.4</p>
                            </div>
                        </div>
                        
                        <!-- Teams composition -->
                        <h2>Compositions d'équipe</h2>
                        <div class="row justify-content-center">
                            <div class="col-4 col-md-3">
                                <p>Andrew Reed</p>
                                <p>Antonio Johnson</p>
                                <p>Adam Stephenson</p>
                                <p>Daniel Waller</p>
                                <p>Cody Gray</p>
                            </div>
                            <div class="col-1"></div>
                            <div id="teams-composition-separator" class="col-1 d-flex justify-content-center align-items-center border-start border-end">
                                <img src="<?= $sRelativePath; ?>src/assets/img/lombardi-trophy.png" alt="Trophée Vince-Lombardi">
                            </div>
                            <div class="col-1"></div>
                            <div class="col-4 col-md-3">
                                <p>Jason Martin</p>
                                <p>Jeffrey Howard</p>
                                <p>Andrew Walker</p>
                                <p>Joseph Carter</p>
                                <p>Steven Reilly</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            
            <!-- Comments -->
            <h2 class="mt-2">Commentaires</h2>
            
            <div class="container bg-color-neutral-400 mb-2 g-md-5 g-xl-0">
                <div class="row pt-3 mx-1 mx-md-0">
                    <div class="col-2 col-md-1 text-md-end">
                        <time class="body-bold" datetime="14-07-2023 20:15:00">20h15</time>
                    </div>
                    <div class="col-10 col-md-11">
                        <p>Le Super Bowl a commencé sur les chapeaux de roue avec une action intense dès le coup d'envoi.</p>
                    </div>
                    <div class="col-2 col-md-1 text-md-end">
                        <time class="body-bold" datetime="14-07-2023 20:20:00">20h20</time>
                    </div>
                    <div class="col-10 col-md-11">
                        <p>L'équipe 1 a marqué un touchdown spectaculaire grâce à une passe précise.</p>
                    </div>
                    <div class="col-2 col-md-1 text-md-end">
                        <time class="body-bold" datetime="14-07-2023 20:23:00">20h23</time>
                    </div>
                    <div class="col-10 col-md-11">
                        <p>L'équipe 2 ne s'est pas laissée faire et a répondu avec un touchdown puissant.</p>
                    </div>
                    <div class="col-2 col-md-1 text-md-end">
                        <time class="body-bold" datetime="14-07-2023 20:34:00">20h34</time>
                    </div>
                    <div class="col-10 col-md-11">
                        <p>Interception cruciale de l'équipe 1</p>
                    </div>
                    <div class="col-2 col-md-1 text-md-end">
                        <time class="body-bold" datetime="14-07-2023 20:36:00">20h36</time>
                    </div>
                    <div class="col-10 col-md-11">
                        <p>L'équipe 1 a converti un field goal pour ajouter des points à leur avance.</p>
                    </div>
                    <div class="col-2 col-md-1 text-md-end">
                        <time class="body-bold" datetime="14-07-2023 20:43:00">20h43</time>
                    </div>
                    <div class="col-10 col-md-11">
                        <p>L'équipe 2 a réalisé un énorme retour avec une série de touchdowns successifs, renversant complètement la situation.</p>
                    </div>
                    <div class="col-2 col-md-1 text-md-end">
                        <time class="body-bold" datetime="14-07-2023 20:47:00">20h47</time>
                    </div>
                    <div class="col-10 col-md-11">
                        <p>Superbe jeu défensif de l'équipe 2</p>
                    </div>
                </div>
            </div>
        </main>
        
        <footer class="container-fluid d-block d-md-none sticky-bottom as-h3 p-3">
            <a class="link-underline link-underline-opacity-0" href="src/views/match/list.php">
                <div class="row">
                    <div class="col-12">
                        <img src="src/assets/icon/arrow-left-short.svg" alt="Flèche gauche">
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