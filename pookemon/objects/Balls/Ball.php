<?php

abstract class Ball implements UsableInterface
{
    private string $name;
    private int $level;

    public function __construct(string $name, int $level)
    {
        $this->name = $name;
        $this->level = $level;
    }

    protected function tryCatch(Pokemon $target): bool
    {
        $successChances = round((($target->getMaxLife() - $target->getLife()) / $target->getMaxLife()) * (1 + ($this->level - $target->getLevel()) / 25), 2);
        $random = random_int(1, 100) / 100;

        if ($successChances >= $random) {
            echo $target->getName() . " a été capturé !" . PHP_EOL;
            echo '-----------------' . PHP_EOL;

            return true;
        }

        return false;
    }

    public function use(Pokemon $pokemon): bool
    {
        echo $this->name . ' lancée sur ' . $pokemon->getName() . '... ';

        if (!$this->tryCatch($pokemon)) {
            echo "Loupé !" . PHP_EOL;

            return false;
        }

        echo  $pokemon->getName() . ' a été capturé !' . PHP_EOL;

        return true;
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
