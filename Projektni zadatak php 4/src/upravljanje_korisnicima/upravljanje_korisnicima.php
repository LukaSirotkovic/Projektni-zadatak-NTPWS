<?php
include 'db_connect.php';
// Dohvaćanje korisnika
$result = $conn->query("SELECT * FROM korisnici");

echo "<h1>Upravljanje korisnicima</h1>";
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Email</th>
            <th>Korisničko ime</th>
            <th>Uloga</th>
            <th>Akcije</th>
        </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['ime']}</td>
            <td>{$row['prezime']}</td>
            <td>{$row['email']}</td>
            <td>{$row['korisnicko_ime']}</td>
            <td>{$row['uloga']}</td>
            <td>
                <form action='promjena_uloge.php' method='POST'>
                    <input type='hidden' name='id' value='{$row['id']}'>
                    <select name='nova_uloga'>
                        <option value='administrator' " . ($row['uloga'] === 'administrator' ? 'selected' : '') . ">Administrator</option>
                        <option value='editor' " . ($row['uloga'] === 'editor' ? 'selected' : '') . ">Editor</option>
                        <option value='user' " . ($row['uloga'] === 'user' ? 'selected' : '') . ">User</option>
                    </select>
                    <button type='submit'>Spremi</button>
                </form>
            </td>
          </tr>";
}
echo "</table>";

$conn->close();
?>