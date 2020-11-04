<?php
namespace emag;
class Skill{

    //public properties
    public $skillName = "Skill";
    public $skillValue = 0;
    public $skillChance = 0;
    public $skillType = '';
    public $chance;

    public function __construct($name, $value, $chance, $type){
        $this->skillName = $name;
        $this->skillValue = $value;
        $this->skillChance = $chance;
        $this->skillType = $type;
    }

    //getters and setters

    // public function updateSkill($name, $value, $chance){
    //     setSkillName($name);
    //     setSkillValue($value);
    //     setSkillChance($chance);
    //     echo(PHP_EOL . "Skill updated to " . $this->skillValue);
    // }
    //
    // public function getSkillName(){
    //     return $this->skillName;
    // }
    // public function getSkillValue(){
    //     return $this->skillValue;
    // }
    // public function getSkillChance(){
    //     return $this->skillChance;
    // }
    //
    // public function setSkillName($name) {
    //     $this->skillName = $name;
    // }
    // public function setSkillValue($value) {
    //     $this->skillValue = $value;
    // }
    // public function setSkillChance($chance) {
    //     $this->skillChance = $chance;
    // } 
    
}