<?php 
			
	session_start();

	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);


	if($polaczenie->connect_error!=0)
	{
		echo "Error: ".$polaczenie->connect_error . " Opis: ". $polaczenie->connect_error;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];

			$sql ="SELECT * FROM uzytkownicy WHERE login='$login' AND haslo='$haslo' ";

		 if($result = @$polaczenie->query($sql))
		 {
		 	$ilu_uzytkownikow = $result->num_rows;
		 	if($ilu_uzytkownikow>0)
		 	{
		 		$wiersz = $result->fetch_assoc();
		 		$_SESSION['login'] = $wiersz['login'];


		 		$result->free_result();

		 		header('Location: magazyn.php');
		 	}else{
				header('Location: logowanie.php?error=1');
		 	}
		 }

		$polaczenie->close();
    }

?>