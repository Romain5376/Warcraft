<?php
    require 'character.php';
    require 'hero.php';

    //Stats du paladin (santé,dégâts de l'arme,armure)
    $paladinHealth = rand(2000,3000);
    $paladinWeaponDamage = rand(400,600);
    $paladinShieldValue = rand(800,1500);

    //Stats du mage (santé,dégâts de l'arme,armure)
    $wizardHealth = rand(1000,1500);
    $wizardWeaponDamage = rand(600,800);
    $wizardShieldValue = rand(500,700);

    //Stats de l'assassin (santé,dégâts de l'arme,armure)
    $thiefHealth = rand(800,1300);
    $thiefWeaponDamage = rand(600,800);
    $thiefShieldValue = rand(300,400);

    //Stats du développeur web (santé,dégâts de l'arme,armure)
    $webDeveloperHealth = rand(1500,1800);
    $webDeveloperWeaponDamage = rand(400,700);
    $webDeveloperShieldValue = rand(300,500);

    //Objet Paladin
    $paladin = new hero($paladinHealth,0,'un espadon',$paladinWeaponDamage,'armure de plaques',$paladinShieldValue);
    //Objet Mage
    $wizard = new hero($wizardHealth,0,'un bâton des flammes froides',$wizardWeaponDamage,'robe noire',$wizardShieldValue);
    //Objet Voleur
    $thief = new hero($thiefHealth,0,'une dague empoisonnée',$thiefWeaponDamage,'cape de voleur',$thiefShieldValue);
    //Objet Développeur Web
    $webDeveloper = new hero($webDeveloperHealth,0,'un ordinateur vieillissant',$webDeveloperWeaponDamage,' armure de câbles RJ-45',$webDeveloperShieldValue);

    $orc = new orc(500,0);
?>

