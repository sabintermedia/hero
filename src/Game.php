<?php
namespace emag;

class Game {
    //Game settings
    //Hero Player stats ranges
    private $heroStats = [
        'name' => 'Orderus',
        'healthMin' => 70,
        'healthMax' => 100,
        'strengthMin' => 70,
        'strengthMax' => 80,
        'defenceMin' => 45,
        'defenceMax' => 55,
        'speedMin' => 40,
        'speedMax' => 50,
        'luckMin' => 10,
        'luckMax' => 30,
        'attackMulti' => 2,
        'attackChance' => 10,
        'defenceMulti' => 0.5,
        'defenceChance' => 20,
    ];

    //Beast Player stats ranges
    private $beastStats = [
        'name' => 'BeastyBoy',
        'healthMin' => 60,
        'healthMax' => 90,
        'strengthMin' => 60,
        'strengthMax' => 90,
        'defenceMin' => 40,
        'defenceMax' => 60,
        'speedMin' => 40,
        'speedMax' => 60,
        'luckMin' => 25,
        'luckMax' => 40,
    ];

    //actors
    private $beast;
    private $hero;
    private $attacker;
    private $defender;

    // battle constraints
    private $turn = 1;
    private $turnLimit = 21;

    public function __construct(){
        $this->beast = new Player($this->beastStats);
        $this->hero = new Hero($this->heroStats);
    }

    // choose starting player
    private function chooseStarter($beast,$hero): void
    {

        //compare luck if speed is the same for both players
        if($beast->speed == $hero->speed){
            echo "Hero and Beast have the same speed " . $beast->speed . ". Comparing luck" . PHP_EOL;
            if($beast->luck > $hero->luck){
                $this->attacker = $beast;
                $this->defender = $hero;
                echo "Beast luck: " . $beast->luck . PHP_EOL;
                echo "Hero luck: " . $hero->luck . PHP_EOL;
                echo "Beast is luckier than Hero" . PHP_EOL;
            }else{
                $this->attacker = $hero;
                $this->defender = $beast;
                echo "Beast luck: " . $beast->luck . PHP_EOL;
                echo "Hero luck: " . $hero->luck . PHP_EOL;
                echo "Hero is luckier than Beast" . PHP_EOL;
            }
        }else{// compare players' speeds
            if($beast->speed > $hero->speed){
                $this->attacker = $beast;
                $this->defender = $hero;
                echo "Beast speed: " . $beast->speed . PHP_EOL;
                echo "Hero speed: " . $hero->speed . PHP_EOL;
                echo "Beast is faster than Hero" . PHP_EOL;
            }else{
                $this->attacker = $hero;
                $this->defender = $beast;
                echo "Beast speed: " . $beast->speed . PHP_EOL;
                echo "Hero speed: " . $hero->speed . PHP_EOL;
                echo "Hero is faster than Beast" . PHP_EOL;
            }
        }
        
        echo PHP_EOL . $this->attacker->name . " starts the game as attacker. " . $this->defender->name . " as defender." . PHP_EOL . PHP_EOL;
    }
    // next turn, switch player positions 
    private function nextSwitch(): void
    {
        list($this->attacker, $this->defender) = array($this->defender, $this->attacker);
        $this->turn++;
        echo "Switching player's positions" . PHP_EOL.PHP_EOL;
    }

    public function start(): void
    {
        // print initial values for both players
        echo PHP_EOL . "/*** 'The Hero Game' ***/" . PHP_EOL;
        echo PHP_EOL . "Hero '" . $this->hero->name . "' initial stats:" . PHP_EOL;
        echo "Health: " . $this->hero->health . PHP_EOL;
        echo "Strength: " . $this->hero->strength . PHP_EOL;
        echo "Defence: " . $this->hero->defence . PHP_EOL;
        echo "Speed: " . $this->hero->speed . PHP_EOL;
        echo "Luck: " . $this->hero->luck . "%" . PHP_EOL;
        echo PHP_EOL . "Beast '" . $this->beast->name . "' initial stats:" . PHP_EOL;
        echo "Health: " . $this->beast->health . PHP_EOL;
        echo "Strength: " . $this->beast->strength . PHP_EOL;
        echo "Defence: " . $this->beast->defence . PHP_EOL;
        echo "Speed: " . $this->beast->speed . PHP_EOL;
        echo "Luck: " . $this->beast->luck . "%" . PHP_EOL;
        echo "--------------" . PHP_EOL . PHP_EOL;
        $next =  readline("Press any key to choose starting player" . PHP_EOL . PHP_EOL);
        $this->chooseStarter($this->beast,$this->hero);
        $next =  readline("Press any key to start battle" . PHP_EOL . PHP_EOL);

        //game loop
        while($this->turn <= $this->turnLimit){

            echo PHP_EOL . "/* Round " . $this->turn . PHP_EOL;

            // on-turn player attacks other Player
            // determine type of attack/defence depending on players' luck
            if(!$this->defender->getLuck()){
                    if($this->defender instanceof Hero){
                        echo "hero defending" . PHP_EOL;
                        $this->defender->heroDefend($this->attacker->attack());
                    }else{
                        echo "hero attacking" . PHP_EOL;
                        $this->defender->takeDamage($this->attacker->heroAttack());
                    }
                $this->nextSwitch();
            }else{
                echo $this->defender->name . " got lucky and " . $this->attacker->name . " missed" . PHP_EOL;
                $this->nextSwitch();
            }   
            
            echo "Hero health: " . $this->hero->health . PHP_EOL;
            echo "Beast health: " . $this->beast->health . PHP_EOL;

            //decalaration of winner
            if($this->hero->health <= 0){
                echo "Hero lost. The winner is " . $this->beast->name . PHP_EOL;
                break;
            }elseif($this->beast->health <= 0){
                echo "Beast lost. The winner is " . $this->hero->name . PHP_EOL;
                break;
            }
            $next = readline("** Press any key for next round **");
        }
    }
}
