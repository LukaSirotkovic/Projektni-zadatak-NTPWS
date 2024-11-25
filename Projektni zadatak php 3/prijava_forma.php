<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
</head>
<body>
    <h1>Prijava</h1>
    <form action="prijava.php" method="POST">
        <label for="korisnicko_ime">Korisničko ime:</label>
        <input type="text" id="korisnicko_ime" name="korisnicko_ime" required><br>

        <label for="lozinka">Lozinka:</label>
        <input type="password" id="lozinka" name="lozinka" required><br>

        <button type="submit">Prijavi se</button>
    </form>
</body>
</html>
