<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Provjera i obrada unosa vijesti
    if (!empty($_POST['naslov']) && !empty($_POST['tekst'])) {
        $naslov = $_POST['naslov'];
        $tekst = $_POST['tekst'];
        $autor_id = $_SESSION['id']; // Dohvaćanje korisničkog ID-a iz sesije

        // Postavljanje statusa "odobreno" na temelju korisničke uloge
        $odobreno = ($_SESSION['uloga'] === 'administrator') ? 1 : 0;

        // Priprema upita za unos vijesti
        $stmt = $conn->prepare("INSERT INTO vijesti (naslov, tekst, autor_id, odobreno) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $naslov, $tekst, $autor_id, $odobreno);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Vijest uspješno dodana!');
                  </script>";
            $vijest_id = $stmt->insert_id; // Dohvaćanje ID-a dodane vijesti
        } else {
            echo "Greška pri dodavanju vijesti: " . $stmt->error;
        }

        $stmt->close();
    }

    // Provjera i obrada unosa slike
    if (!empty($_FILES['slika']['name']) && !empty($vijest_id)) {
        $naziv = $_FILES['slika']['name'];
        $putanja = 'uploads/' . $naziv;

        // Provjera postojanja direktorija
        if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true); // Kreiraj direktorij s punim dopuštenjima
        }

        if (move_uploaded_file($_FILES['slika']['tmp_name'], $putanja)) {
            $sql = "INSERT INTO slike (naziv, putanja, vijest_id) VALUES ('$naziv', '$putanja', $vijest_id)";
            if ($conn->query($sql) === TRUE) {
                echo "<script>
                        alert('Slika uspješno dodana!');
                        window.location.href = 'index.php?menu=8'; // Preusmjeravanje na upravljanje vijestima
                      </script>";
            } else {
                echo "Greška pri dodavanju slike: " . $conn->error;
            }
        } else {
            echo "Greška pri učitavanju datoteke.";
        }
    }
}

$conn->close();
?>

<!-- Forma za unos vijesti i slike -->
<h2>Dodaj novu vijest</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <label for="naslov">Naslov vijesti:</label>
    <input type="text" name="naslov" required><br>

    <label for="tekst">Tekst vijesti:</label>
    <textarea name="tekst" required></textarea><br>

    <label for="slika">Odaberite sliku:</label>
    <input type="file" name="slika" required><br>

    <button type="submit">Dodaj vijest i sliku</button>
</form>