<?php
namespace emag;
/**
 * Basic player object class 
 * 
 */
class Player{

    // exposed properties (stats)
    public $name = "Player";
    public $health;
    public $strength;
    public $defence;
    public $speed;
    public $luckMin;
    public $luckMax;
    public $lucky = false;

    public function __construct($stats){
        $this->name = $stats['name'];
        $this->health = rand($stats['healthMin'], $stats['healthMax']);
        $this->strength = rand($stats['strengthMin'], $stats['strengthMax']);
        $this->defence = rand($stats['defenceMin'], $stats['defenceMax']);
        $this->speed = rand($stats['speedMin'], $stats['speedMax']);
        $this->luck = rand($stats['luckMin'], $stats['luckMax']);
        $this->luckMin = $stats['luckMin'];
        $this->luckMax = $stats['luckMax'];
    }

    //standard attack
    public function attack(){
        $damage = ($this->strength - $this->defence);
        echo $this->name . " attacked with " . $damage . PHP_EOL;
        return $damage;
    }

    //standard infliction of damage
    public function takeDamage($damage){
        $this->health -= $damage;
        echo $this->name . " health is now " . $this->health . PHP_EOL;
    }

    // luck determination used each turn
    public function getLuck(){
        //Calculating LUCK
        $luck = rand(0,100);
        if(($this->luckMin <= $luck) && ($luck <= $this->luckMax)){
            $this->lucky = true;
            //Player is lucky
        }else{
            $this->lucky = false;
            //Player is unlucky
        }
        return $this->lucky;
    }
}