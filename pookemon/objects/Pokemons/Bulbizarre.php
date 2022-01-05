<?php

require_once("Pokemon.php");

class Bulbizarre extends Pokemon
{
    public function __construct(int $level, ?int $life = null)
    {
        $name = 'Bulbizarre';
        $maxLife = 7 * $level;
        $life = min($life, $maxLife) ?? $maxLife;
        $type = 'Herbe';
        $strength = 3 * $level;

        parent::__construct($name, $life, $maxLife, $level, $type, $strength);
    }

    public function levelUp(): void
    {
        $this->setLevel(1)
            ->setMaxLife(7)
            ->setLife(7)
            ->setStrength(3);

        echo $this->getName() . ' level up !' . PHP_EOL;
    }

    public static function sayHi(): void
    {
        echo "Bulbi !" . PHP_EOL;
    }
}
