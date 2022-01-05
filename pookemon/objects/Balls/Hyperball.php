<?php

require_once('Ball.php');

class Hyperball extends Ball
{
    public function __construct()
    {
        parent::__construct('Hyperball', 50);
    }
}
