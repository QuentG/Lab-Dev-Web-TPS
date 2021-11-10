<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Météo - Accueil</title>
    <?php
        $now = (new DateTime())->format('H');
        if ($now >= 7 && $now <= 19) {
    ?>
        <link rel="stylesheet" href="./light.css">
    <?php } else { ?>
        <link rel="stylesheet" href="./dark.css">
    <?php } ?>
</head>
<body>
    <h3>Quelle météo voulez-vous voir ?</h3>
    <div>
        <ul>
            <li><a href="/paris.php">Paris</a></li>
            <li><a href="/bordeaux.php">Bordeaux</a></li>
        </ul>
    </div>
</body>
</html>