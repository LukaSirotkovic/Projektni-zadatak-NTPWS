<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nova_uloga = $_POST['nova_uloga'];

    // Ažuriranje uloge u bazi
    $sql = "UPDATE korisnici SET uloga = '$nova_uloga' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Vraćanje na stranicu za upravljanje korisnicima
        header("Location: index.php?menu=10");
        exit;
    } else {
        echo "Greška: " . $conn->error;
    }
}

$conn->close();
?>
