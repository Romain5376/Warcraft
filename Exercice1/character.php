<?php
    class character {
        //Attributs
        private $health;
        private $rage;
        //Méthode get
        public function getHealth()
        {
            return $this->health;
        }
        //Méthode set
        public function setHealth($valueHealth) 
        {
            $this->health = $valueHealth; 
        }
        //Méthode get
        public function getRage() 
        {
            return $this->rage;
        }
        //Méthode set
        public function setRage($valueRage) 
        {
            $this->rage = $valueRage;
        }
        /**
         * Constructeur
         *
         * @param [type] $valueHealth
         * @param [type] $valueRage
         */
        public function __construct($valueHealth, $valueRage)
        {
            $this->setHealth($valueHealth);
            $this->setRage($valueRage);
        }
    }
?>