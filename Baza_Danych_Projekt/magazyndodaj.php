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
    <link rel="stylesheet" href="magazyndodaj.css">
    <title>Add product</title>
</head>
<body>
    <div id="main">
        <div class="bg-image"><svg><image filter="url(#better-blur)"/></svg></div>
        <div class="bg-text-top">
        <nav id="magazyntext">
        <a href="magazyn.php">Stock</a>
        </nav>

        <nav id="zamowienia">
        <a href="zamowienia.php">Orders</a>
        </nav>

        <nav id="kontrahenci">
        <a href="">kontrahenci</a>
        </nav>
        </div>
        <input type="checkbox" id="check" onclick="myFunction()"> 
        <label for="check"><img src="menu-icon.jpg" id="menu"/></label>
        <div class="sidebar">
    <ul>
        <li>
            <a id="zalogowano">
            <?php
                if(isset($_SESSION['login']))
                    echo "<p>Logged in: ".$_SESSION['login'];
                ?>
            </a>
        </li>
        <li>
            <a>
            <span class="icon"></span>
            <span class="text"></span>
            </a>
        </li>
        <li>
            <a>
            <span class="icon"><img src="logout.png" id="logout"></span>
            <a href="wylogowanie.php" id="wyloguj">Log out</a>
            </a>
        </li>
    </ul>   
    </div>
    <article>
    <h1>FILL IN DATA</h1>
    <form action="produktdodaj.php" method="post">
                    <input type="text" name="marka" size="30" class="marka" required="">
                    <span class="marka">Brand</span></br></br>

                    
                    <input type="text" name="rozmiar" size="30" class="rozmiar" required="">
                    <span class="rozmiar">Size</span></br></br>

                    
                    <input type="text" name="model" size="30" class="model" required=""> 
                    <span class="model">Model</span></br></br>

                    
                    <input type="text" name="ilosc" size="30" class="ilosc" required=""> 
                    <span class="ilosc">Quantity</span></br></br>

                    
                    <input type="text" name="opis" size="30" class="opis" required=""> 
                    <span class="opis">Description</span></br></br>
                    <button type="submit" name="dodaj" size="30" class="zatwierdz">Save</button>
                </form></br>
    </article>
<script>
    function myFunction() {
  var x = document.getElementById("check");
  var img = document.createElement("img");
  var src = document.getElementById("menu");
  if (x.checked) {
    menu.src = "xicon.png";
  } else {
    menu.src = "menu-icon.jpg";
  }
  return x
}
</script>
</div>
</body>