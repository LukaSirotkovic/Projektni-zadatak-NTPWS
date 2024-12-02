<?php
include '../../db_connect.php';



// Provjera ID-a vijesti
if (isset($_GET['id'])) {
    $vijest_id = intval($_GET['id']);

    // Oznaka vijesti kao arhivirane
    $sql = "UPDATE vijesti SET arhivirano = TRUE WHERE id = $vijest_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Vijest je uspješno arhivirana.');
                window.location.href = '../../index.php?menu=8'; // Povratak na upravljanje vijestima
              </script>";
    } else {
        echo "Greška: " . $conn->error;
    }
} else {
    echo "Nije odabran ID vijesti.";
}

$conn->close();
?>
