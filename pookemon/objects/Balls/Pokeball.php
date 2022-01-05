<?php

require_once('Ball.php');

class Pokeball extends Ball
{
    public function __construct()
    {
        parent::__construct('Pokeball', 10);
    }
}