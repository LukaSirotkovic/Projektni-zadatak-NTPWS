<?php
// Dohvaćanje varijable iz URL-a
$menu = isset($_GET['menu']) ? $_GET['menu'] : 1;
?>

<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dinamička stranica</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <?php include 'navigation.php'; ?>

    <main>
        <?php
        // Učitavanje sadržaja na temelju varijable $menu
        switch ($menu) {
            case 1:
                include 'src/home/home.php';
                break;
            case 2:
                include 'src/novosti/novosti.php';
                break;
            case 3:
                include 'src/kontakt/kontakt.php';
                break;
            case 4:
                include 'src/o nama/o_nama.php';
                break;
            case 5:
                include 'src/galerija/galerija.php';
                break;
            case 6:
                include 'registracija_forma.php';
                break;
            case 7:
                include 'prijava_forma.php';
                break;
            default:
                include 'src/home/home.php';
        }

        ?>


    </main>

    <?php include 'footer.php'; ?>
</body>

</html>