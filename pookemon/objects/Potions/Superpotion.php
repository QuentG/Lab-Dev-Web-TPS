<?php

include_once('Heal.php');

class Superpotion extends Heal
{
    public function __construct()
    {
        parent::__construct('Superpotion', 50);
    }
}
