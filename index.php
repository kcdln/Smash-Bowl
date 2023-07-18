<?php $sRelativePath = ''; ?>
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
        <link href="<?= $sRelativePath; ?>src/assets/css/index.css" rel="stylesheet">
    </head>
    <body>
        <script src="<?= $sRelativePath; ?>src/assets/js/redirect-on-mobile.js"></script>

        <!-- Header & Nav -->
        <?php include_once $sAbsolutePath . 'src/widgets/header.php'; ?>

        
        <main class="large-content">
            <!-- Event & app presentation -->
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
            
            <section>
                <div class="no-result d-none">
                    <p class="text-center">Aucun match n'est prévu aujourd'hui, revenez dès demain.</p>
                    <p class="text-center">Vous pouvez aussi parcourir la liste de tous les matchs dans la rubrique "<a class="" href="<?= $sRelativePath; ?>src/views/match/list.php">Voir les matchs</a>".</p>
                </div>

                <div class="container">
                    <div class="row gx-5 gy-4 justify-content-evenly justify-content-xxl-between">
                    
                        <article class="match-in-progress col-md-5 col-xxl-4 d-flex justify-content-between align-items-center flex-wrap">
                            <!-- Teams names -->
                            <div class="container">
                                <div class="body-bold row justify-content-between align-items-center">
                                    <div class="col-5">Falcons de l'Atlantique</div>
                                    <div class="col-2">VS.</div>
                                    <div class="col-5">Éléphants de l'Est</div>
                                </div>
                            </div>
                            <!-- Scores -->
                            <div class="container text-center">
                                <div class="as-h2 row justify-content-between">
                                    <div class="col-5">5</div>
                                    <div class="col-2">-</div>
                                    <div class="col-5">7</div>
                                </div>
                            </div>
                            <!-- Hours -->
                            <div class="container">
                                <div class="row">
                                    <p class="mb-0 text-end">Fin prévue : <time datetime="08-07-2023 21:15:00">21h15</time></p>
                                </div>
                            </div>
                        </article>
                
                        <article class="match-in-progress col-md-5 col-xxl-4 d-flex justify-content-between align-items-center flex-wrap">
                            <!-- Teams names -->
                            <div class="container">
                                <div class="body-bold row justify-content-between align-items-center">
                                    <div class="col-5">Falcons de l'Atlantique</div>
                                    <div class="col-2 text-center">VS.</div>
                                    <div class="col-5">Éléphants de l'Est</div>
                                </div>
                            </div>
                            <!-- Scores -->
                            <div class="container text-center">
                                <div class="as-h2 row justify-content-between">
                                    <div class="col-5">5</div>
                                    <div class="col-2">-</div>
                                    <div class="col-5">7</div>
                                </div>
                            </div>
                            <!-- Hours -->
                            <div class="container">
                                <div class="row">
                                    <p class="mb-0 text-end">Fin prévue : <time datetime="08-07-2023 21:15:00">21h15</time></p>
                                </div>
                            </div>
                        </article>
                        
                        <article class="col-md-5 col-xxl-4 d-flex justify-content-between align-items-center flex-wrap">
                            <!-- Teams names -->
                            <div class="container">
                                <div class="body-bold row justify-content-between align-items-center">
                                    <div class="col-5">Tigres de la Ville</div>
                                    <div class="col-2 text-center">VS.</div>
                                    <div class="col-5">Ours Grizzlis</div>
                                </div>
                            </div>
                            <!--
                            <!-- Date (mobile only) - ->
                            <div class="container m-md-0 d-block d-md-none">
                                <div class="row">
                                    <p class="mb-0">Date du match : <time class="body-bold" datetime="14-07-2023">Le 14/07/2023</time></p>
                                </div>
                            </div>
                            <!-- Hours (mobile only) - ->
                            <div class="container m-md-0 d-block d-md-none">
                                <div class="row justify-content-between">
                                    <p class="col-6 mb-0 text-start">Début : <time datetime="14-07-2023 18:30:00">18h30</time></p>
                                    <p class="col-6 mb-0 text-end">Fin prévue : <time datetime="14-07-2023 19:30:00">19h30</time></p>
                                </div>
                            </div>
                            -->
                            <!-- Date & Hours (not on mobile) -->
                            <div class="container text-end">
                                <div class="row">
                                    <p class="mb-0">
                                        <time datetime="14-07-2023">Le 14/07/2023</time>
                                        <time datetime="14-07-2023 18:30:00">de 18h30</time>
                                        <time datetime="14-07-2023 19:30:00">à 19h30</time>
                                    </p>
                                </div>
                            </div>
                        </article>
                        
                        <article class="col-md-5 col-xxl-4 d-flex justify-content-between align-items-center flex-wrap">
                            <!-- Teams names -->
                            <div class="container">
                                <div class="body-bold row justify-content-between align-items-center">
                                    <div class="col-5">Tigres de la Ville</div>
                                    <div class="col-2 text-center">VS.</div>
                                    <div class="col-5">Ours Grizzlis</div>
                                </div>
                            </div>
                            <!--
                            <!-- Date (mobile only) - ->
                            <div class="container m-md-0 d-block d-md-none">
                                <div class="row">
                                    <p class="mb-0">Date du match : <time class="body-bold" datetime="14-07-2023">Le 14/07/2023</time></p>
                                </div>
                            </div>
                            <!-- Hours (mobile only) - ->
                            <div class="container m-md-0 d-block d-md-none">
                                <div class="row justify-content-between">
                                    <p class="col-6 mb-0 text-start">Début : <time datetime="14-07-2023 18:30:00">18h30</time></p>
                                    <p class="col-6 mb-0 text-end">Fin prévue : <time datetime="14-07-2023 19:30:00">19h30</time></p>
                                </div>
                            </div>
                            -->
                            <!-- Date & Hours (not on mobile) -->
                            <div class="container text-end">
                                <div class="row">
                                    <p class="mb-0">
                                        <time datetime="14-07-2023">Le 14/07/2023</time>
                                        <time datetime="14-07-2023 18:30:00">de 18h30</time>
                                        <time datetime="14-07-2023 19:30:00">à 19h30</time>
                                    </p>
                                </div>
                            </div>
                        </article>
                        
                        <article class="col-md-5 col-xxl-4 d-flex justify-content-between align-items-center flex-wrap">
                            <!-- Teams names -->
                            <div class="container">
                                <div class="body-bold row justify-content-between align-items-center">
                                    <div class="col-5">Renards du Sud</div>
                                    <div class="col-2 text-center">VS.</div>
                                    <div class="col-5">Loups de l'Ouest</div>
                                </div>
                            </div>
                            <!-- Scores -->
                            <div class="container text-center">
                                <div class="as-h2 row justify-content-between">
                                    <div class="col-5">21</div>
                                    <div class="col-2">-</div>
                                    <div class="col-5">13</div>
                                </div>
                            </div>
                            <!-- Date & Hours -->
                            <div class="container text-center">
                                <div class="row">
                                    <p class="mb-0">
                                        <time datetime="21-06-2023">Le 21/06/2023</time>
                                        <time datetime="21-06-2023 19:00:00">de 19h00</time>
                                        <time datetime="21-06-2023 20:03:27">à 20h03</time>
                                    </p>
                                </div>
                            </div>
                        </article>
                        
                        <article class="col-md-5 col-xxl-4 d-flex justify-content-between align-items-center flex-wrap">
                            <!-- Teams names -->
                            <div class="container">
                                <div class="body-bold row justify-content-between align-items-center">
                                    <div class="col-5">Renards du Sud</div>
                                    <div class="col-2 text-center">VS.</div>
                                    <div class="col-5">Loups de l'Ouest</div>
                                </div>
                            </div>
                            <!-- Scores -->
                            <div class="container text-center">
                                <div class="as-h2 row justify-content-between">
                                    <div class="col-5">21</div>
                                    <div class="col-2">-</div>
                                    <div class="col-5">13</div>
                                </div>
                            </div>
                            <!-- Date & Hours -->
                            <div class="container text-center">
                                <div class="row">
                                    <p class="mb-0">
                                        <time datetime="21-06-2023">Le 21/06/2023</time>
                                        <time datetime="21-06-2023 19:00:00">de 19h00</time>
                                        <time datetime="21-06-2023 20:03:27">à 20h03</time>
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </section>
        </main>

        <!-- Import JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>
