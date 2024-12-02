<?php
include 'db_connect.php';

// Provjera pristupa
if (!isset($_SESSION['uloga']) || ($_SESSION['uloga'] !== 'administrator' && $_SESSION['uloga'] !== 'editor')) {
    die("Nemate pravo pristupa ovoj stranici.");
}

// Provjeri da li je zatražen prikaz arhiviranih vijesti
$arhivirane = isset($_GET['arhivirane']) && $_GET['arhivirane'] === '1';

// Postavi odgovarajući SQL upit
if ($arhivirane) {
    $sql = "SELECT v.id, v.naslov, v.tekst, v.datum_objave, s.putanja AS slika 
            FROM vijesti v
            LEFT JOIN slike s ON v.id = s.vijest_id
            WHERE v.arhivirano = TRUE";
    $naslov_stranice = "Arhivirane vijesti";
} else {
    $sql = "SELECT v.id, v.naslov, v.tekst, v.datum_objave, s.putanja AS slika 
            FROM vijesti v
            LEFT JOIN slike s ON v.id = s.vijest_id
            WHERE v.arhivirano = FALSE";
    $naslov_stranice = "Aktivne vijesti";
}

$result = $conn->query($sql);

// Gumb za prebacivanje
echo "<h1>$naslov_stranice</h1>";
echo "<a href='index.php?menu=8' style='display:inline-block; margin-bottom:20px; padding:10px 20px; background-color:#007bff; color:white; text-decoration:none; border-radius:5px;'>Prikaži arhivirane vijesti</a>";
echo "<a href='index.php?menu=11' style='display:inline-block; margin-bottom:20px; padding:10px 20px; background-color:#007bff; color:white; text-decoration:none; border-radius:5px;'>Povratak na aktivne vijesti</a>";

// Tablica s vijestima
echo "<table border='1' style='width:100%; text-align:left; border-collapse:collapse;'>
        <tr>
            <th>Slika</th>
            <th>Naslov</th>
            <th>Tekst</th>
            <th>Datum objave</th>
            <th>Akcije</th>
        </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td><img src='{$row['slika']}' alt='Slika vijesti' style='width:100px; height:auto;'></td>
            <td>{$row['naslov']}</td>
            <td>" . substr($row['tekst'], 0, 50) . "...</td>
            <td>{$row['datum_objave']}</td>
            <td>";
    
    if (!$arhivirane) {
        echo "<a href='edit_vijest.php?id={$row['id']}'>Uredi</a> | 
              <a href='src/arhiva_vijesti/delete_vijest.php?id={$row['id']}'>Obriši</a> | 
              <a href='src/arhiva_vijesti/arhiviraj_vijest.php?id={$row['id']}'>Arhiviraj</a>";
    } else {
        echo "<a href='src/arhiva_vijesti/vrati_arhiviranu_vijest.php?id={$row['id']}'>Vrati iz arhive</a>";
    }
    
    echo "</td></tr>";
}

echo "</table>";

$conn->close();
?>


menu 11 otvara sve arhivirane vijesti, popravi kod tako da dodas istu tablicu samo sa arhiviranim vijestima

<?php
echo "<h2>Arhivirane vijesti</h2>";
echo "<table border='1' style='width:100%; text-align:left; border-collapse:collapse;'>
        <tr>
            <th>Slika</th>
            <th>Naslov</th>
            <th>Tekst</th>
            <th>Datum objave</th>
            <th>Akcije</th>
        </tr>";

while ($row = $result_arhivirane->fetch_assoc()) {
    echo "<tr>
            <td><img src='{$row['slika']}' alt='Slika vijesti' style='width:100px; height:auto;'></td>
            <td>{$row['naslov']}</td>
            <td>" . substr($row['tekst'], 0, 50) . "...</td>
            <td>{$row['datum_objave']}</td>
            <td>
                <a href='unarchive_vijest.php?id={$row['id']}'>Vrati iz arhive</a>
            </td>
          </tr>";
}

echo "</table>";
?>