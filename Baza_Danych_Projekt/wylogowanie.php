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
    <link rel="stylesheet" href="wyloguj.css">
    <title>Baza Danych</title>
</head>
<body>
	<?php 
		session_unset();

        header('Location: logowanie.php');
	?>
        </div>
    </div>
</body>
</html>