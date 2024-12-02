<?php
include 'db_connect.php';

// Dohvaćanje vijesti
$result = $conn->query("SELECT v.id, v.naslov, v.tekst, v.datum_objave, k.korisnicko_ime 
                        FROM vijesti v 
                        JOIN korisnici k ON v.autor_id = k.id");

echo "<h1>Popis vijesti</h1>";
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Naslov</th>
            <th>Tekst</th>
            <th>Datum Objave</th>
            <th>Autor</th>
        </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['naslov']}</td>
            <td>{$row['tekst']}</td>
            <td>{$row['datum_objave']}</td>
            <td>{$row['korisnicko_ime']}</td>
          </tr>";
}
echo "</table>";

$conn->close();
?>
