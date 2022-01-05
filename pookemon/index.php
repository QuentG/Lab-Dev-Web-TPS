<?php

header('Content-type: text/plain');

require_once("./objects/pokemon.php");
require_once("./objects/pokeball.php");

$pokeball = new Pokeball('Pokeball', 10);

$pokemon = new Pokemon('Carapuce', 100, 8, 'Eau', 20);

$pokemonEnnemi = new Pokemon('Salameche', 100, 5, 'Feu', 10);

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
