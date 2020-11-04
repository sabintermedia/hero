<?php
namespace emag\Test;

use PHPUnit\Framework\TestCase;

final class HeroTest extends TestCase
{
    private $heroStats = [
        'name' => 'Emagenius',
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

    function testHeroAttack(){

        $hero = new \emag\Hero($this->heroStats);
        $attack = $hero->attack();

        $this->assertIsInt($attack);
    }

    function testGetLuck(){

        $hero = new \emag\Hero($this->heroStats);
        $luck = $hero->getLuck();

        $this->assertIsBool($luck);
    }

}
