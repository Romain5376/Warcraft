<?php
require 'character.php';
require 'hero.php';
require 'enemy.php';

session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Uncial+Antiqua&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Jim+Nightshade&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <title>Warcraft 4</title>
</head>

<body>
    <div class="row fightRow">
        <div class="col l12 col m12 col s12 center">
            <p id="gameTitle">Warcraft</p>
        </div>
    </div>

    <!--Round 1-->

    <!--Combat-->
    <?php
    for ($i = 0; $i < 1; $i++) {
        //Si le bouton nextRound et le bouton fight existent
        if (isset($_POST['nextRound']) || isset($_POST['fight'])) {
            //Si le héros (session) et le démon (session) existent
            if (isset($_SESSION['hero']) && isset($_SESSION['enemy'])) {

                $_SESSION['hero']->attack($_SESSION['hero']->minWeaponDamage, $_SESSION['hero']->maxWeaponDamage); //Génère la valeur de damage pour le héros
                $_SESSION['enemy']->attack($_SESSION['enemy']->minWeaponDamage, $_SESSION['enemy']->maxWeaponDamage); //Génère la valeur de damage pour le démon

                //Si la valeur d'attaque du héros est inférieur à la valeur d'armure du démon et si la valeur d'attaque du démon est inférieur à la valeur d'armure du héros
                if ($_SESSION['hero']->getWeaponDamage() < $_SESSION['enemy']->getShieldValue() && $_SESSION['enemy']->getWeaponDamage() < $_SESSION['hero']->getShieldValue()) {
                    $_SESSION['hero']->setWeaponDamage(0); //Valeur d'attaque du héros = 0
                    $_SESSION['enemy']->setWeaponDamage(0); //Valeur d'attaque du démon = 0

                    $_SESSION['enemy']->rageGain($_SESSION['enemyRage']); //Pour chaque coups reçu, l'ennemi augmente sa rage
                    $_SESSION['hero']->rageGain($_SESSION['heroRage']); //Pour chaque coups reçu, le héros augmente sa rage 
                    //Si la valeur d'attaque du héros est inférieur à la valeur d'armure du démon 
                } else if ($_SESSION['hero']->getWeaponDamage() < $_SESSION['enemy']->getShieldValue()) {
                    $_SESSION['hero']->setWeaponDamage(0); //Valeur d'attaque du héros = 0
                    $_SESSION['enemy']->rageGain($_SESSION['enemyRage']); //Pour chaque coups reçu, l'ennemi augmente sa rage
                    $_SESSION['hero']->attacked($_SESSION['enemy']->getweaponDamage()); //Valeur aléatoire de damage
                    $_SESSION['hero']->rageGain($_SESSION['heroRage']); //Pour chaque coups reçu, le héros augmente sa rage 
                    //Si la valeur d'attaque du démon est inférieur à la valeur d'armure du héros
                } else if ($_SESSION['enemy']->getWeaponDamage() < $_SESSION['hero']->getShieldValue()) {
                    $_SESSION['enemy']->setWeaponDamage(0); //Valeur d'attaque du démons = 0
                    $_SESSION['enemy']->attacked($_SESSION['hero']->getWeaponDamage());
                    $_SESSION['enemy']->rageGain($_SESSION['enemyRage']); //Pour chaque coups reçu, l'ennemi augmente sa rage
                    $_SESSION['hero']->rageGain($_SESSION['heroRage']); //Pour chaque coups reçu, le héros augmente sa rage 
                } else {
                    if ($_SESSION['hero']->getRage() >= 100) {
                        switch ($_SESSION['hero']->name == 'paladin') {
                            case 'paladin':
                                $_SESSION['hero']->attack($_SESSION['hero']->minWeaponDamage, $_SESSION['hero']->maxWeaponDamage);
                                $paladinRage = $_SESSION['hero']->getWeaponValue() * 3;
                                $_SESSION['hero']->setWeaponValue($paladinRage);
                                break;

                            default:
                                # code...
                                break;
                        }
                    } else {
                        $_SESSION['enemy']->attacked($_SESSION['hero']->getWeaponDamage());
                        $_SESSION['enemy']->rageGain($_SESSION['enemyRage']); //Pour chaque coups reçu, l'ennemi augmente sa rage
                    }

                    $_SESSION['hero']->attacked($_SESSION['enemy']->getweaponDamage()); //Valeur aléatoire de damage
                    $_SESSION['hero']->rageGain($_SESSION['heroRage']); //Pour chaque coups reçu, le héros augmente sa rage 
                }
            }
            //Si la vie du héros et la vie du démon sont supérieur à 0
            if ($_SESSION['hero']->getHealth() > 0 && $_SESSION['enemy']->getHealth() > 0) { ?>
                <!--Démon-->
                <div class="row fightRow">
                    <div class="col s12 col m12 col l6 center">
                        <div class="card cardFight black z-depth-5">
                            <div class="card-image">
                                <img src="<?= $_SESSION['enemyImg'] ?>" />
                                <span class="card-title"><?= $_SESSION['enemyName'] ?></span>
                            </div>
                            <div class="card-content white-text">
                                <p><span class="cardStats">Santé:</span> <?= $_SESSION['enemy']->getHealth() ?></p>
                                <!--Affichage de la vie-->
                                <p><span class="cardStats">Dégâts de l'arme:</span> <?= $_SESSION['enemy']->getWeaponDamage() ?></p>
                                <!--Affichage initial des dégâts de l'arme-->
                                <p><span class="cardStats">Résistance Armure:</span> <?= $_SESSION['enemy']->getShieldValue() ?></p>
                                <!--Affichage de la valeur de l'armure-->
                                <p><span class="cardStats">Rage:</span> <?= $_SESSION['enemy']->getRage() ?></p>
                                <!--Affichage de la rage-->
                            </div>
                        </div>
                    </div>
                    <!--/Démon-->

                    <!--Héros-->
                    <div class="col s12 col m12 col l6 center">
                        <div class="card cardFight z-depth-5">
                            <div class="card-image">
                                <img src="<?= $_SESSION['heroImg'] ?>" />
                                <span class="card-title"><?= $_SESSION['heroName'] ?></span>
                            </div>
                            <div class="card-content">
                                <p><span class="cardStats">Santé:</span> <?= $_SESSION['hero']->getHealth() ?></p>
                                <p><span class="cardStats">Dégâts de l'arme:</span> <?= $_SESSION['hero']->getWeaponDamage() ?></p>
                                <p><span class="cardStats">Résistance Armure:</span> <?= $_SESSION['hero']->getShieldValue() ?></p>
                                <p><span class="cardStats">Rage:</span> <?= $_SESSION['hero']->getRage() ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Héros-->

                <!--Statistiques Démon-->
                <div class="row fightRow">
                    <div class="col l6 center">
                        <div class="col l12 descriptionDemonFight">
                            <p><?= $_SESSION['enemyName'] ?> attaque !</p>
                            <p>Il porte un coup de <?= $_SESSION['enemy']->getWeaponDamage() ?></p>
                            <!--Si les dégâts de l'arme sont inférieur à la valeur de l'armure alors tu affiche 0 sinon tu affiche les dégâts de l'arme - la valeur de l'armure-->
                            <p>Il encaisse un coup de <?= $_SESSION['hero']->getWeaponDamage() < $_SESSION['enemy']->getShieldValue()  ? 0 : $_SESSION['hero']->getWeaponDamage() - $_SESSION['enemy']->getShieldValue() ?> points !</p>
                            <p>Il lui reste <?= $_SESSION['enemy']->getHealth() ?> de points de santé</p>
                        </div>
                    </div>
                    <!--/Statistiques Démon-->

                    <!--Statistiques Héros-->
                    <div class="col l6 center">
                        <div class="col l12 descriptionHeroFight">
                            <p><?= $_SESSION['heroName'] ?> attaque !</p>
                            <p>Il porte un coup de <?= $_SESSION['hero']->getRage() >= 100 ? $_SESSION['hero']->getWeaponDamage() * 3 : $_SESSION['hero']->getWeaponDamage() ?></p>
                            <p>Il encaisse un coup de <?= $_SESSION['enemy']->getWeaponDamage() < $_SESSION['hero']->getShieldValue() ? 0 : $_SESSION['enemy']->getWeaponDamage() - $_SESSION['hero']->getShieldValue() ?> points !</p>
                            <p>Il lui reste <?= $_SESSION['hero']->getHealth() ?> de points de santé</p>
                        </div>
                    </div>
                </div>
                <!--/Statistiques Héros-->
            <?php
            } else if ($_SESSION['enemy']->getHealth() <= 0) { ?>
                <!--Démon-->
                <div class="row fightRow">
                    <div class="col s12 col m12 col l6 center">
                        <div class="card cardFight black z-depth-5">
                            <div class="card-image">
                                <img src="<?= $_SESSION['enemyImg'] ?>" />
                                <span class="card-title"><?= $_SESSION['enemyName'] ?></span>
                            </div>
                            <div class="card-content white-text">
                                <!--Si la vie du démon est inférieur ou égal à 0 alors tu affiches 0 sinon tu affiches la vie - les dégâts subit-->
                                <p><span class="cardStats">Santé:</span> <?= $_SESSION['enemy']->getHealth() <= 0 ? 0 : $_SESSION['enemy']->getHealth() - $_SESSION['hero']->getWeaponDamage() ?></p>
                                <p><span class="cardStats">Dégât de l'arme:</span> <?= $_SESSION['enemy']->getWeaponDamage() ?></p>
                                <p><span class="cardStats">Résistance Armure:</span> <?= $_SESSION['enemy']->getShieldValue() ?></p>
                                <p><span class="cardStats">Rage:</span> <?= $_SESSION['enemy']->getRage() ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/Démon-->

                    <!--Héros-->
                    <div class="col s12 col m12 col l6 center">
                        <div class="card cardFight z-depth-5">
                            <div class="card-image">
                                <img src="<?= $_SESSION['heroImg'] ?>" />
                                <span class="card-title"><?= $_SESSION['heroName'] ?></span>
                            </div>
                            <div class="card-content">
                                <p><span class="cardStats">Santé:</span> <?= $_SESSION['hero']->getHealth() <= 0 ? 0 : $_SESSION['hero']->getHealth() - $_SESSION['enemy']->getWeaponDamage() ?></p>
                                <p><span class="cardStats">Dégât de l'arme:</span> <?= $_SESSION['hero']->getWeaponDamage() ?></p>
                                <p><span class="cardStats">Résistance Armure:</span> <?= $_SESSION['hero']->getShieldValue() ?></p>
                                <p><span class="cardStats">Rage:</span> <?= $_SESSION['hero']->getRage() ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Héros-->

                <!--Statistiques Démon-->
                <div class="row fightRow">
                    <div class="col l6 center">
                        <div class="col l12 descriptionDemonFight">
                            <p><?= $_SESSION['enemyName'] ?> est mort !</p>
                        </div>
                    </div>
                    <!--/Statistiques Démon-->

                    <!--Statistiques Héros-->
                    <div class="col l6 center">
                        <div class="col l12 descriptionHeroFight">
                            <p><?= $_SESSION['heroName'] ?> à remporté le combat !</p>
                        </div>
                    </div>
                </div>
                <!--/Statistiques Héros-->

            <?php } else if ($_SESSION['hero']->getHealth() <= 0) { ?>
                <!--Démon-->
                <div class="row fightRow">
                    <div class="col s12 col m12 col l6 center">
                        <div class="card cardFight black z-depth-5">
                            <div class="card-image">
                                <img src="<?= $_SESSION['enemyImg'] ?>" />
                                <span class="card-title"><?= $_SESSION['enemyName'] ?></span>
                            </div>
                            <div class="card-content white-text">
                                <p><span class="cardStats">Santé:</span> <?= $_SESSION['enemy']->getHealth() ?></p>
                                <p><span class="cardStats">Dégât de l'arme:</span> <?= $_SESSION['enemy']->getWeaponDamage() ?></p>
                                <p><span class="cardStats">Résistance Armure:</span> <?= $_SESSION['enemy']->getShieldValue() ?></p>
                                <p><span class="cardStats">Rage:</span> <?= $_SESSION['enemy']->getRage() ?></p>
                            </div>
                        </div>
                    </div>
                    <!--/Démon-->

                    <!--Héros-->
                    <div class="col s12 col m12 col l6 center">
                        <div class="card cardFight z-depth-5">
                            <div class="card-image">
                                <img src="<?= $_SESSION['heroImg'] ?>" />
                                <span class="card-title"><?= $_SESSION['heroName'] ?></span>
                            </div>
                            <div class="card-content">
                                <p><span class="cardStats">Santé:</span> <?= $_SESSION['hero']->getHealth() <= 0 ? 0 : $_SESSION['hero']->getHealth() ?></p>
                                <p><span class="cardStats">Dégât de l'arme:</span> <?= $_SESSION['hero']->getWeaponDamage() ?></p>
                                <p><span class="cardStats">Résistance Armure:</span> <?= $_SESSION['hero']->getShieldValue() ?></p>
                                <p><span class="cardStats">Rage:</span> <?= $_SESSION['hero']->getRage() ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Héros-->

                <!--Statistiques Démon-->
                <div class="row fightRow">
                    <div class="col l6 center">
                        <div class="col l12 descriptionDemonFight">
                            <p><?= $_SESSION['enemyName'] ?> à remporté le combat !</p>
                        </div>
                    </div>
                    <!--/Statistiques Démon-->

                    <!--Statistiques Héros-->
                    <div class="col l6 center">
                        <div class="col l12 descriptionHeroFight">
                            <p><?= $_SESSION['heroName'] ?> est mort !</p>
                        </div>
                    </div>
                </div>
                <!--/Statistiques Héros-->

        <?php
            } else {
                '';
            }
        } ?>

        <!--Round Suivant-->
        <div class="row fightRow">
            <div class="col l12 m12 s12 center">
                <form method="POST" action="">
                    <button type="submit" name="nextRound" class="waves-effect waves-light btn buttonRound">ROUND SUIVANT</button>
                </form>
            </div>
        </div>
        <!--/Round Suivant-->
    <?php
    } ?>

    <!--Quitter le combat-->
    <div class="row fightRow">
        <div class="col l12 m12 s12 center">
            <form method="POST" action="index.php">
                <button class="waves-effect waves-light btn red accent-4" type="submit" name="quit">Fuir le combat !</button>
            </form>
        </div>
    </div>
    <!--/Quitter le combat-->

    <?php
    if (isset($_POST['quit'])) {
        session_destroy();
    } else {
        '';
    }
    ?>
</body>

</html>