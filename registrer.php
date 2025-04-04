<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $host = 'localhost';
    $user = "brage";
    $pass = "Drlig7i0+#$";
    $db = "User_database";

    $con = mysqli_connect($host, $user, $pass, $db);

    if ($con->connect_error) {
        die("Tilkoblingsfeil: " . $con->connect_error);
    }

    // Hent data fra skjemaet
    $brukernavn = $_POST['brukernavn'];
    $passord = password_hash($_POST['passord'], PASSWORD_DEFAULT); // Hasher passordet


    // skjeker om brukernavnet finnes fra før av i databasen
    $usernameverifisiering = "SELECT * FROM account WHERE brukernavn = '$brukernavn'";
    $result = $con->query($usernameverifisiering);

    if ($result->num_rows > 0) {
        echo "Det finnes allerede en bruker med dette navnet" . $con->error;
    } else {
        // hvis det fungerer så vil den nye brukeren bli insertet inn i databasen
        $sql = "INSERT INTO account (brukernavn, passord) VALUES ('$brukernavn', '$passord')";
    }
    if ($con->query($sql) === TRUE) {
        echo "Bruker registrert! <a href='login.php'>Logg inn her</a>";
    } else {
        echo "Feil: " . $con->error;
    }

    $con->close();
}

?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Registrering</title>
    <link rel="stylesheet" href="style.css?v=1.0">
</head>
<body>
    <h1>Registrer deg</h1>
    <form action="registrer.php" method="POST">
        <input type="text" name="brukernavn" placeholder="skriv brukernavn" required>
        <input type="password" name="passord" placeholder="skriv passord" required>
        <button type="submit">Registrer</button>
    </form>


    <div class="footer">ring ## ## ## ## eller send melding til Stop@ikkemob.com vis det er en feil i systemet</div>
</body>
</html>