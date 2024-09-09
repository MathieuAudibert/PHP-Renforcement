<?php
$message = "Salut les amis";
$email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : '';
$password = isset($_POST["password"]) ? htmlspecialchars($_POST["password"]) : '';
?>

<!DOCTYPE html>
<html lang="fr-FR" dir="ltr">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
    <div class="image-background"></div>
</head>

<body>

    <?php if ($message !== null) { ?>
        <h1><?= $message ?></h1>
    <?php } ?>

    <form action="" method="POST">
        <input name="email" type="email" placeholder="Entrez votre email" value="<?= $email ?>">
        <input name="password" type="password" placeholder="Entrez votre mot de passe" value="<?= $password ?>">
        <button type="submit">Valider</button>
    </form>

</body>

</html>