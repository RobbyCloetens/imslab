<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Economie</title>
    <link rel="stylesheet" type="text/css" href="../css/vakken.css">
</head>
<body>
    <ul>
        <li><a class="active" href="../homepage.php" class="vakbalk" id="home">Home</a></li>
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
    <h2>Economie</h2>
    <a href = "./vraag.php" class = "createvraag"> Vraag aanmaken </a>
    <div class = "container">
        <div class = "posts-table">
        <div class = "posts-table">
            <div class = "table-head">
                <div class = "subjects">Vragen</div>
                <div class = "replies">Gepost door</div>
            </div>
            <?php
            include_once "./core/init.php";
            ?>

                    <div class = "table-row">
                        <div class = "subjects">
                                <?php 
                                    include "get.php";
                                    

                                    foreach ($all_titels4 as $titles4) { ?>
                                        <a class = "atitels" href="#">
                                        <?php
                                        echo "<li>" . $titles4['vraag']. "</li>", "</br>";
                                        ?>
                                    </a>
                                        <?php
                                    }
                                ?>

                                
                    </div>
                    <div class ="replies">
                                <?php 
                                    include "get.php";
                                    

                                    foreach ($all_titels5 as $titles5) { ?>
                                        <a class = "atitels" href="#">
                                        <?php
                                        echo "<li>", "gepost door " . $titles5['naam']. "</li>", "</br>";
                                        ?>
                                    </a>
                                        <?php
                                    }
                                ?>
                    </div>
                </div>
            
        </div>
    </div>
</body>
</html>