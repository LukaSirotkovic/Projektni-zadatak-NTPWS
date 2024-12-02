<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<nav>
    <ul>
        <li><a href="index.php?menu=1">Početna stranica</a></li>
        <li><a href="index.php?menu=2">Novosti</a></li>
        <li><a href="index.php?menu=3">Kontakt</a></li>
        <li><a href="index.php?menu=4">O nama</a></li>
        <li><a href="index.php?menu=5">Galerija</a></li>
        <li><a href="index.php?menu=6">Registracija</a></li>
        <li><a href="index.php?menu=7">Prijava</a></li>
        <?php if (isset($_SESSION['uloga']) && ($_SESSION['uloga'] === 'administrator' || $_SESSION['uloga'] === 'editor')) { ?>
            <li><a href="index.php?menu=8">Upravljanje vijestima</a></li>
            <li><a href="index.php?menu=9">Dodaj vijest</a></li>
        <?php } ?>
        <?php if (isset($_SESSION['uloga']) && $_SESSION['uloga'] === 'administrator') { ?>
            <li><a href="index.php?menu=10">Upravljanje korisnicima</a></li>
        <?php } ?>
        <?php if (isset($_SESSION['ime'])) { ?>
            <li><a href='#'> Dobrodošli, <?php echo htmlspecialchars($_SESSION['ime']); ?>
                (<?php echo htmlspecialchars($_SESSION['uloga']); ?>)</a></li>
        <?php } ?>
    </ul>
</nav>

