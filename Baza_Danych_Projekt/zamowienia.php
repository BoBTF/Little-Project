<?php
session_start(); 

if (!isset($_SESSION['login'])){
    header("location:logowanie.php");
}

?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="zamowienia.css">
    <title>Baza Danych</title>
</head>
<body>
    <div id="main">
        <div class="bg-image"><svg><image filter="url(#better-blur)"/></svg></div>
        <div class="bg-text-top"></div>
        <div class="bg-text-left"></div>

    <nav id="wyloguj">
    <a href="wylogowanie.php">Wyloguj</a>
    </nav>

    <nav id="magazyntext">
    <a href="magazyn.php">Magazyn</a>
    </nav>

    <nav id="zamowienia">
    <a href="zamowienia.php">Zamówienia</a>
    </nav>
</div>
</body>