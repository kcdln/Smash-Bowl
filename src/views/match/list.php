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
        <link href="<?= $sRelativePath; ?>src/assets/css/match/list.css" rel="stylesheet">
    </head>
    <body>
        <!-- Header & Nav -->
        <?php include_once $sAbsolutePath . 'src/widgets/header.php'; ?>
        
        <main>
            <h2 class="d-none d-sm-block">Liste de tous les matchs</h2>
            
            <!-- Match in progress -->
            <section>
                <h3 class="section-title d-none d-sm-flex justify-content-center align-items-center"><span class="pulse d-none d-md-inline-block"></span>En cours</h3>
                <div class="no-result d-none d-flex align-items-center p-3"><p class="container mb-0 text-center">Aucun match présent dans cette rubrique</p></div>

                <article class="match-in-progress d-flex justify-content-between align-items-center flex-wrap flex-md-nowrap">
                    <!-- Teams names -->
                    <div class="container col-md-6 m-md-0">
                        <div class="body-bold row justify-content-between align-items-center">
                            <div class="col-5">Falcons de l'Atlantique</div>
                            <div class="col-2 text-center">VS.</div>
                            <div class="col-5">Éléphants de l'Est</div>
                        </div>
                    </div>
                    <!-- Scores -->
                    <div class="container col-md-2 m-md-0 text-center">
                        <div class="as-h2 row justify-content-between">
                            <div class="col-5 col-md-4">5</div>
                            <div class="col-2 col-md-4">-</div>
                            <div class="col-5 col-md-4">7</div>
                        </div>
                    </div>
                    <!-- Hours -->
                    <div class="container col-md-4 m-md-0">
                        <div class="row">
                            <p class="mb-0 text-end">Fin prévue : <time datetime="08-07-2023 21:15:00">21h15</time></p>
                        </div>
                    </div>
                </article>

                <article class="match-in-progress d-flex justify-content-between align-items-center flex-wrap flex-md-nowrap">
                    <!-- Teams names -->
                    <div class="container col-md-6 m-md-0">
                        <div class="body-bold row justify-content-between align-items-center">
                            <div class="col-5">Falcons de l'Atlantique</div>
                            <div class="col-2 text-center">VS.</div>
                            <div class="col-5">Éléphants de l'Est</div>
                        </div>
                    </div>
                    <!-- Scores -->
                    <div class="container col-md-2 m-md-0 text-center">
                        <div class="as-h2 row justify-content-between">
                            <div class="col-5 col-md-4">5</div>
                            <div class="col-2 col-md-4">-</div>
                            <div class="col-5 col-md-4">7</div>
                        </div>
                    </div>
                    <!-- Hours -->
                    <div class="container col-md-4 m-md-0">
                        <div class="row">
                            <p class="mb-0 text-end">Fin prévue : <time datetime="08-07-2023 21:15:00">21h15</time></p>
                        </div>
                    </div>
                </article>
            </section>
            
            <!-- Match to come -->
            <section>
                <h3 class="section-title d-none d-sm-block">À venir</h3>
                <div class="no-result d-none d-flex align-items-center p-3"><p class="container mb-0 text-center">Aucun match présent dans cette rubrique</p></div>
                
                <article class="d-flex justify-content-between align-items-center flex-wrap">
                    <!-- Teams names -->
                    <div class="container col-md-6 m-md-0">
                        <div class="body-bold row justify-content-between align-items-center">
                            <div class="col-5">Tigres de la Ville</div>
                            <div class="col-2 text-center">VS.</div>
                            <div class="col-5">Ours Grizzlis</div>
                        </div>
                    </div>
                    <!-- Date (mobile only) -->
                    <div class="container m-md-0 d-block d-md-none">
                        <div class="row">
                            <p class="mb-0">Date du match : <time class="body-bold" datetime="14-07-2023">Le 14/07/2023</time></p>
                        </div>
                    </div>
                    <!-- Hours (mobile only) -->
                    <div class="container m-md-0 d-block d-md-none">
                        <div class="row justify-content-between">
                            <p class="col-6 mb-0 text-start">Début : <time datetime="14-07-2023 18:30:00">18h30</time></p>
                            <p class="col-6 mb-0 text-end">Fin prévue : <time datetime="14-07-2023 19:30:00">19h30</time></p>
                        </div>
                    </div>
                    <!-- Date & Hours (not on mobile) -->
                    <div class="container col-md-4 m-md-0 d-none d-md-block text-end">
                        <div class="row">
                            <p class="mb-0">
                                <time datetime="14-07-2023">Le 14/07/2023</time>
                                <time datetime="14-07-2023 18:30:00">de 18h30</time>
                                <time datetime="14-07-2023 19:30:00">à 19h30</time>
                            </p>
                        </div>
                    </div>
                </article>
                
                <article class="d-flex justify-content-between align-items-center flex-wrap">
                    <!-- Teams names -->
                    <div class="container col-md-6 m-md-0">
                        <div class="body-bold row justify-content-between align-items-center">
                            <div class="col-5">Tigres de la Ville</div>
                            <div class="col-2 text-center">VS.</div>
                            <div class="col-5">Ours Grizzlis</div>
                        </div>
                    </div>
                    <!-- Date (mobile only) -->
                    <div class="container m-md-0 d-block d-md-none">
                        <div class="row">
                            <p class="mb-0">Date du match : <time class="body-bold" datetime="14-07-2023">Le 14/07/2023</time></p>
                        </div>
                    </div>
                    <!-- Hours (mobile only) -->
                    <div class="container m-md-0 d-block d-md-none">
                        <div class="row justify-content-between">
                            <p class="col-6 mb-0 text-start">Début : <time datetime="14-07-2023 18:30:00">18h30</time></p>
                            <p class="col-6 mb-0 text-end">Fin prévue : <time datetime="14-07-2023 19:30:00">19h30</time></p>
                        </div>
                    </div>
                    <!-- Date & Hours (not on mobile) -->
                    <div class="container col-md-4 m-md-0 d-none d-md-block text-end">
                        <div class="row">
                            <p class="mb-0">
                                <time datetime="14-07-2023">Le 14/07/2023</time>
                                <time datetime="14-07-2023 18:30:00">de 18h30</time>
                                <time datetime="14-07-2023 19:30:00">à 19h30</time>
                            </p>
                        </div>
                    </div>
                </article>
            </section>
            
            <!-- Match done -->
            <section>
                <h3 class="section-title d-none d-sm-block">Terminé</h3>
                <div class="no-result d-none d-flex align-items-center p-3"><p class="container mb-0 text-center">Aucun match présent dans cette rubrique</p></div>
                
                <article class="d-flex justify-content-between align-items-center flex-wrap">
                    <!-- Teams names -->
                    <div class="container col-md-6 m-md-0">
                        <div class="body-bold row justify-content-between align-items-center">
                            <div class="col-5">Renards du Sud</div>
                            <div class="col-2 text-center">VS.</div>
                            <div class="col-5">Loups de l'Ouest</div>
                        </div>
                    </div>
                    <!-- Scores -->
                    <div class="container col-md-2 m-md-0 text-center">
                        <div class="as-h2 row justify-content-between">
                            <div class="col-5 col-md-4">21</div>
                            <div class="col-2 col-md-4">-</div>
                            <div class="col-5 col-md-4">13</div>
                        </div>
                    </div>
                    <!-- Date & Hours -->
                    <div class="container col-md-4 m-md-0 text-center text-md-end">
                        <div class="row">
                            <p class="mb-0">
                                <time datetime="21-06-2023">Le 21/06/2023</time>
                                <time datetime="21-06-2023 19:00:00">de 19h00</time>
                                <time datetime="21-06-2023 20:03:27">à 20h03</time>
                            </p>
                        </div>
                    </div>
                </article>
                
                <article class="d-flex justify-content-between align-items-center flex-wrap">
                    <!-- Teams names -->
                    <div class="container col-md-6 m-md-0">
                        <div class="body-bold row justify-content-between align-items-center">
                            <div class="col-5">Renards du Sud</div>
                            <div class="col-2 text-center">VS.</div>
                            <div class="col-5">Loups de l'Ouest</div>
                        </div>
                    </div>
                    <!-- Scores -->
                    <div class="container col-md-2 m-md-0 text-center">
                        <div class="as-h2 row justify-content-between">
                            <div class="col-5 col-md-4">21</div>
                            <div class="col-2 col-md-4">-</div>
                            <div class="col-5 col-md-4">13</div>
                        </div>
                    </div>
                    <!-- Date & Hours -->
                    <div class="container col-md-4 m-md-0 text-center text-md-end">
                        <div class="row">
                            <p class="mb-0">
                                <time datetime="21-06-2023">Le 21/06/2023</time>
                                <time datetime="21-06-2023 19:00:00">de 19h00</time>
                                <time datetime="21-06-2023 20:03:27">à 20h03</time>
                            </p>
                        </div>
                    </div>
                </article>
            </section>
        </main>

        <!-- Import JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>