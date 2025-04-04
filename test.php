<?php
$user = "brage";
$password = "Drlig7i0+#$";
$database = "User_database";
$table = "account";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  echo "<h2>TODO</h2><ol>";
  foreach($db->query("SELECT brukernavn FROM $table") as $row) {
    echo "<li>" . $row['brukernavn'] . "</li>";
  }
  echo "</ol>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}