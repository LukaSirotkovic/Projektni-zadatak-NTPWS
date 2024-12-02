<?php
include '../../db_connect.php';


// Provjera postoji li 'id' u URL-u
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Osiguravamo da je id broj

    // Dohvati putanju slike ako postoji
    $result = $conn->query("SELECT s.putanja FROM slike s WHERE s.vijest_id = $id");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $slikaPutanja = $row['putanja'];
            if (file_exists($slikaPutanja)) {
                unlink($slikaPutanja); // Brišemo sliku s diska
            }
        }
    }

    // Brisanje vijesti i povezanih slika iz baze
    $deleteSlike = "DELETE FROM slike WHERE vijest_id = $id";
    $conn->query($deleteSlike);

    $deleteVijest = "DELETE FROM vijesti WHERE id = $id";
    if ($conn->query($deleteVijest) === TRUE) {
        echo "<script>
                alert('Vijest uspješno obrisana!');
                window.location.href = '../../index.php?menu=8'; // Povratak na upravljanje vijestima
              </script>";
    } else {
        echo "Greška pri brisanju vijesti: " . $conn->error;
    }
} else {
    echo "ID vijesti nije dostupan.";
}

$conn->close();
?>