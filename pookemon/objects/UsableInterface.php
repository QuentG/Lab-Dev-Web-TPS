<?php

interface UsableInterface
{
    public function use(Pokemon $pokemon): bool;
}