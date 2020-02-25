<?php
require 'character.php';
require 'hero.php';
require 'enemy.php';

session_start();
if (isset($_POST['paladin']) || isset($_POST['wizard']) || isset($_POST['thief']) || isset($_POST['webDeveloper'])) {
    if (isset($_POST['paladin'])) {
        //Stats du Paladin (santé,dégâts de l'arme,armure)
        $paladinHealth = rand(2000, 3000);
        $paladinWeaponDamage = rand (400,600);
        $paladinShieldValue = rand(800, 1500);
        //Objet Paladin
        $paladin = new hero($paladinHealth, 0, 'espadon',$paladinWeaponDamage,'armure de plaques', $paladinShieldValue);
        $_SESSION['hero'] = $paladin;
        $_SESSION['hero']->name = "paladin";
        $_SESSION['hero']->minWeaponDamage = 400;
        $_SESSION['hero']->maxWeaponDamage = 600;
        

    } else if (isset($_POST['wizard'])) {
        //Stats du Mage (santé,dégâts de l'arme,armure)
        $wizardHealth = rand(1000, 1500);
        $wizardWeaponDamage = rand(600,800);
        $wizardShieldValue = rand(500, 700);
        //Objet Mage
        $wizard = new hero($wizardHealth, 0, 'bâton des flammes froides',$wizardWeaponDamage,'robe noire', $wizardShieldValue);
        $_SESSION['hero'] = $wizard;
        $_SESSION['hero']->name = "wizard";
        $_SESSION['hero']->minWeaponDamage = 600;
        $_SESSION['hero']->maxWeaponDamage = 800;

    } else if (isset($_POST['thief'])) {
        //Stats du Voleur (santé,dégâts de l'arme,armure)
        $thiefHealth = rand(800, 1300);
        $thiefWeaponDamage = rand(600,800);
        $thiefShieldValue = rand(300, 400);
        //Objet Voleur
        $thief = new hero($thiefHealth, 0, 'dague empoisonnée',$thiefWeaponDamage,'cape de voleur', $thiefShieldValue);
        $_SESSION['hero'] = $thief;
        $_SESSION['hero']->name = "thief";
        $_SESSION['hero']->minWeaponDamage = 600;
        $_SESSION['hero']->maxWeaponDamage = 800;

    } else if (isset($_POST['webDeveloper'])) {
        //Stats du Développeur web (santé,dégâts de l'arme,armure)
        $webDeveloperHealth = rand(1500, 1800);
        $webDeveloperWeaponDamage = rand(400,700);
        $webDeveloperShieldValue = rand(300, 500);
        //Objet Développeur Web
        $webDeveloper = new hero($webDeveloperHealth, 0, 'ordinateur vieillissant',$webDeveloperWeaponDamage,'armure de câbles RJ-45', $webDeveloperShieldValue);
        $_SESSION['hero'] = $webDeveloper;
        $_SESSION['hero']->name = "webDeveloper";
        $_SESSION['hero']->minWeaponDamage = 400;
        $_SESSION['hero']->maxWeaponDamage = 700;
        
    } else {
        '';
    }

    $enemy = rand(1, 4);
    switch ($enemy) {
        case 1:
            //Objet Revenant
            //Stats du Revenant (santé,dégâts de l'arme,armure)
            $revenantHealth = rand(1000, 1300);
            $revenantWeaponDamage = rand(200,400);
            $revenant = new enemy($revenantHealth, 0, 'ses ongles',$revenantWeaponDamage,'aucune armure', 0);
            $_SESSION['enemy'] = $revenant;
            $_SESSION['enemy']->name = "revenant";
            $_SESSION['enemy']->minWeaponDamage = 200;
            $_SESSION['enemy']->maxWeaponDamage = 400;
            break;

        case 2:
            //Objet Uruk Haï
            //Stats de l'Uruk Haï (santé,dégâts de l'arme,armure)
            $urukHaïHealth = rand(1500, 2000);
            $urukHaïWeaponDamage = rand(500,800);
            $urukHaïShieldValue = rand(700, 1000);
            $urukHaï = new enemy($urukHaïHealth, 0, 'fléau',$urukHaïWeaponDamage,'armure de piques', $urukHaïShieldValue);
            $_SESSION['enemy'] = $urukHaï;
            $_SESSION['enemy']->name = "urukHaï";
            $_SESSION['enemy']->minWeaponDamage = 500;
            $_SESSION['enemy']->maxWeaponDamage = 800;
            break;

        case 3:
            //Objet Coronaviras 
            //Stats du Coronuviras (santé,dégâts de l'arme,armure)
            $coronuvirasHealth = rand(2000, 3000);
            $coronavirasWeaponDamage = rand(700,1000);
            $coronuvirasShieldValue = rand(500, 700);
            $coronaviras = new enemy($coronuvirasHealth, 0, 'masse',$coronavirasWeaponDamage,'armure en peau de chauve-souris', $coronuvirasShieldValue);
            $_SESSION['enemy'] = $coronaviras;
            $_SESSION['enemy']->name = "coronoviras";
            $_SESSION['enemy']->minWeaponDamage = 700;
            $_SESSION['enemy']->maxWeaponDamage = 1000;
            break;

        case 4:
            //Objet Le Bug 
            //Stats du Bug (santé,dégâts de l'arme,armure)
            $bugHealth = rand(1, 9999);
            $bugWeaponDamage = rand(500,800);
            $bugShieldValue = rand(10, 600);
            $bug = new enemy($bugHealth, 0, 'AiremeTiréAireÉfÉToile',$bugWeaponDamage,"armure d'erreurs système", $bugShieldValue);
            $_SESSION['enemy'] = $bug;
            $_SESSION['enemy']->name = "bug";
            $_SESSION['enemy']->minWeaponDamage = 500;
            $_SESSION['enemy']->maxWeaponDamage = 800;
            break;
    }
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

    <div class="row fightRow">
        <div class="col l12 col m12 col s12 center">
            <p id="gameTitle">Warcraft</p>
        </div>
    </div>
    <div class="row fightRow">
        <?php if (isset($revenant)) { ?>
            <div class="col s12 col m12 col l5 center">
                <div class="card cardFight z-depth-5 black">
                    <div class="card-image">
                        <?php $_SESSION['enemyImg'] = "img/zombie.jpg" ?>
                        <img src="img/zombie.jpg" />
                        <?php $_SESSION['enemyName'] = "Le Revenant" ?>
                        <span class="card-title">Le Revenant</span>
                        <?php $_SESSION['enemyRage'] = 20 ?>
                    </div>
                    <div class="card-content white-text">
                        <p><span class="cardStats">Santé:</span> <?= $revenant->getHealth() ?></p>
                        <p><span class="cardStats">Arme:</span> <?= $revenant->getWeapon() ?></p>
                        <p><span class="cardStats">Dégât de l'arme:</span> <?= $revenant->getWeaponDamage() ?></p>
                        <p><span class="cardStats">Armure:</span> <?= $revenant->getShield() ?></p>
                        <p><span class="cardStats">Résistance Armure:</span> <?= $revenant->getShieldValue() ?></p>
                    </div>
                </div>
            </div>

        <?php } else if (isset($urukHaï)) { ?>

            <div class="col s12 col m12 col l5 center">
                <div class="card cardFight z-depth-5 black">
                    <div class="card-image">
                        <?php $_SESSION['enemyImg'] = "img/uruk.jpg" ?>
                        <img src="img/uruk.jpg" />
                        <?php $_SESSION['enemyName'] = "L'Uruk Haï" ?>
                        <span class="card-title">L'Uruk Haï</span>
                        <?php $_SESSION['enemyRage'] = 20 ?>
                    </div>
                    <div class="card-content white-text">
                        <p><span class="cardStats">Santé:</span> <?= $urukHaï->getHealth() ?></p>
                        <p><span class="cardStats">Arme:</span> <?= $urukHaï->getWeapon() ?></p>
                        <p><span class="cardStats">Dégât de l'arme:</span> <?= $urukHaï->getWeaponDamage() ?></p>
                        <p><span class="cardStats">Armure:</span> <?= $urukHaï->getShield() ?></p>
                        <p><span class="cardStats">Résistance Armure:</span> <?= $urukHaï->getShieldValue() ?></p>
                    </div>
                </div>
            </div>


        <?php } else if (isset($coronaviras)) {  ?>

            <div class="col s12 col m12 col l5 center">
                <div class="card cardFight z-depth-5 black">
                    <div class="card-image">
                        <?php $_SESSION['enemyImg'] = "img/coronaviras.jpg" ?>
                        <img src="img/coronaviras.jpg" />
                        <?php $_SESSION['enemyName'] = "Le Coronaviras" ?>
                        <span class="card-title">Le Coronaviras</span>
                        <?php $_SESSION['enemyRage'] = 20 ?>
                    </div>
                    <div class="card-content white-text">
                        <p><span class="cardStats">Santé:</span> <?= $coronaviras->getHealth() ?></p>
                        <p><span class="cardStats">Arme:</span> <?= $coronaviras->getWeapon() ?></p>
                        <p><span class="cardStats">Dégât de l'arme:</span> <?= $coronaviras->getWeaponDamage() ?></p>
                        <p><span class="cardStats">Armure:</span> <?= $coronaviras->getShield() ?></p>
                        <p><span class="cardStats">Résistance Armure:</span> <?= $coronaviras->getShieldValue() ?></p>
                    </div>
                </div>
            </div>


        <?php } else if (isset($bug)) { ?>

            <div class="col s12 col m12 col l5 center">
                <div class="card cardFight z-depth-5 black">
                    <div class="card-image">
                        <?php $_SESSION['enemyImg'] = "img/bug.jpg" ?>
                        <img src="img/bug.jpg" />
                        <?php $_SESSION['enemyName'] = "Le Bug" ?>
                        <span class="card-title">Le Bug</span>
                        <?php $_SESSION['enemyRage'] = 5 ?>
                    </div>
                    <div class="card-content white-text">
                        <p><span class="cardStats">Santé:</span> <?= $bug->getHealth() ?></p>
                        <p><span class="cardStats">Arme:</span> <?= $bug->getWeapon() ?></p>
                        <p><span class="cardStats">Dégât de l'arme:</span> <?= $bug->getWeaponDamage() ?></p>
                        <p><span class="cardStats">Armure:</span> <?= $bug->getShield() ?></p>
                        <p><span class="cardStats">Résistance Armure:</span> <?= $bug->getShieldValue() ?></p>
                    </div>
                </div>
            </div>
        <?php } else {
            '';
        }
        ?>

        <?php if (isset($_POST['paladin'])) { ?>
            <div class="col l2 col m12 col s12 center">
                <p class="vsFight">VS</p>
            </div>

            <div class="col s12 col m12 col l5 center">
                <div class="card cardFight z-depth-5">
                    <div class="card-image">
                        <?php $_SESSION['heroImg'] = "img/paladin.jpg" ?>
                        <img src="img/paladin.jpg" />
                        <?php $_SESSION['heroName'] = "Le Paladin" ?>
                        <span class="card-title">Le Paladin</span>
                        <?php $_SESSION['heroRage'] = 30 ?>
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
            <form method="POST" action="fight.php">
                <button class="waves-effect waves-light btn red accent-4" type="submit" name="fight">FIGHT</button>
            </form>
        </div>
    </div>

<?php } else if (isset($_POST['wizard'])) { ?>
    <div class="col l2 col m12 col s12 center">
        <p class="vsFight">VS</p>
    </div>

    <div class="col s12 col m12 col l5 center">
        <div class="card cardFight z-depth-5">
            <div class="card-image">
                <?php $_SESSION['heroImg'] = "img/mage.jpg" ?>
                <img src="img/mage.jpg" />
                <?php $_SESSION['heroName'] = "Le Mage" ?>
                <span class="card-title">Le Mage</span>
                <?php $_SESSION['heroRage'] = 20 ?>
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

    <div class="row center">
        <div class="col">
            <form method="POST" action="fight.php">
                <button class="waves-effect waves-light btn red accent-4" type="submit" name="fight">FIGHT</button>
            </form>
        </div>
    </div>


<?php } else if (isset($_POST['thief'])) { ?>
    <div class="col l2 col m12 col s12 center">
        <p class="vsFight">VS</p>
    </div>

    <div class="col s12 col m12 col l5 center">
        <div class="card cardFight z-depth-5">
            <div class="card-image">
                <?php $_SESSION['heroImg'] = "img/voleur.jpg" ?>
                <img src="img/voleur.jpg" />
                <?php $_SESSION['heroName'] = "Le Voleur" ?>
                <span class="card-title">Le Voleur</span>
                <?php $_SESSION['heroRage'] = 20 ?>
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

    <div class="row center">
        <div class="col">
            <form method="POST" action="fight.php">
                <button class="waves-effect waves-light btn red accent-4" type="submit" name="fight">FIGHT</button>
            </form>
        </div>
    </div>


<?php } else if (isset($_POST['webDeveloper'])) { ?>
    <div class="col l2 col m12 col s12 center">
        <p class="vsFight">VS</p>
    </div>

    <div class="col s12 col m12 col l5 center">
        <div class="card cardFight z-depth-5">
            <div class="card-image">
                <?php $_SESSION['heroImg'] = "img/dev.jpg" ?>
                <img src="img/dev.jpg" />
                <?php $_SESSION['heroName'] = "Le Développeur Web" ?>
                <span class="card-title">Le Développeur Web</span>
                <?php $_SESSION['heroRage'] = 40 ?>
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

    <div class="row fightRow">
        <div class="col">
            <form method="POST" action="fight.php">
                <button class="waves-effect waves-light btn red accent-4" type="submit" name="fight">FIGHT</button>
            </form>
        </div>
    </div>

<?php } else { ?>
    </div>

    <div class="row center-align">
        <div class="col l8 offset-l2 col m8 offset-m2 col s8 offset-s2">
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

    <div class="row center-align">
        <div class="col l8 offset-l2 col m8 offset-m2 col s8 offset-s2">
            <p id="demons" class="white-text gameCategoriesTitle">Les Démons</p>
        </div>
    </div>

    <div class="container">
        <div class="row z-depth-5" id="cardRowDemons">
            <div class="col l3 col m6 col s12">
                <div class="card black z-depth-5">
                    <div class="card-image">
                        <img src="img/zombie.jpg">
                        <span class="card-title">Le Revenant</span>
                    </div>
                    <div class="card-content white-text">
                        <p>Ennemi commun, le Revenant est un amas de chair et d'os qui tient debout grâce au pouvoir des nécromanciens !</p>
                    </div>
                </div>
            </div>
            <div class="col l3 col m6 col s12">
                <div class="card black z-depth-5">
                    <div class="card-image">
                        <img src="img/uruk.jpg">
                        <span class="card-title">L'Uruk Haï</span>
                    </div>
                    <div class="card-content white-text">
                        <p>Ennemi puissant, l'Uruk Haï est issu de la fusion de deux affreuses créatures !</p>
                    </div>
                </div>
            </div>
            <div class="col l3 col m6 col s12">
                <div class="card black z-depth-5">
                    <div class="card-image">
                        <img src="img/coronaviras.jpg">
                        <span class="card-title">Le Coronaviras</span>
                    </div>
                    <div class="card-content white-text">
                        <p>Ennemi dévastateur, le Coronuviras ne porte aucune attaque inutile !</p>
                    </div>
                </div>
            </div>
            <div class="col l3 col m6 col s12">
                <div class="card black z-depth-5">
                    <div class="card-image">
                        <img src="img/bug.jpg">
                        <span class="card-title">Le Bug</span>
                    </div>
                    <div class="card-content white-text">
                        <p>Hantise de tous les Développeurs Web, le Bug ne recule devant rien pour éradiquer son adversaire !</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

</body>

</html>