<?php

require_once('Heal.php');

class Hyperpotion extends Heal
{
    public function __construct()
    {
        parent::__construct('Hyperpotion', 200);
    }
}
