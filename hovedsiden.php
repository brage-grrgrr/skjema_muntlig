<?php
session_start();

// skjeker om brukeren valgte å hoppe over loge inn
$skipLogin = isset($_GET['skip']) && $_GET['skip'] == 1;

// Database connection
$host = 'localhost';
$user = "brage";
$pass = "Drlig7i0+#$";
$db = "User_database";
$con = mysqli_connect($host, $user, $pass, $db);

// kjeker om det er noen tilkoblingsproblemer
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Determine if the user is logged in or if they skipped the login
$loggedIn = !$skipLogin && isset($_SESSION['bruker_id']);


// lukker database koblingen når den har gåt igjennnom allt
$con->close();
?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>rasputin</title>
    <link rel="stylesheet" href="style.css?v=1.0">
</head>
<style>
/* vis brukeren ikke er loget inn som for eksempel i at de hoppet over å loge inn så vil den gjøre så allt i klasen "endre" vis ingetning */
<?php if (!$loggedIn || $skipLogin) { ?>
    .endre {
        display: none;
    }
<?php } ?>

</style>
<body>

<div class="header">
  <h1 id="titel">Velkomen til netsiden hakke peiling</h1>
  <p>Vis du ikke er logget inn så vil noe av informasjonen bli gjemt</p>
</div>
<a class="endre">
<p>her kan du endre titetel på netsiden</p>

    <input type="text" name="fname" id="nyetittel"><br>
    <input type="button" onclick="endretitel()">
</a>
<div class="footer">ring ## ## ## ## eller send melding til Stop@ikkemob.com vis det er en feil i systemet</div>
    

    <script src="Javascript.JS"></script>
</body>
</html>