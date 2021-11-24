<?php

$dsn = "mysql:host=localhost:8889;dbname=pokedex";
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $exception) {
    echo $exception->getMessage();
    die();
}

echo "Connexion avec la BDD reussie !"

?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style.css">
    <title>Pokemon</title>
</head>
<body class="container">
    <h1>Mon Pokédex</h1>
    <?php
        $query = "SELECT * FROM pokemon";

        $results = $pdo->prepare($query);
        $results->execute();

        $pokemons = $results->fetchAll(PDO::FETCH_ASSOC);

        foreach ($pokemons as $pokemon) { ?>
           <p>
               <?php if ($pokemon['capturer']) { ?>
                   Capturé ! -
               <?php } ?>
               Je suis <?= $pokemon['nom'] ?> et mon type est : <?= $pokemon['type'] ?> / PUISSANCE : <?= $pokemon['puissance'] ?>
           </p>
        <?php } ?>

    <hr />

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $type = $_POST['type'];
            $puissance = $_POST['puissance'];
            // Méthode à privilégier.
            $capturer = $_POST['capturer'] ?? 0;

            $queryString = "INSERT INTO pokemon (nom, type, puissance, capturer) VALUES (:nom, :type, :puissance, :capturer)";
            $datas = [
                'nom' => $nom,
                'type' => $type,
                'puissance' => $puissance,
                'capturer' => $capturer ? 1 : 0,
            ];

            $query = $pdo->prepare($queryString);
            $query->execute($datas);
        }
    ?>

    <h2>Ajoute des pokémons !</h2>
    <form action="index.php" method="post" name="pokeform">
        <label>
            Nom du pokémon :
            <input type="text" name="nom">
        </label>
        <br>
        <label>
            Type du pokémon :
            <input type="text" name="type">
        </label>
        <br>
        <label>
            Puissance du pokémon :
            <input type="number" name="puissance">
        </label>
        <br>
        <label>
            Pokémon capturé ?
            <input type="checkbox" name="capturer">
        </label>
        <br>
        <button type="submit">Créer</button>
    </form>
</body>
</html>

