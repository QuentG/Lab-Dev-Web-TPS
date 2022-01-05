<?php

require_once("Pokemon.php");

// Classe enfant = Une classe qui va hériter d'une classe Parent
class Salameche extends Pokemon
{
    public function __construct(int $level, ?int $life = null)
    {
        $name = 'Salameche';
        $maxLife = 100 + 5 * $level;
        $life = $life ?? $maxLife;
        $type = 'Feu';
        $strength = 10 + 2 * $level;

        parent::__construct($name, $life, $maxLife, $level, $type, $strength);
    }

    public static function sayHi(): void
    {
        echo "Sala !" . PHP_EOL;
    }

    public function levelUp(): void
    {
        $this->setLevel(1)
            ->setMaxLife(5)
            ->setLife(5)
            ->setStrength(4);

        echo $this->getName() . ' level up !' . PHP_EOL;
    }
}