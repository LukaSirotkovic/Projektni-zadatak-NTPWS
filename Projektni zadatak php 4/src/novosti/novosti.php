<?php
include 'db_connect.php'; // Uključite datoteku za spajanje na bazu podataka

// SQL upit za dohvaćanje aktivnih vijesti
$sql = " SELECT v.id, v.naslov, v.tekst, v.datum_objave, s.putanja AS slika 
FROM vijesti v
LEFT JOIN slike s ON v.id = s.vijest_id
WHERE v.arhivirano = FALSE AND v.odobreno = TRUE";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="HTML5 Stranica s člancima">
    <meta name="keywords" content="HTML5, članci, frontend, primjer">
    <meta name="author" content="Luka Sirotković">
    <title>Novosti</title>
</head>

<body>
    <main>
        <h1>Novosti</h1>
        <h2>Članci</h2>
        <section class="articles">
            <?php
            if ($result->num_rows > 0) {
                // Ispis svake vijesti kao članka
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <article>
                        <a href="#"><img src="' . htmlspecialchars($row['slika']) . '" alt="Thumbnail članka"></a>
                        <h2><a href="#">' . htmlspecialchars($row['naslov']) . '</a></h2>
                        <p class="date">Objavljeno: ' . date('d.m.Y.', strtotime($row['datum_objave'])) . '</p>
                        <p>' . substr(htmlspecialchars($row['tekst']), 0, 100) . '...</p>
                        <a href="#" class="read-more">Pročitaj više...</a>
                    </article>';
                }
            } else {
                echo '<p>Nema aktivnih vijesti.</p>';
            }
            ?>
        </section>
    </main>
</body>

</html>

<?php
$conn->close(); // Zatvaranje veze s bazom
?>