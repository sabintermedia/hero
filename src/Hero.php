<?php
namespace emag;

//include 'Skill.php';
// remove comments below to include Player class for testing with PHP Unit
// include 'Player.php'; 

class Hero extends Player{

    //extra skills for hero
    public $rapidStrike;
    public $magicShield;

    public function __construct($stats){
        parent::__construct($stats);
        $this->rapidStrike = new Skill("Rapid Strike", $stats['attackMulti'], $stats['attackChance'], 'attack');
        $this->magicShield = new Skill("Magic Shield", $stats['defenceMulti'], $stats['defenceChance'], 'defence');
    }

    //special hero attack skill taking chance into account
    public function heroAttack(){
        $chance = $this->rapidStrike->skillChance;
        $multi = $this->rapidStrike->skillValue;
        $rand = rand(0,100);

        if($rand<=$chance){
            echo "double attack" . PHP_EOL;
            return ($this->attack() * $this->rapidStrike->skillValue);
            
        }else{
            return ($this->attack());
        }
    }

    //special hero defence skill taking chance into account
    public function heroDefend($damage){
        $chance = $this->magicShield->skillChance;
        $multi = $this->magicShield->skillValue;
        $rand = rand(0,100);

        if($rand<=$chance){
            echo "magic shield defend" . PHP_EOL;
            echo "multi is " . $this->magicShield->skillValue .PHP_EOL;
            return ($this->takeDamage($damage * $this->magicShield->skillValue));
            
        }else{
            return ($this->takeDamage($damage));
        }
    }
}