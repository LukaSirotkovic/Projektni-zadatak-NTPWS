<?php
include 'db_connect.php';

$korisnicko_ime = $_POST['korisnicko_ime'];
$lozinka = $_POST['lozinka'];

// Provjera korisnika
$sql = "SELECT * FROM korisnici WHERE korisnicko_ime = '$korisnicko_ime'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($lozinka, $user['lozinka'])) {
        echo "Prijava uspješna! Dobrodošli, " . $user['ime'];
        // Postavite sesiju ako je potrebno
    } else {
        echo "Pogrešna lozinka!";
    }
} else {
    echo "Korisničko ime ne postoji!";
}

$conn->close();
?>
