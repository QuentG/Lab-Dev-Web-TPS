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

        parent::__construct($name, $maxLife, $life, $level, $type, $strength);
    }

    public static function sayHi(): void
    {
        echo "Sala !\n";
    }
}