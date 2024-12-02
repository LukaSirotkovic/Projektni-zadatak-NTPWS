<?php
include 'db_connect.php';


// Provjera ID-a vijesti
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Neispravan ID vijesti.");
}

$id = intval($_GET['id']);

// Dohvati vijest iz baze
$sql = "SELECT v.id, v.naslov, v.tekst, s.putanja AS slika 
        FROM vijesti v
        LEFT JOIN slike s ON v.id = s.vijest_id
        WHERE v.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Vijest nije pronađena.");
}

$row = $result->fetch_assoc();

// Ažuriraj vijest
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naslov = $_POST['naslov'];
    $tekst = $_POST['tekst'];

    $sql_update = "UPDATE vijesti 
                   SET naslov = ?, tekst = ?
                   WHERE id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ssi", $naslov, $tekst, $id);

    if ($stmt_update->execute()) {
        header("Location: index.php?menu=8");
        exit;
    } else {
        echo "Došlo je do pogreške prilikom ažuriranja vijesti.";
    }

    $stmt_update->close();
    $conn->close();
    exit;
}

$conn->close();
?>

<h1>Uredi vijest</h1>
<form action="" method="post">
    <label for="naslov">Naslov:</label><br>
    <input type="text" id="naslov" name="naslov" value="<?php echo htmlspecialchars($row['naslov']); ?>"
        required><br><br>

    <label for="tekst">Tekst:</label><br>
    <textarea id="tekst" name="tekst" rows="10" cols="50"
        required><?php echo htmlspecialchars($row['tekst']); ?></textarea><br><br>

    <label>Trenutna slika:</label><br>
    <?php if ($row['slika']): ?>
        <img src="<?php echo htmlspecialchars($row['slika']); ?>" alt="Slika vijesti"
            style="width:200px; height:auto;"><br><br>
    <?php else: ?>
        <p>Slika nije dostupna.</p>
    <?php endif; ?>

    <button type="submit">Spremi promjene</button>
</form>