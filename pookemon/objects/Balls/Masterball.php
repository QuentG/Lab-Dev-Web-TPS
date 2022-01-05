<?php

require_once('Ball.php');

class Masterball extends Ball
{
    public function __construct()
    {
        parent::__construct('Masterball', 1);
    }

    public function tryCatch(Pokemon $target): bool
    {
        return true; // Catch 100%
    }
}
