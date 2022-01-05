<?php

require_once("Pokemon.php");

// Classe enfant = Une classe qui va hériter d'une classe Parent
class Carapuce extends Pokemon
{
    public function __construct(int $level, ?int $life = null)
    {
        $name = 'Carapuce';
        $maxLife = 100 + 5 * $level;
        $life = $life ?? $maxLife;
        $type = 'Eau';
        $strength = 10 + 2 * $level;

        parent::__construct($name, $life, $maxLife, $level, $type, $strength);
    }

    public static function sayHi(): void
    {
        echo "Cara !" . PHP_EOL;
    }

    public function levelUp(): void
    {
        $this
            ->setLevel(1)
            ->setMaxLife(5)
            ->setLife(5)
            ->setStrength(2);

        echo $this->getName() . ' passe au niveau ' . $this->getLevel() .
            PHP_EOL . "Il gagne 5 pts de vie et 2 pts de force." . PHP_EOL;

        echo '-----------------' . PHP_EOL;
    }
}