<?php

    $dbHost = "ID328350_more4help.db.webhosting.be";
    $dbUsername = "ID328350_more4help";
    $dbPassword = "more4help";
    $dbName = "ID328350_more4help";

    $conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
    




    $naam = $_POST["naam"];
    $vak = $_POST["onderwerp"];
    $titel = $_POST["titel"];
    $vraag = $_POST["vraag"];
    
    $sql ="INSERT INTO vraag (vraag, naam, vak, titel) VALUES ('$vraag', '$naam', '$vak', '$titel')";
    mysqli_query($conn, $sql);

    header("location: architectuur.php");
    echo $vak;

    switch ($vak) {
        case "Architectuur":
            header("location: architectuur.php");
            break;
        case "Communicatie":
            header("location: communicatie.php");
            break;
        case "Economie":
            header("location: economie.php");
            break;
        case "Informatica":
            header("location: informatica.php");
            break;
        case "Onderwijs":
            ("location: onderwijs.php");
            break;
        case "Talen":
            header("location: talen.php");
            break;
        case "Toerisme":
            header("location: toerisme.php");
            break;
        case "Zorg":
            header("location: zorg.php");
            break;
    }
    
?>

