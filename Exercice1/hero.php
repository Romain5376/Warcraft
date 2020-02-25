<?php
    //La classe Hero hérite de la classe character
    class hero extends character 
    {
        //Attributs de la classe hero
        private $weapon/*Arme*/;
        private $weaponDamage/*Dégât de l'arme*/;
        private $shield/*Bouclier*/;
        private $shieldValue/*Valeur du bouclier*/;

        //Méthode get weapon
        public function getWeapon() 
        {
            return $this-> weapon;
        }
        //Méthode get weaponDamage
        public function getWeaponDamage() 
        {
            return $this-> weaponDamage;
        }

        public function setWeaponDamage($valueWeaponDamage) 
        {
            $this->weaponDamage = $valueWeaponDamage;
        }

        //Méthode get shield
        public function getShield() 
        {
            return $this-> shield;
        }
        //Méthode get shieldValue
        public function getShieldValue() 
        {
            return $this-> shieldValue;
        }

        public function setShieldValue($shieldValue) 
        {
            $this->shieldValue = $shieldValue;
        }
        /**
         * Constructeur
         *
         * @param [type] $health
         * @param [type] $rage
         * @param [type] $weapon
         * @param [type] $weaponDamage
         * @param [type] $shield
         * @param [type] $shieldValue
         */
        public function __construct($valueHealth, $valueRage, $weapon, $weaponDamage, $shield, $shieldValue)
        {
            parent::__construct($valueHealth,$valueRage);
            $this->weapon = $weapon;
            $this->weaponDamage = $weaponDamage;
            $this->shield = $shield;
            $this->shieldValue = $shieldValue;
        }

        //Description Paladin
        public function paladin__toString()
        {
            return "Héros des premières lignes, son rôle est de protéger ses alliés en encaissant le plus de dégâts possible.
            Il possède " . $this->weapon . " qui provoque " . $this->weaponDamage . " de dégâts " . ", il est équipé d'une " . $this->shield . " qui possède une valeur de " . $this->shieldValue . " !";
        }

        //Description Mage
        public function wizard__toString()
        {
            return "Héros de l'arrière-ligne, son rôle est de causer le plus de dégâts possibles en invoquant de puissants sorts.
            Il possède " . $this->weapon . " qui provoque " . $this->weaponDamage . " de dégâts " . ", il est équipé d'une " . $this->shield . " qui possède une valeur de " . $this->shieldValue . " !";
        }

        //Description Voleur
        public function thief__toString()
        {
            return "Héros de l'ombre, le voleur se faufile dans les rangs ennemis afin d'en finir le plus rapidement possible.
            Il possède " . $this->weapon . " qui provoque " . $this->weaponDamage . " de dégâts " . ", il est équipé d'une " . $this->shield . " qui possède une valeur de " . $this->shieldValue . " !";
        }

        //Description Développeur Web
        public function webDeveloper__toString()
        {
            return "Héros de support, le Développeur Web a pour but de réparer les soi-disant bugs qui ont causé la chute de son Paladin protecteur.
            Il possède " . $this->weapon . " qui provoque " . $this->weaponDamage . " de dégâts " . ", il est équipé d'une " . $this->shield . " qui possède une valeur de " . $this->shieldValue . " !";
        }

        //Méthode attacked
        public function attacked($damage) 
        {
            //Points de dégâts - points d'armure sur les points de vie
            $this->setHealth($this->getHealth() - ($damage - $this->shieldValue));
        }

        public function rageGain($rage) 
        {
            //
            $this->setRage($this->getRage() + $rage);
        }

        public function attack() 
        {
            $this->setWeaponDamage($this->getWeaponDamage());
        }
    }
?>