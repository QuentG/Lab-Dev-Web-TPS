<?php

require_once('Ball.php');

class Superball extends Ball
{
    public function __construct()
    {
        parent::__construct('Superball', 30);
    }
}