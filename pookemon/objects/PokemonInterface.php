<?php

interface PokemonInterface
{
    public function levelUp(): void;

    public function attack(Pokemon $target): void;
}