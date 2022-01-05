<?php

class Bot
{
    public array $bag = [];
    public Pokemon $pokemon;
    public Pokemon $enemy;

    public function __construct(
        Pokemon $pokemon,
        Pokemon $enemy,
        array $bag
    ) {
        $this->pokemon = $pokemon;
        $this->enemy = $enemy;
        $this->bag = $bag;
    }

    public function countInBag(string $className): int
    {
        $count = 0;
        foreach ($this->bag as $item) {
            if (is_a($item, $className)) {
                $count++;
            }
        }

        return $count;
    }

    public function removeFromBag(string $className): bool
    {
        foreach ($this->bag as $key => $item) {
            if (is_a($item, $className)) {
                unset($this->bag[$key]);

                return true;
            }
        }

        return false;
    }

    public function getInBag(string $className): Ball|Heal|bool
    {
        foreach ($this->bag as $key => $item) {
            if (is_a($item, $className)) {
                return $this->bag[$key];
            }
        }

        return false;
    }

    public function calculMaxDamages(Pokemon $pokemon): float
    {
        return ceil($pokemon->getStrength() * (1100 / 1000));
    }

    public function calculMaxHeal(Heal $potion): float|int
    {
        return min(($this->pokemon->getMaxLife() - $this->pokemon->getLife()), $potion->getHeal());
    }

    public function couldKill(Pokemon $attackant, Pokemon $attacked): bool
    {
        return $this->calculMaxDamages($attackant) > $attacked->getLife();
    }

    public function captureProbability(): float|int
    {
        $pokeball = $this->getInBag('Pokeball');
        if (!$pokeball) {
            return 0;
        }

        return round((($this->pokemon->getMaxLife() - $this->pokemon->getLife()) / $this->pokemon->getMaxLife()) * (1 + ($pokeball->getLevel() - $this->pokemon->getLevel()) / 25), 2);
    }

    public function tryCatch(): bool
    {
        $pokeball = $this->getInBag('Pokeball');

        if (!$pokeball) {
            return false;
        }

        $success = $pokeball->use($this->enemy);
        $this->removeFromBag('Pokeball');

        return $success;
    }

    public function heal(Pokemon $pokemon, Heal $potion): bool
    {
        $heal = $potion->use($pokemon);
        $this->removeFromBag(get_class($potion));

        return $heal;
    }

    public function attack(): void
    {
        $damages = $this->pokemon->attack($this->enemy);

        echo $this->pokemon->getName() . ' attaque ' . $this->enemy->getName() . ' et inflige ' . $damages . ' dégâts.' . PHP_EOL;
    }

    public function play(): bool
    {
        // If we are sure to capture, do it in priority
        if ($this->captureProbability() >= 1) {
            return $this->tryCatch();
        }

        // If we can die in 2 turn or less, check if we can heal
        if ($this->pokemon->getLife() / 2 < $this->calculMaxDamages($this->enemy)) {
            $potion = $this->getInBag('Potion');
            $superpotion = $this->getInBag('Superpotion');

            // If we have potion, and potion can heal more than enemy damage
            if ($potion && $this->calculMaxHeal($potion) > $this->calculMaxDamages($this->enemy)) {
                $this->heal($this->pokemon, $potion);

                return false;
            }

            // Else, if we have superpotion, and superpotion heal more than enemy damage
            if ($superpotion && $this->calculMaxHeal($superpotion) > $this->calculMaxDamages($this->enemy)) {
                $this->heal($this->pokemon, $superpotion);

                return false;
            }
        }

        // If we can die, try to capture anyway
        if ($this->getInBag('Pokeball') && $this->couldKill($this->enemy, $this->pokemon)) {
            return $this->tryCatch();
        }

        // If we risk killing enemy, we don't attack
        if ($this->getInBag('Pokeball') && $this->couldKill($this->pokemon, $this->enemy)) {
            return $this->tryCatch();
        }

        // If we cannot do anything better, we attack
        $this->attack();

        return false;
    }
}
