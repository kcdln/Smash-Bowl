<?php $sRelativePath = '../../'; ?>
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
        <link href="<?= $sRelativePath; ?>src/assets/css/login.css" rel="stylesheet">
    </head>
    <body>
        <!-- Vertical align for mobile only -->
        <div class="container-fluid">
            <div class="row vh-100 align-items-center">
                <div class="g-0">
                    <!-- Header & Nav -->
                    <?php include_once $sAbsolutePath . 'src/widgets/header.php'; ?>
                
                    <!-- Landing page forms -->
                    <div class="container-fluid">
                        <div class="row justify-content-around">
                            <div class="as-h2 d-none d-md-block col-md-6">Déjà membre ?</div>
                            <div class="as-h2 d-none d-md-block col-md-6">Nouveau joueur ?</div>
                        </div>
                        
                        <div class="row justify-content-around">
                            <!-- Login form -->
                            <div class="col-12 col-md-6 px-0 px-xs-2 px-md-4">
                                <form class="needs-validation p-4" action="" method="post" novalidate>
                                    <div class="mb-4">
                                        <label class="form-label" for="login-email">Email *</label>
                                        <input id="login-email" class="form-control" type="email" name="login-email" placeholder="email@exemple.com" autofocus required>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label" for="login-mdp">Mot de passe *</label>
                                        <input id="login-mdp" class="form-control" type="password" name="login-mdp" placeholder="motDePasse!13" required>
                                    </div>
                                    <div class="mb-2 invisible text-danger text-end text-md-start">Erreur : Email ou mot de passe incorrect</div>
                                    <div class="text-end">
                                        <button class="btn btn-primary mb-3" type="submit">Se connecter</button>
                                    </div>
                                </form>
                            </div>
                            <!-- END Login form -->

                            <!-- Sign up form - Hide on mobile version -->
                            <div class="d-none d-md-block col-md-6 px-0 px-xs-2 px-md-4 border-start">
                                <form class="needs-validation p-4" action="" method="post" novalidate>
                                    <div class="mb-4">
                                        <label class="form-label" for="signup-firstname">Prénom</label>
                                        <input id="signup-firstname" class="form-control" type="text" name="signup-firstname" placeholder="John">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="signup-lastname">Nom *</label>
                                        <input id="signup-lastname" class="form-control" type="text" name="signup-lastname" placeholder="Doe" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="signup-email">Email *</label>
                                        <input id="signup-email" class="form-control" type="email" name="signup-email" placeholder="email@exemple.com" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="signup-mdp1">Mot de passe *</label>
                                        <input id="signup-mdp1" class="form-control" type="password" name="signup-mdp1" placeholder="motDePasse!13" required>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label" for="signup-mdp2">Répéter mot de passe *</label>
                                        <input id="signup-mdp2" class="form-control" type="password" name="signup-mdp2" placeholder="motDePasse!13" required>
                                    </div>
                                    <div class="mb-2 invisible text-danger text-end text-md-start">Erreur : Au moins un des champs ci-dessus est invalide</div>
                                    <div class="text-end">
                                        <button class="btn btn-primary mb-3" type="submit">Créer un compte</button>
                                    </div>
                                </form>
                            </div>
                            <!-- END Sign up form -->
                        </div>
                    </div>

                    <!-- Import JS -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
                    <script src="<?= $sRelativePath; ?>src/assets/js/form.js"></script>
                </div>
            </div>
        </div>
    </body>
</html>
