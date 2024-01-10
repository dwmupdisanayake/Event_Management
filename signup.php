<?php
include 'db_config.php';

$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$reg = $_POST['reg'];
$email = $_POST['email'];
$password = $_POST['password'];
$pass = $_POST['repass'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($password === $pass) {
        $stmt = $conn->prepare("INSERT INTO users (fname, lname, reg, email, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $firstname, $lastname, $reg, $email, $password);
        $execval = $stmt->execute();

        if ($execval) {
            echo "<h2>Registration successfully...</h2>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();

        header('Location: log-in.html');
        exit;
    } else {
        echo "<h2>Error: Passwords do not match.</h2>";
    }
}
?>

