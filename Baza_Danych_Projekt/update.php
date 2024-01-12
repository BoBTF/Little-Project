<?php
require_once "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $id = $_POST['id'];
    $marka = $_POST['marka'];
    $rozmiar = $_POST['rozmiar'];
    $model = $_POST['model'];
    $ilosc = $_POST['ilosc'];
    $opis = $_POST['opis'];

    // Update the record in the database
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    $query = "UPDATE magazyn SET marka = '$marka', rozmiar = '$rozmiar', model = '$model', ilosc = '$ilosc', opis = '$opis' WHERE ID = $id";
    mysqli_query($polaczenie, $query);

    // Close the database connection
    mysqli_close($polaczenie);

    // Redirect back to the main page (magazyn.php)
    header("Location: magazyn.php");
    exit();
}
?>