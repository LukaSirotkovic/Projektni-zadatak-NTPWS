<?php
include '../../db_connect.php';

if (isset($_GET['id'])) {
    $vijest_id = intval($_GET['id']);

    $sql = "UPDATE vijesti SET arhivirano = FALSE WHERE id = $vijest_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Vijest je uspješno vraćena iz arhive.');
                window.location.href = '../../index.php?menu=8';
              </script>";
    } else {
        echo "Greška: " . $conn->error;
    }
} else {
    echo "Nije odabran ID vijesti.";
}

$conn->close();
?>
