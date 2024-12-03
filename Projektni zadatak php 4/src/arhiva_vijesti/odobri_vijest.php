<?php
// Uključivanje konekcije na bazu podataka
include '../../db_connect.php';

// Provjera pristupa - samo administrator može odobriti vijesti
session_start();
if (!isset($_SESSION['uloga']) || $_SESSION['uloga'] !== 'administrator') {
    die("Nemate pravo pristupa ovoj stranici.");
}

// Provjera je li ID vijesti proslijeđen
if (isset($_GET['id'])) {
    $vijest_id = intval($_GET['id']);

    // Ažuriranje statusa odobrenja vijesti
    $sql_odobri = "UPDATE vijesti SET odobreno = 1 WHERE id = $vijest_id";

    if ($conn->query($sql_odobri) === TRUE) {
        echo "<script>
                alert('Vijest je uspješno odobrena.');
                window.location.href = '../../index.php?menu=8'; // Povratak na upravljanje vijestima
              </script>";
    } else {
        echo "<script>
                alert('Došlo je do greške prilikom odobravanja vijesti.');
                window.location.href = '../../index.php?menu=8'; // Povratak na upravljanje vijestima
              </script>";
    }
} else {
    echo "<script>
            alert('Nije proslijeđen ID vijesti.');
            window.location.href = '../../index.php?menu=8'; // Povratak na upravljanje vijestima
          </script>";
}

$conn->close();
?>
