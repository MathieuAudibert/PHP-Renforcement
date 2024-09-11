<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription utilisateur</title>
</head>
<body>
    <h1>Inscription utilisateur</h1>
    <form method="post" action="index.php">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="prenom">Prenom:</label>
        <input type="text" id="prenom" name="prenom" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="mdp">Mot de passe:</label>
        <input type="password" id="mdp" name="mdp" required><br><br>

        <label for="niveauacces">Niveau d'accès:</label>
        <select id="niveauacces" name="niveauacces" required>
            <option value="<?php echo User::NIVEAU_ACCES_BASIC; ?>">Basique</option>
            <option value="<?php echo User::NIVEAU_ACCES_PREMIUM; ?>">Premium</option>
            <option value="<?php echo User::NIVEAU_ACCES_VIP; ?>">VIP</option>
        </select><br><br>

        <input type="submit" value="Créer utilisateur">
    </form>
</body>
</html>
