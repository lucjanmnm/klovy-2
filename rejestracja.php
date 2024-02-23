<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "php_db";

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Rejestracja zakończona pomyślnie!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
</head>
<body>
    <h2>Rejestracja</h2>
    <form action="" method="post">
        <label for="username">Nazwa użytkownika:</label>
        <input type="text" id="username" name="username">
        <br>
        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password">
        <br>
        <button type="submit">Zarejestruj</button>
    </form>
</body>
</html>
