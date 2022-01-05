<?php

class Pokeball
{
    private string $name;
    private int $level;

    public function __construct(string $name, int $level)
    {
        $this->name = $name;
        $this->level = $level;
    }

    public function catch(Pokemon $target): bool
    {
        $successChances = round((($target->getMaxLife() - $target->getLife()) / $target->getMaxLife()) * (1 + ($this->level - $target->getLevel()) / 25), 2);
        $random = rand(1, 100) / 100;

        if ($successChances >= $random) {
            echo $target->getName() . " a été capturé ! \n";
            echo '-----------------' . PHP_EOL;

            return true;
        }

        return false;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $newName): void
    {
        $this->name = $newName;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel($level): void
    {
        $this->level = $level;
    }
}
