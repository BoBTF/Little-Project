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
    <link rel="stylesheet" href="edit.css">
    <title>Edit Product</title>
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
    <h1>EDIT DATA</h1>
<?php
require_once "connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the data for the specified ID from the database
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    $query = "SELECT * FROM magazyn WHERE ID = $id";
    $result = mysqli_query($polaczenie, $query);
    $row = mysqli_fetch_array($result);

    // Display the form to edit the data
    echo '
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="' . $row['ID'] . '">

            <input class="marka" type="text" name="marka" value="' . $row['marka'] . '">
            <span class="marka">Brand</span></br></br>

            <input class="rozmiar" type="text" name="rozmiar" value="' . $row['rozmiar'] . '">
            <span class="rozmiar">Size</span></br></br>

            <input class="model" type="text" name="model" value="' . $row['model'] . '">
            <span class="model">Model</span></br></br>

            <input class="ilosc" type="text" name="ilosc" value="' . $row['ilosc'] . '">
            <span class="ilosc">Quantity</span></br></br>

            <input class="opis" type="text" name="opis" value="' . $row['opis'] . '">
            <span class="opis">Description</span></br></br></br>

            <button type="submit" name="update" size="30" class="zatwierdz">Save</button>
        </form>';

    // Close the database connection
    mysqli_close($polaczenie);
}
?>
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