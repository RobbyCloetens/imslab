<?php
    $dbHost = "ID328350_more4help.db.webhosting.be";
    $dbUsername = "ID328350_more4help";
    $dbPassword = "more4help";
    $dbName = "ID328350_more4help";

    $conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
    

    $sql="SELECT vraag FROM vraag WHERE vak = 'Architectuur'";
    $result = mysqli_query($conn, $sql);
    $all_titels = $result -> fetch_all(MYSQLI_ASSOC);

    $sql1="SELECT naam FROM vraag WHERE vak = 'Architectuur'";
    $result1 = mysqli_query($conn, $sql1);
    $all_titels1 = $result1 -> fetch_all(MYSQLI_ASSOC);

    $sql2="SELECT vraag FROM vraag WHERE vak = 'Zorg'";
    $result2 = mysqli_query($conn, $sql2);
    $all_titels2 = $result2 -> fetch_all(MYSQLI_ASSOC);

    $sql3="SELECT naam FROM vraag WHERE vak = 'Zorg'";
    $result3 = mysqli_query($conn, $sql3);
    $all_titels3 = $result3 -> fetch_all(MYSQLI_ASSOC);

    $sql4="SELECT vraag FROM vraag WHERE vak = 'Economie'";
    $result4 = mysqli_query($conn, $sql4);
    $all_titels4 = $result4 -> fetch_all(MYSQLI_ASSOC);

    $sql5="SELECT naam FROM vraag WHERE vak = 'Economie'";
    $result5 = mysqli_query($conn, $sql5);
    $all_titels5 = $result5 -> fetch_all(MYSQLI_ASSOC);

    $sql6="SELECT vraag FROM vraag WHERE vak = 'Communicatie'";
    $result6 = mysqli_query($conn, $sql6);
    $all_titels6 = $result6 -> fetch_all(MYSQLI_ASSOC);

    $sql7="SELECT naam FROM vraag WHERE vak = 'Communicatie'";
    $result7 = mysqli_query($conn, $sql7);
    $all_titels7 = $result7 -> fetch_all(MYSQLI_ASSOC);

    $sql8="SELECT vraag FROM vraag WHERE vak = 'Informatica'";
    $result8 = mysqli_query($conn, $sql8);
    $all_titels8 = $result8 -> fetch_all(MYSQLI_ASSOC);

    $sql9="SELECT naam FROM vraag WHERE vak = 'Informatica'";
    $result9 = mysqli_query($conn, $sql9);
    $all_titels9= $result9 -> fetch_all(MYSQLI_ASSOC);

    $sql10="SELECT vraag FROM vraag WHERE vak = 'Toerisme'";
    $result10 = mysqli_query($conn, $sql10);
    $all_titels10 = $result10 -> fetch_all(MYSQLI_ASSOC);

    $sql11="SELECT naam FROM vraag WHERE vak = 'Toerisme'";
    $result11 = mysqli_query($conn, $sql11);
    $all_titels11= $result11 -> fetch_all(MYSQLI_ASSOC);

    $sql12="SELECT vraag FROM vraag WHERE vak = 'Talen'";
    $result12 = mysqli_query($conn, $sql12);
    $all_titels12 = $result12 -> fetch_all(MYSQLI_ASSOC);

    $sql13="SELECT naam FROM vraag WHERE vak = 'Talen'";
    $result13 = mysqli_query($conn, $sql13);
    $all_titels13= $result13 -> fetch_all(MYSQLI_ASSOC);

    $sql14="SELECT vraag FROM vraag WHERE vak = 'Onderwijs'";
    $result14 = mysqli_query($conn, $sql14);
    $all_titels14 = $result14 -> fetch_all(MYSQLI_ASSOC);

    $sql15="SELECT naam FROM vraag WHERE vak = 'Onderwijs'";
    $result15 = mysqli_query($conn, $sql15);
    $all_titels15= $result15 -> fetch_all(MYSQLI_ASSOC);

    

 
