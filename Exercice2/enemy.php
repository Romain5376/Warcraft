<?php
    //La classe Hero hérite de la classe character
    class enemy extends character 
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
        public function revenant__toString()
        {
            return "Ennemi commun, le Revenant est un amas de chair et d'os qui tient debout grâce au pouvoir des nécromanciens.
            Il possède " . $this->weapon . " qui provoque " . $this->weaponDamage . " de dégâts " . " et il n'a " . $this->shield . " !";
        }

        //Description Mage
        public function urukHaï__toString()
        {
            return "Ennemi puissant, l'Uruk Haï est issu de la fusion de deux affreuses créatures.
            Il possède " . $this->weapon . " qui provoque " . $this->weaponDamage . " de dégâts " . ", il est équipé d'une " . $this->shield . " qui possède une valeur de " . $this->shieldValue . " !";
        }

        //Description Voleur
        public function coronuviras__toString()
        {
            return "Ennemi dévastateur, le Coronuviras ne porte aucune attaque inutile.
            Il possède " . $this->weapon . " qui provoque " . $this->weaponDamage . " de dégâts " . ", il est équipé d'une " . $this->shield . " qui possède une valeur de " . $this->shieldValue . " !";
        }

        //Description Développeur Web
        public function leBug__toString()
        {
            return "Hantise de tous les Développeurs Web, le Bug ne recule devant rien pour éradiquer son adversaire.
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