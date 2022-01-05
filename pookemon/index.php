<?php

header('Content-type: text/plain');

/* ---------------------------------
            IMPORTS
--------------------------------- */

// Interface needed for Ball && Heal
require_once('./objects/UsableInterface.php');

// Pokemons
require_once('./objects/Pokemons/Carapuce.php');
require_once('./objects/Pokemons/Bulbizarre.php');
require_once('./objects/Pokemons/Salameche.php');

// Potions
require_once('./objects/Potions/Potion.php');
require_once('./objects/Potions/Superpotion.php');
require_once('./objects/Potions/Hyperpotion.php');
require_once('./objects/Potions/Potionmax.php');

// Balls
require_once('./objects/Balls/Pokeball.php');
require_once('./objects/Balls/Superball.php');
require_once('./objects/Balls/Hyperball.php');
require_once('./objects/Balls/Masterball.php');

// Bot
require_once('./objects/Bot.php');

/* ---------------------------------
            PROGRAM
--------------------------------- */

echo "Vous invoquez Carapuce" . PHP_EOL;
$squirtle = new Carapuce(5);

echo "Votre ennemi invoque un Salamèche" . PHP_EOL;
$charmander = new Salameche(8);

$bag = [];
$bag[] = new Potion();
$bag[] = new Potion();
$bag[] = new Superpotion();
$bag[] = new Pokeball();
$bag[] = new Pokeball();
$bag[] = new Pokeball();

$bot = new Bot($squirtle, $charmander, $bag);

echo PHP_EOL;
echo PHP_EOL;
echo 'Début du combat !' . PHP_EOL;
echo '-----------------'. PHP_EOL;
echo PHP_EOL;

$myTurn = (bool) random_int(0, 1);
$end = false;

while (!$end) {
    echo $myTurn ? 'C\'est à votre tour : ' . PHP_EOL : 'C\'est au tour de votre adversaire' . PHP_EOL;
    echo "Carapuce : ". $squirtle->getLife(). " PV - Salamèche : ". $charmander->getLife() . " PV". PHP_EOL;

    if ($myTurn) {
        $captureSuccess = $bot->play();
        if ($captureSuccess) {
            $end = true;
        }
    } else {
        $damages = $charmander->attack($squirtle);
        echo $charmander->getName() . ' attaque '. $squirtle->getName() . ' et inflige '. $damages. ' dégâts.' . PHP_EOL;
    }

    if ($squirtle->isDead() || $charmander->isDead()) {
        $end = true;
    }

    echo PHP_EOL;

    $myTurn = !$myTurn;
}

echo '-----------------'. PHP_EOL;

if ($captureSuccess ?? false) {
    echo 'Bien joué, vous avez capturez Salamèche !' . PHP_EOL;
    echo 'Ça c\'était du sacré combat !' . PHP_EOL;
} elseif ($squirtle->isDead()) {
    echo 'Raté ! Votre Carapuce est KO !' . PHP_EOL;
} elseif ($charmander->isDead()) {
    echo 'Raté ! Vous avez mis ce pauvre Salamèche KO !' . PHP_EOL;
}

echo '-----------------'. PHP_EOL;
echo PHP_EOL;
echo 'Fin du combat !';