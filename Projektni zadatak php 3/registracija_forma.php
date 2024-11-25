<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
</head>
<body>
    <h1>Registracija</h1>
    <form action="registracija.php" method="POST">
        <label for="ime">Ime:</label>
        <input type="text" id="ime" name="ime" required><br>

        <label for="prezime">Prezime:</label>
        <input type="text" id="prezime" name="prezime" required><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="drzava">Država:</label>
        <select id="drzava" name="drzava" required>
            <?php
            include 'db_connect.php';
            $result = $conn->query("SELECT naziv FROM drzave");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['naziv'] . "'>" . $row['naziv'] . "</option>";
            }
            ?>
        </select><br>

        <label for="grad">Grad:</label>
        <input type="text" id="grad" name="grad" required><br>

        <label for="ulica">Ulica:</label>
        <input type="text" id="ulica" name="ulica" required><br>

        <label for="datum_rodenja">Datum rođenja:</label>
        <input type="date" id="datum_rodenja" name="datum_rodenja" required><br>

        <label for="lozinka">Lozinka:</label>
        <input type="password" id="lozinka" name="lozinka" required><br>

        <button type="submit">Registriraj se</button>
    </form>
</body>
</html>
