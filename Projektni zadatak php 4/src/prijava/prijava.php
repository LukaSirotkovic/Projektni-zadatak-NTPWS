<?php
session_start();
include '../../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $lozinka = $_POST['lozinka'];

    $sql = "SELECT * FROM korisnici WHERE korisnicko_ime = '$korisnicko_ime'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($lozinka, $user['lozinka'])) {
            // Postavljanje sesije
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['uloga'] = $user['uloga'];
            $_SESSION['ime'] = $user['ime'];
            header("Location: ../../index.php");
            exit;
        } else {
            echo "Pogrešna lozinka!";
        }
    } else {
        echo "Korisničko ime ne postoji!";
    }
}

$conn->close();
?>