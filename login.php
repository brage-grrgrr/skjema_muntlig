<?php
session_start(); // Start en sesjon for å huske brukeren

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Koble til databasen
    $host = "localhost";
    $user = "brage";
    $pass = "Drlig7i0+#$";
    $db = "User_database";
    
    $con = mysqli_connect($host, $user, $pass, $db);

    // Sjekk tilkobling
    if ($con->connect_error) {
        die("Tilkoblingsfeil: " . $con->connect_error);
    }

    // Hent data fra skjemaet
    $brukernavn = $_POST['brukernavn'];
    $passord = $_POST['passord'];
    // Sjekk om brukeren finnes i databasen
    $sql = "SELECT * FROM account WHERE brukernavn = '$brukernavn'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Bruker finnes, sjekk passordet
        $row = $result->fetch_assoc();
        if (password_verify($passord, $row['passord'])) {
            // Passordet er riktig, lagre brukerens info i sesjonen
            $_SESSION['bruker_id'] = $row['id'];
            $_SESSION['brukernavn'] = $row['brukernavn'];
            header("Location: hovedsiden.php"); // Omviderer til velkomstside
            exit();
        } else {
            echo "Feil brukernavn eller passord.";
        }
    } else {
        echo "Feil brukernavn ellerr passord.";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Logg inn</title>
    <link rel="stylesheet" href="style.css?v=1.0">
</head>
<style>
</style>
<body>
    <h1>Logg inn</h1>
    <form action="login.php" method="POST">
        <input type="text" name="brukernavn" placeholder="brukernavn" required>
        <input type="password" name="passord" placeholder="passord" required>
        <button type="submit">Logg inn</button>
    </form>

    <a href="welcome.php?skip=1">Skip Login</a>
    <div class="footer">ring ## ## ## ## eller send melding til Stop@ikkemob.com vis det er en feil i systemet</div>
</body>
</html>
