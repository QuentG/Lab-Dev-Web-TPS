<?php

require_once('Heal.php');

class Potion extends Heal
{
    public function __construct()
    {
        parent::__construct('Potion', 20);
    }
}
