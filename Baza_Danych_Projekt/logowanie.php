<?php
session_start();

if (isset($_SESSION['login'])){
  header("location:magazyn.php");
}

?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Baza Danych</title>
</head>
<body>
    <div id="main">
        <div class="bg-image"><svg><image filter="url(#better-blur)"/></svg></div>
        <div class="bg-text">
        <article>
            <h1>LOG IN</h1>
                <form action="login.php" method="post" >

                  <div class="spanlogin">
                    <input type="text" name="login" size="30" class="logowanie" required="" placeholder="">
                    <span>Username</span></br></br>
                    </div>

                    <div class="spanhaslo">
                    <input type="password" name="haslo" size="30" id="myInput" required="" placeholder=""> 
                    <input type="checkbox" id="check" onclick="myFunction()"> 
                    <span>Password</span></br></br>
                    <label for="check"><img src="hide.png" id="eyeicon"/></label>
                    </div>
                  
                    <?php if(isset($_GET["error"])):?>
                    <div class="error">Invalid login or password</div>
                    <?php endif; ?>

                    <button type="submit" name="loguj" class="loguj">LOG IN</button></br></br>
                </form>

        </article>
        </div>
    </div>
    <script>
      function myFunction() {
  var x = document.getElementById("myInput");
  var img = document.createElement("img");
  var src = document.getElementById("eyeicon");
  if (x.type === "password") {
    x.type = "text";
    eyeicon.src = "view.png";
  } else {
    x.type = "password";
    eyeicon.src = "hide.png";
  }
}

    </script>
    
</body>
</html>