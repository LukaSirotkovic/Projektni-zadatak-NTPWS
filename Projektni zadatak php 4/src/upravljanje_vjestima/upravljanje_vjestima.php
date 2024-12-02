<?php
include 'db_connect.php';

// Provjera pristupa
if (!isset($_SESSION['uloga']) || ($_SESSION['uloga'] !== 'administrator' && $_SESSION['uloga'] !== 'editor')) {
    die("Nemate pravo pristupa ovoj stranici.");
}

// SQL upiti za aktivne i arhivirane vijesti
$sql_aktivne = "SELECT v.id, v.naslov, v.tekst, v.datum_objave, s.putanja AS slika 
                FROM vijesti v
                LEFT JOIN slike s ON v.id = s.vijest_id
                WHERE v.arhivirano = FALSE";

$sql_arhivirane = "SELECT v.id, v.naslov, v.tekst, v.datum_objave, s.putanja AS slika 
                   FROM vijesti v
                   LEFT JOIN slike s ON v.id = s.vijest_id
                   WHERE v.arhivirano = TRUE";

$result_aktivne = $conn->query($sql_aktivne);
$result_arhivirane = $conn->query($sql_arhivirane);

// Prikaz aktivnih vijesti
echo "<h1>Aktivne vijesti</h1>";
echo "<table border='1' style='width:100%; text-align:left; border-collapse:collapse; margin-bottom:20px;'>
        <tr>
            <th>Slika</th>
            <th>Naslov</th>
            <th>Tekst</th>
            <th>Datum objave</th>
            <th>Akcije</th>
        </tr>";

while ($row = $result_aktivne->fetch_assoc()) {
    echo "<tr>
            <td><img src='{$row['slika']}' alt='Slika vijesti' style='width:100px; height:auto;'></td>
            <td>{$row['naslov']}</td>
            <td>" . substr($row['tekst'], 0, 50) . "...</td>
            <td>{$row['datum_objave']}</td>
            <td>
                <a href='index.php?menu=11&id={$row['id']}'>Uredi</a> |
                <a href='src/arhiva_vijesti/delete_vijest.php?id={$row['id']}'>Obriši</a> | 
                <a href='src/arhiva_vijesti/arhiviraj_vijest.php?id={$row['id']}'>Arhiviraj</a>
            </td>
          </tr>";
}

echo "</table>";

// Prikaz arhiviranih vijesti
echo "<h1>Arhivirane vijesti</h1>";
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
                <a href='src/arhiva_vijesti/vrati_arhiviranu_vijest.php?id={$row['id']}'>Vrati iz arhive</a>
            </td>
          </tr>";
}

echo "</table>";

$conn->close();
?>
