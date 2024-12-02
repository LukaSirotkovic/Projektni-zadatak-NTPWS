<?php
include '../../db_connect.php';

// Prikupljanje podataka iz forme
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$email = $_POST['email'];
$drzava = $_POST['drzava'];
$grad = $_POST['grad'];
$ulica = $_POST['ulica'];
$datum_rodenja = $_POST['datum_rodenja'];
$lozinka = password_hash($_POST['lozinka'], PASSWORD_BCRYPT); // Sigurno hashiranje lozinke

// Generiranje korisničkog imena
function generateUsername($ime, $prezime, $conn) {
    $username = strtolower(substr($ime, 0, 1) . $prezime); // npr. jkovic
    $broj = 1;
    $originalUsername = $username;

    // Provjera da li korisničko ime već postoji
    while (true) {
        $result = $conn->query("SELECT * FROM korisnici WHERE korisnicko_ime = '$username'");
        if ($result->num_rows == 0) {
            break; // Korisničko ime nije zauzeto
        }
        $username = $originalUsername . $broj;
        $broj++;
    }
    return $username;
}

$korisnicko_ime = generateUsername($ime, $prezime, $conn);

// Unos podataka u bazu
$sql = "INSERT INTO korisnici (ime, prezime, email, drzava, grad, ulica, datum_rodenja, korisnicko_ime, lozinka) 
        VALUES ('$ime', '$prezime', '$email', '$drzava', '$grad', '$ulica', '$datum_rodenja', '$korisnicko_ime', '$lozinka')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Registracija uspješna! Vaše korisničko ime je: $korisnicko_ime');
        window.location.href = '../../index.php?menu=7';
    </script>";
} else {
    echo "Greška: " . $conn->error;
}

$conn->close();
?>
