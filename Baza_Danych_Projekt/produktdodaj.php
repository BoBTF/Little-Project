<?php
require_once "connect.php";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);


if($polaczenie->connect_error!=0)
{
    echo "Error: ".$polaczenie->connect_error . " Opis: ". $polaczenie->connect_error;
}
else
{
    $marka = $_POST['marka'];
    $rozmiar = $_POST['rozmiar'];
    $model = $_POST['model'];
    $ilosc = $_POST['ilosc'];
    $opis = $_POST['opis'];
    $sql = "INSERT INTO magazyn SET marka='$marka',rozmiar='$rozmiar', model='$model', ilosc='$ilosc', opis='$opis' ";
    $result = @$polaczenie->query($sql);

     header('Location: magazyn.php');

    $polaczenie->close();
}
?>