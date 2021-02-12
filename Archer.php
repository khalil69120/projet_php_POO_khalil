<?php

class Archer extends Character
{
    private $arrow = 5;
    
    public function __construct($name) {
        parent::__construct($name);
        $this->damage = 10;
    }
    
    
    
    public function turn($target) {
        $rand = rand(1,2);
        if($this->arrow >= 2 && $rand=2){
            return $this->doubleArrows($target);
    } else if($this->arrow>=1 && $rand=1){
            return $this->arrow($target);
    } else if($this->arrow==0){
            return $this->normalAttack($target);
    }
    }


    public function arrow($target) {
        $arrowCost = 1 ;
        if ($arrowCost <= $this -> arrow){
            $damage = $arrowCost * 20 ; 
            $this -> arrow -= $arrowCost;
        }
        $target->setHealthPoints($damage);
        $target->isAlive();
        $status = "$this->name lance une grosse fleche $target->name à qui il reste $target->healthPoints points de vie ! Il reste $this->arrow flèches à $this->name !";
        return $status;
    }
    

    public function doubleArrows($target){
        $arrowCost = 2;
        if ($arrowCost <= $this->arrow){
            $damage = $arrowCost* 10;
            $this->arrow -= $arrowCost;
        } else if ($arrowCost > $this->arrow) {
            $damage = $this->arrow;
            $this->arrow = 0;
        }
        $target->setHealthPoints($damage);
        $target->isAlive();
        $status = "$this->name lance deux fleches rapide $target->name à qui il reste $target->healthPoints points de vie ! Il reste $this->arrow flèches à $this->name !";
        return $status;
    }

    

    public function normalAttack($target) {
        $target->setHealthPoints($this->damage);
        $target->isAlive();
        $status = "$this->name n'a plus de flèches et fait attaque normal $target->name il reste $target->healthPoints points de vie !";
        return $status;
    }
}