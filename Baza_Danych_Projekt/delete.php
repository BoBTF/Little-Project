<?php
require_once "connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record with the specified ID from the database
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    $query = "DELETE FROM magazyn WHERE ID = $id";
    mysqli_query($polaczenie, $query);

    // Close the database connection
    mysqli_close($polaczenie);

    // Redirect back to the main page after deletion
    header("Location: magazyn.php");
    exit();
}
?>