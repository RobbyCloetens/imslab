<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maak jouw vraag!</title>
    <link rel="stylesheet" type="text/css" href="../css/vakken.css">
</head>
<body>
    <ul>
        <li><a href="../homepage.php" class="vakbalk" id="home">Home</a></li>
        <li><a href="../contact.html" class="vakbalk">Over ons</a></li>
        <li><a href="./architectuur.php" class="vakbalk">Architectuur</a></li>
        <li><a href="./communicatie.php" class="vakbalk">Communcatie</a></li>
        <li><a href="./economie.php" class="vakbalk">Economie</a></li>
        <li><a href="./informatica.php" class="vakbalk">Informatica</a></li>
        <li><a href="./onderwijs.php" class="vakbalk">Onderwijs</a></li>
        <li><a href="./talen.php" class="vakbalk">Talen</a></li>
        <li><a href="./toerisme.php" class="vakbalk">Toerisme</a></li>
        <li><a href="./zorg.php" class="vakbalk">Zorg</a></li>
        <li style="float:right"><img id="logo_balk_homepage" src="../Fotos/Logo.jpg" alt="logo" width="60" height="40"></li>
    </ul>
    <h1>Maak jouw vraag hier!</h1>
    <div class = "containervraag">
        <form action="invoegen.php" method="POST">
            <p>Naam:</p>
            <input class = "formname" type="text" name = "naam" required>
            <p>Onderwerp:</p>
            <select Name="onderwerp" Size="8" class="formonderwerp" required>
                <option value="Architectuur"> Architectuur </option>
                <option value="Communicatie"> Communicatie </option>
                <option value="Economie"> Economie </option>
                <option value="Informatica"> Informatica </option>
                <option value="Onderwijs"> Onderwijs </option>
                <option value="Talen"> Talen </option>
                <option value="Toerisme"> Toerisme </option>
                <option value="Zorg"> Zorg </option>
            </select>
            <p>Titel:</p>
            <input class = "formtitel" type="text" name = "titel" required>
            <p>Vraag:</p>
            <textarea class = "formvraag" rows="20" cols="89" name = "vraag" required></textarea>
            <br>
            <input type="submit" class = "verzend" value="Verzend jouw vraag">
        </form>
    </div>
</body>
</html>