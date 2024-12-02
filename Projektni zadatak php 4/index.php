<?php
// Dohvaćanje varijable iz URL-a
$menu = isset($_GET['menu']) ? $_GET['menu'] : 1;

// Dinamičko učitavanje CSS-a
$cssFile = '';
switch ($menu) {
    case 1:
        $cssFile = 'src/home/style.css';
        break;
    case 2:
        $cssFile = 'src/novosti/novosti.css';
        break;
    case 3:
        $cssFile = 'src/kontakt/kontakt.css';
        break;
    case 4:
        $cssFile = 'src/o nama/o_nama.css';
        break;
    case 5:
        $cssFile = 'src/galerija/galerija.css';
        break;
    case 6:
        $cssFile = 'src/registracija/registracija_forma.css';
        break;
    case 7:
        $cssFile = 'src/prijava/prijava_forma.css';
        break;
    case 8:
        $cssFile = 'src/upravljanje_vjestima/upravljanje_vjestima.css';
        break;
    case 9:
        $cssFile = 'src/dodaj_vijesti/dodaj_vijest.css';
        break;
    case 10:
        $cssFile = 'src/upravljanje_korisnicima/upravljanje_korisnicima.css';
        break;
    case 11:
        $cssFile = 'src/arhiva_vijesti/uredi_vijesti.css';
        break;
    default:
        $cssFile = 'src/home/style.css';
}
?>

<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $cssFile; ?>">
    <link rel="stylesheet" href="common.css">
    <title>Dinamička stranica</title>
</head>

<body>
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
                include 'src/registracija/registracija_forma.php';
                break;
            case 7:
                include 'src/prijava/prijava_forma.php';
                break;
            case 8:
                include 'src/upravljanje_vjestima/upravljanje_vjestima.php';
                break;
            case 9:
                include 'src/dodaj_vijesti/dodaj_vijest.php';
                break;
            case 10:
                include 'src/upravljanje_korisnicima/upravljanje_korisnicima.php';
                break;
            case 11:
                include 'src/arhiva_vijesti/uredi_vijesti.php';
                break;
            default:
                include 'src/home/home.php';
        }
        ?>
    </main>


    <?php include 'footer.php'; ?>
</body>

</html>