<?php

require_once("PokemonInterface.php");

// Classe Parent = Une classe sur laquelle d'autre classe vont se baser
abstract class Pokemon implements PokemonInterface
{
    private string $name;
    private float $life;
    private float $maxLife;
    private int $level;
    private string $type;
    protected int $strength;

    public function __construct(
        string $name,
        int $life,
        float $maxLife,
        int $level,
        string $type,
        int $strength
    ) {
        $this->name = $name;
        $this->life = $life;
        $this->maxLife = $maxLife;
        $this->level = $level;
        $this->type = $type;
        $this->strength = $strength;

        static::sayHi();
    }

    abstract public static function sayHi(): void;

    abstract public function levelUp(): void;

    public function attack(Pokemon $target): float|int
    {
        $attackValue = $this->strength * (random_int(900, 1100) / 1000);

        echo $this->name . ' attaque ' . $target->name . ' !' . PHP_EOL;
        echo $target->name . ' perd ' . $attackValue . ' points de vie !' . PHP_EOL;

        $target->decreaseLife($attackValue);

        echo $target->name . ' a ' . $target->life . ' points de vie restants.' . PHP_EOL;

        echo '-----------------' . PHP_EOL;

        return $attackValue;
    }

    public function decreaseLife(float $life): void
    {
        $this->life -= $life;
    }

    public function heal(float|int $heal): int|float
    {
        $newLife = min($this->life + $heal, $this->maxLife);

        $prevLife = $this->life;
        $this->life = $newLife;

        return $newLife - $prevLife;
    }

    public function isDead(): bool
    {
        return $this->life <= 0;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMaxLife(): float
    {
        return $this->maxLife;
    }

    public function setMaxLife(float $maxLife): self
    {
        $this->maxLife += $maxLife;

        return $this;
    }

    public function getLife(): float
    {
        return $this->life;
    }

    public function setLife(float|int $life): self
    {
        $this->life += $life;

        return $this;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level += $level;

        return $this;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function setStrength(int $strength): self
    {
        $this->strength += $strength;

        return $this;
    }
}
