<?php

class Pokemon
{
    private string $name;
    private float $life;
    private float $maxLife;
    private int $level;
    private string $type;
    private int $strength;

    public function __construct(string $name, float $maxLife, int $level, string $type, int $strength)
    {
        $this->name = $name;

        $this->life = $maxLife;
        $this->maxLife = $maxLife;

        $this->level = $level;
        $this->type = $type;
        $this->strength = $strength;
    }

    public function levelUp(): void
    {
        $this->level++;
        $this->life += 5;
        $this->strength += 2;

        echo $this->name . ' passe au niveau ' . $this->level .
            "\nIl gagne 5 pts de vie et 2 pts de force. \n";

        echo '-----------------' . PHP_EOL;
    }

    public function attack(Pokemon $target): void
    {
        $attackValue = $this->strength * (rand(900, 1100) / 1000);

        echo $this->name . ' attaque ' . $target->name . ' !' . "\n";
        echo $target->name . ' perd ' . $attackValue . ' points de vie !' . "\n";

        $target->decreaseLife($attackValue);

        echo $target->name . ' a ' . $target->life . ' points de vie restants.' . "\n";

        echo '-----------------' . PHP_EOL;
    }

    public function decreaseLife(float $life): void
    {
        $this->life -= $life;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMaxLife(): float
    {
        return $this->maxLife;
    }

    public function getLife(): float
    {
        return $this->life;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }
}
