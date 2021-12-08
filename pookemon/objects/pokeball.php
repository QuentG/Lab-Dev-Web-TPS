<?php

class Pokeball
{
    public string $name;
    public int $level;

    public function __construct(string $name, int $level)
    {
        $this->name = $name;
        $this->level = $level;
    }

    public function catch(Pokemon $target): bool
    {
        $successChances = round((($target->maxLife - $target->life) / $target->maxLife) * (1 + ($this->level - $target->level) / 25), 2);
        $random = rand(1, 100) / 100;

        if ($successChances >= $random) {
            echo $target->name . " a été capturé ! \n";
            echo '-----------------' . PHP_EOL;

            return true;
        }

        return false;
    }
}
