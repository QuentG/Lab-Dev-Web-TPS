<?php

header('Content-type: text/plain');

require_once("./objects/Carapuce.php");
require_once("./objects/Salameche.php");
require_once("./objects/Pokeball.php");

$pokeball = new Pokeball('Pokeball', 10);

echo 'Carapuce à toi de jouer ! ' . PHP_EOL;
$pokemon = new Carapuce(5);
echo '-----------------' . PHP_EOL;

echo 'Salamèche vient d\'apparaitre' . PHP_EOL;
$pokemonEnnemi = new Salameche(6);
echo '-----------------' . PHP_EOL;

$pokemon->attack($pokemonEnnemi);
$pokemonEnnemi->attack($pokemon);

$pokemon->attack($pokemonEnnemi);
$pokemonEnnemi->attack($pokemon);

echo "Lancement d'une " . $pokeball->getName() . " ! \n";

echo '-----------------' . PHP_EOL;

if ($pokeball->catch($pokemonEnnemi)) {
    $pokemon->levelUp();

    echo "Fin du combat \n";
} else {
    echo "La tentative de capture à échouée... \n";
    echo "Le pokémon s'est enfui... \n";
}
