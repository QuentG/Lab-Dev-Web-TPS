<?php

abstract class Heal implements UsableInterface
{
    private string $name;
    private int|float $heal;

    public function __construct(string $name, int|float $heal)
    {
        $this->name = $name;
        $this->heal = $heal;
    }

    public function use(Pokemon $pokemon): bool
    {
        echo $this->name . ' lancée sur ' . $pokemon->getName() . '...';

        $this->heal = $pokemon->heal($this->heal);

        echo ' ' . $this->heal . ' PV rendus.' . PHP_EOL;

        return true;
    }

    public function getHeal(): int
    {
        return $this->heal;
    }
}
