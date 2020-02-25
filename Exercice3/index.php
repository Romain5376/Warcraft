<?php
require 'character.php';
require 'hero.php';
require 'enemy.php';

if (isset($_POST['paladin']) || isset($_POST['wizard']) || isset($_POST['thief']) || isset($_POST['webDeveloper'])) {
    //Stats du Paladin (santé,dégâts de l'arme,armure)
    $paladinHealth = rand(2000, 3000);
    $paladinWeaponDamage = rand(400, 600);
    $paladinShieldValue = rand(800, 1500);

    //Stats du Mage (santé,dégâts de l'arme,armure)
    $wizardHealth = rand(1000, 1500);
    $wizardWeaponDamage = rand(600, 800);
    $wizardShieldValue = rand(500, 700);

    //Stats du Voleur (santé,dégâts de l'arme,armure)
    $thiefHealth = rand(800, 1300);
    $thiefWeaponDamage = rand(600, 800);
    $thiefShieldValue = rand(300, 400);

    //Stats du Développeur web (santé,dégâts de l'arme,armure)
    $webDeveloperHealth = rand(1500, 1800);
    $webDeveloperWeaponDamage = rand(400, 700);
    $webDeveloperShieldValue = rand(300, 500);

    //Stats du Revenant (santé,dégâts de l'arme,armure)
    $revenantHealth = rand(1000, 1300);
    $revenantWeaponDamage = rand(200, 400);

    //Stats de l'Uruk Haï (santé,dégâts de l'arme,armure)
    $urukHaïHealth = rand(1500, 2000);
    $urukHaïWeaponDamage = rand(500, 800);
    $urukHaïShieldValue = rand(700, 1000);

    //Stats du Coronuviras (santé,dégâts de l'arme,armure)
    $coronuvirasHealth = rand(2000, 3000);
    $coronuvirasWeaponDamage = rand(700, 1000);
    $coronuvirasShieldValue = rand(500, 700);

    //Stats du Bug (santé,dégâts de l'arme,armure)
    $bugHealth = rand(1, 9999);
    $bugWeaponDamage = rand(500, 800);
    $bugShieldValue = rand(10, 600);

    //Objet Paladin
    $paladin = new hero($paladinHealth, 0, 'espadon', $paladinWeaponDamage, 'armure de plaques', $paladinShieldValue);
    //Objet Mage
    $wizard = new hero($wizardHealth, 0, 'bâton des flammes froides', $wizardWeaponDamage, 'robe noire', $wizardShieldValue);
    //Objet Voleur
    $thief = new hero($thiefHealth, 0, 'dague empoisonnée', $thiefWeaponDamage, 'cape de voleur', $thiefShieldValue);
    //Objet Développeur Web
    $webDeveloper = new hero($webDeveloperHealth, 0, 'ordinateur vieillissant', $webDeveloperWeaponDamage, 'armure de câbles RJ-45', $webDeveloperShieldValue);
    //Objet Revenant
    $revenant = new enemy($revenantHealth, 0, 'ses ongles', $revenantWeaponDamage, 'aucune armure', 0);
    //Objet Uruk Haï
    $urukHaï = new enemy($urukHaïHealth, 0, 'fléau', $urukHaïWeaponDamage, 'armure de piques', $urukHaïShieldValue);
    //Objet Coronaviras 
    $coronaviras = new enemy($coronuvirasHealth, 0, 'masse', $coronuvirasWeaponDamage, 'armure en peau de chauve-souris', $coronuvirasShieldValue);
    //Objet Le Bug 
    $bug = new enemy($bugHealth, 0, 'AiremeTiréAireÉfÉToile', $bugWeaponDamage, "armure d'erreurs système", $bugShieldValue);
} else {
    '';
}

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

    <div class="row center-align">
        <div class="col l12 col m12 col s12">
            <p id="gameTitle" class="white-text">Warcraft 4</p>
        </div>
    </div>

    <?php if (isset($_POST['paladin'])) { ?>
        <div class="row fightRow">
            <div class="col">
                <div class="card cardFight z-depth-5">
                    <div class="card-image">
                        <img src="img/paladin.jpg" />
                        <span class="card-title">Le Paladin</span>
                    </div>
                    <div class="card-content">
                        <p><span class="cardStats">Santé:</span> <?= $paladin->getHealth() ?></p>
                        <p><span class="cardStats">Arme:</span> <?= $paladin->getWeapon() ?></p>
                        <p><span class="cardStats">Dégât de l'arme:</span> <?= $paladin->getWeaponDamage() ?></p>
                        <p><span class="cardStats">Armure:</span> <?= $paladin->getShield() ?></p>
                        <p><span class="cardStats">Résistance Armure:</span> <?= $paladin->getShieldValue() ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row fightRow">
            <div class="col">
                <form method="POST" action="">
                    <button class="waves-effect waves-light btn red accent-4" type="submit" name="fight">FIGHT</button>
                </form>
            </div>
        </div>

    <?php } else if (isset($_POST['wizard'])) { ?>
        <div class="row">
            <div class=" col">
                <div class="card cardFight z-depth-5">
                    <div class="card-image">
                        <img src="img/mage.jpg" />
                        <span class="card-title">Le Mage</span>
                    </div>
                    <div class="card-content">
                        <p><span class="cardStats">Santé:</span> <?= $wizard->getHealth() ?></p>
                        <p><span class="cardStats">Arme:</span> <?= $wizard->getWeapon() ?></p>
                        <p><span class="cardStats">Dégât de l'arme:</span> <?= $wizard->getWeaponDamage() ?></p>
                        <p><span class="cardStats">Armure:</span> <?= $wizard->getShield() ?></p>
                        <p><span class="cardStats">Résistance Armure:</span> <?= $wizard->getShieldValue() ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form method="POST" action="">
                    <button class="waves-effect waves-light btn red accent-4" type="submit" name="fight">FIGHT</button>
                </form>
            </div>
        </div>
    <?php } else if (isset($_POST['thief'])) { ?>
        <div class="row">
            <div class="col">
                <div class="card cardFight z-depth-5">
                    <div class="card-image">
                        <img src="img/voleur.jpg" />
                        <span class="card-title">Le Voleur</span>
                    </div>
                    <div class="card-content">
                        <p><span class="cardStats">Santé:</span> <?= $thief->getHealth() ?></p>
                        <p><span class="cardStats">Arme:</span> <?= $thief->getWeapon() ?></p>
                        <p><span class="cardStats">Dégât de l'arme:</span> <?= $thief->getWeaponDamage() ?></p>
                        <p><span class="cardStats">Armure:</span> <?= $thief->getShield() ?></p>
                        <p><span class="cardStats">Résistance Armure:</span> <?= $thief->getShieldValue() ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col l4 offset-l4">
                <form method="POST" action="">
                    <button class="waves-effect waves-light btn red accent-4" type="submit" name="fight">FIGHT</button>
                </form>
            </div>
        </div>

    <?php } else if (isset($_POST['webDeveloper'])) { ?>
        <div class="row">
            <div class="col">
                <div class="card cardFight z-depth-5">
                    <div class="card-image">
                        <img src="img/dev.jpg" />
                        <span class="card-title">Le Développeur Web</span>
                    </div>
                    <div class="card-content">
                        <p><span class="cardStats">Santé:</span> <?= $webDeveloper->getHealth() ?></p>
                        <p><span class="cardStats">Arme:</span> <?= $webDeveloper->getWeapon() ?></p>
                        <p><span class="cardStats">Dégât de l'arme:</span> <?= $webDeveloper->getWeaponDamage() ?></p>
                        <p><span class="cardStats">Armure:</span> <?= $webDeveloper->getShield() ?></p>
                        <p><span class="cardStats">Résistance Armure:</span> <?= $webDeveloper->getShieldValue() ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form method="POST" action="">
                    <button class="waves-effect waves-light btn red accent-4" type="submit" name="fight">FIGHT</button>
                </form>
            </div>
        </div>

    <?php } else { ?>

        <div class="row center-align">
            <div class="col l12 col m12 col s12">
                <p id="heros" class="gameCategoriesTitle">Les Héros</p>
            </div>
        </div>

        <form method="POST" action="">
            <div class="container">
                <div class="row z-depth-5" id="cardRowHeros">
                    <div class="col l3 col m6 col s12">
                        <div class="card z-depth-5">
                            <div class="card-image">
                                <img src="img/paladin.jpg">
                                <span class="card-title">Le Paladin</span>
                            </div>
                            <div class="card-content">
                                <p>Héros des premières lignes, son rôle est de protéger ses alliés en encaissant le plus de dégâts possible !</p>
                            </div>
                            <div class="card-action">
                                <button class="waves-effect waves-light btn black-text chooseButton" type="submit" name="paladin">Choisir</button>
                            </div>
                        </div>
                    </div>
                    <div class="col l3 col m6 col s12">
                        <div class="card z-depth-5">
                            <div class="card-image">
                                <img src="img/mage.jpg">
                                <span class="card-title">Le Mage</span>
                            </div>
                            <div class="card-content">
                                <p>Héros de l'arrière-ligne, son rôle est de causer le plus de dégâts possibles en invoquant de puissants sorts !</p>
                            </div>
                            <div class="card-action">
                                <button class="waves-effect waves-light btn black-text chooseButton" type="submit" name="wizard">Choisir</button>
                            </div>
                        </div>
                    </div>
                    <div class="col l3 col m6 col s12">
                        <div class="card z-depth-5">
                            <div class="card-image">
                                <img src="img/voleur.jpg">
                                <span class="card-title">Le Voleur</span>
                            </div>
                            <div class="card-content">
                                <p>Héros de l'ombre, le voleur se faufile dans les rangs ennemis afin d'en finir le plus rapidement possible !</p>
                            </div>
                            <div class="card-action">
                                <button class="waves-effect waves-light btn black-text chooseButton" type="submit" name="thief">Choisir</button>
                            </div>
                        </div>
                    </div>
                    <div class="col l3 col m6 col s12">
                        <div class="card z-depth-5">
                            <div class="card-image">
                                <img src="img/dev.jpg">
                                <span class="card-title">Le Développeur Web</span>
                            </div>
                            <div class="card-content">
                                <p>Héros de support, le Développeur Web a pour but de réparer les soi-disant bugs !</p>
                            </div>
                            <div class="card-action">
                                <button class="waves-effect waves-light btn black-text chooseButton" type="submit" name="webDeveloper">Choisir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        
    <?php
    }
    ?>

</body>

</html>