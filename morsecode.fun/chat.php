<?php

  include('db.php');

  if (isset($_POST['msg']) and isset($_POST['submit'])) {

    $stmt = $conn->prepare("INSERT INTO chat (sender, message) VALUES (?, ?)");
    $stmt->bind_param("ss", $_COOKIE['login'], $_POST['msg']);
    $stmt->execute();

  }

  $result = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM chat WHERE id >= "));
  echo($result[0]['sender'].': '.$result[0]['message']);
  $result_file = fopen("data.txt", "w");
  fwrite($result_file, $result['sender'].': '.$result['message']);
  fclose($result_file);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>morsecode.fun - juicyguyzer</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script>
      function ajax() {
        $(".chatbox").load('data.txt');
      }
      setInterval(ajax, 500)
    </script>
  </head>
  <body style="color:white;background:black;">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">

    <ul class="navbar-nav">
        <a class="navbar-brand" href="./">
        <img src="logo.png" alt="Logo" style="width:40px;">
        </a>
        <li class="nav-item">
        <a class="nav-link" href="chat.php">Morse Chat</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="keyer.php">Morse Keyer</a>
        </li>
        <?php
          if(isset($_COOKIE['login'])) {
            echo("<li class='nav-item'>
                    <a class='nav-link' href='profile.php?user=".$_COOKIE['login']."'>Your Profile</a>
                    </li>
                    <li class='nav-item'>
                    <a class='nav-link' href='logout.php'>Log Out</a>
                    </li>
                    <li class='nav-item'>");
            if ($_COOKIE['login'] == "juicy") {
              echo("<a class='nav-link' href='settings.php'>Settings</a>
              <li class='nav-item'>
              <a class='nav-link'><img src='./custompfp/juicy.jpg' width='20' height='20' style='border-radius: 50%;'></img></a>
              </li>");
            } else if ($_COOKIE['login'] == "alilt5") {
                echo("<a class='nav-link' href='settings.php'>Settings</a>
                <li class='nav-item'>
                <a class='nav-link'><img src='./custompfp/alilt5.jpg' width='20' height='20' style='border-radius: 50%;'></img></a>
                </li>");
            } else {
              echo("<a class='nav-link' href='settings.php'>Settings</a>
              <li class='nav-item'>
              <a class='nav-link'><img src='pfp.jpg' width='20' height='20' style='border-radius: 50%;'></img></a>
              </li>");
            }
          } else {
            echo("<li class='nav-item'>
                    <a class='nav-link' href='register.php'>Register</a>
                    </li>
                    <li class='nav-item'>
                    <a class='nav-link' href='login.php'>Log In</a>
                    </li>");
          }
        ?>

    </ul>
    </nav>
    <br>
    <br>
    <br>
    <div class="chatbox" style="background-color: #333;">
      <a href="#">morseboi</a>: <p>cq</p>
    </div>
    <button id="key" style="color: black; background-color: lime;" onmousedown="red();" onmouseup="lime();">Key</button>
    <p>Frequency:</p>
    <input type="number" value="1000" id="freq" min="300" max="1000">
    <input type="submit" value="Set Frequency" id="submit" onmousedown="setfreq();" onmouseup="black();">
    <form action="#" method="POST">
      <input id="result" name="msg" value="" style="background-color:#444;font-size:12pt;" readonly>
      <input type="submit" value="Send" name="submit" style="background-color:#3f0;font-size:12pt;color:black;">
    </form>
    <br><br><br><br>
    <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc/4.0/88x31.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">Creative Commons Attribution-NonCommercial 4.0 International License</a>.
  </body>
</html>
