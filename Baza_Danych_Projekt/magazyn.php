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
    <link rel="stylesheet" href="magazyn.css">
    <title>Stock</title>
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
    <input type="text" id="searchInput" placeholder="Search...">
    <table id="dataTable">
    <tr id="abovetable">
        <td id="id">#</td>
        <td id="marka">Brand</td>
        <td id="rozmiar">Size</td>
        <td id="model">Model</td>
        <td id="ilosc">Quantity</td>
        <td id="opis">Description</td>
    </tr>

    <?php
    require_once "connect.php";

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    mysqli_query($polaczenie, "ALTER TABLE magazyn AUTO_INCREMENT = 1");

    $wynik = mysqli_query($polaczenie, "SELECT ID, marka, rozmiar, model, ilosc, opis FROM magazyn");

    while ($row = mysqli_fetch_array($wynik)) {
        echo '<tr>';
        echo '<td class="small-cell">' . $row['ID'] . '</td>';
        echo '<td class="medium-cell">' . $row['marka'] . '</td>';
        echo '<td class="small-cell">' . $row['rozmiar'] . '</td>';
        echo '<td class="medium-cell">#' . $row['model'] . '</td>';
        echo '<td class="small-cell">' . $row['ilosc'] . ' pcs.</td>';
        echo '<td class="big-cell">' . $row['opis'] . '</td>';
        echo '<td id="buttons">
                <a href="edit.php?id=' . $row['ID'] . '"><img id="edit" src="edit.png"></img></a> 
                <a href="delete.php?id=' . $row['ID'] . '"><img id="delete" src="delete.png"></img></a>
              </td>';
        echo '</tr>';
    }

    // Close the database connection
    mysqli_close($polaczenie);
    ?>
</table><br><br>
        <a href="magazyndodaj.php"><img id="plus" src="plus.png"></img></a>
        
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

// Function to handle search input changes
function handleSearchInput() {
  var searchInput = document.getElementById('searchInput').value;
  var table = document.getElementById('dataTable');
  var rows = table.getElementsByTagName('tr');

  // Loop through all the rows and hide/show based on the search query
  for (var i = 1; i < rows.length; i++) {
    var row = rows[i];
    var rowData = row.textContent.toLowerCase();
    if (rowData.includes(searchInput.toLowerCase())) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  }
}

// Add event listener to the search input
document.getElementById('searchInput').addEventListener('input', handleSearchInput);
</script>
</div>
</body>