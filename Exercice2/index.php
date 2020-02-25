<?php
    require 'character.php';
    require 'hero.php';

    //Stats du Paladin (santé,dégâts de l'arme,armure)
    $paladinHealth = rand(2000,3000);
    $paladinWeaponDamage = rand(400,600);
    $paladinShieldValue = rand(800,1500);

    //Stats du Mage (santé,dégâts de l'arme,armure)
    $wizardHealth = rand(1000,1500);
    $wizardWeaponDamage = rand(600,800);
    $wizardShieldValue = rand(500,700);

    //Stats du Voleur (santé,dégâts de l'arme,armure)
    $thiefHealth = rand(800,1300);
    $thiefWeaponDamage = rand(600,800);
    $thiefShieldValue = rand(300,400);

    //Stats du Développeur web (santé,dégâts de l'arme,armure)
    $webDeveloperHealth = rand(1500,1800);
    $webDeveloperWeaponDamage = rand(400,700);
    $webDeveloperShieldValue = rand(300,500);

    //Stats du Revenant (santé,dégâts de l'arme,armure)
    $revenantHealth = rand(1000,1300);
    $revenantWeaponDamage = rand(200,400);

    //Stats de l'Uruk Haï (santé,dégâts de l'arme,armure)
    $urukHaïHealth = rand(1500,2000);
    $urukHaïWeaponDamage = rand(500,800);
    $urukHaïShieldValue = rand(700,1000);

    //Stats du Coronuviras (santé,dégâts de l'arme,armure)
    $coronuvirasHealth = rand(2000,3000);
    $coronuvirasWeaponDamage = rand(700,1000);
    $coronuvirasShieldValue = rand(500,700);

    //Stats du Bug (santé,dégâts de l'arme,armure)
    $bugHealth = rand(1,9999);
    $bugWeaponDamage = rand(500,800);
    $bugShieldValue = rand(10,600);

    //Objet Paladin
    $paladin = new hero($paladinHealth,0,'un espadon',$paladinWeaponDamage,'armure de plaques',$paladinShieldValue);
    //Objet Mage
    $wizard = new hero($wizardHealth,0,'un bâton des flammes froides',$wizardWeaponDamage,'robe noire',$wizardShieldValue);
    //Objet Voleur
    $thief = new hero($thiefHealth,0,'une dague empoisonnée',$thiefWeaponDamage,'cape de voleur',$thiefShieldValue);
    //Objet Développeur Web
    $webDeveloper = new hero($webDeveloperHealth,0,'un ordinateur vieillissant',$webDeveloperWeaponDamage,'armure de câbles RJ-45',$webDeveloperShieldValue);
    //Objet Revenant
    $revenant = new enemy($revenantHealth,0,'ses ongles',$revenantWeaponDamage,'aucune armure',0);
    //Objet Uruk Haï
    $urukHaï = new enemy($urukHaïHealth,0,'un fléau',$urukHaïWeaponDamage,'armure de piques',$urukHaïShieldValue);
    //Objet Coronaviras 
    $coronaviras = new enemy($coronuvirasHealth,0,'une masse',$coronuvirasWeaponDamage,'armure en peau de chauve-souris',$coronuvirasShieldValue);
    //Objet Le Bug 
    $bug = new enemy($bugHealth,0,'AiremeTiréAireÉfÉToile',$bugWeaponDamage,"armure d'erreurs système",$bugShieldValue);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Warcraft 4</title>
</head>
<body>
    
</body>
</html>



