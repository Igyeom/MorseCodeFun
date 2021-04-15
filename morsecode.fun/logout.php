<link href="style.css" rel="stylesheet" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<body style="background:black;color:white;">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">

<ul class="navbar-nav">
    <a class="navbar-brand" href="./">
    <img src="logo.png" alt="Logo" style="width:40px;">
    </a>
    <li class="nav-item">
    <a class="nav-link" href="keyer.php">Morse Keyer</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="translator.php">Morse Translator</a>
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
</body>
<?php
setcookie("login", $name, time() - 2592000);
echo("<br><br><br>Logged out!");
?>
