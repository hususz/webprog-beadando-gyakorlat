<?php
$hiba = false;
$visszajelzes = "";

if (isset($_POST['nev']) && isset($_POST['email']) && isset($_POST['uzenet'])) {
    $nev = $_POST['nev'];
    $email = $_POST['email'];
    $szoveg = $_POST['uzenet'];

    if (strlen($nev) < 5) {
        $hiba = true;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hiba = true;
    }
    if (strlen($szoveg) < 10) {
        $hiba = true;
    }

    if (!$hiba) {
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=gyakorlat7', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

            $vendeg = isset($_SESSION['login']) ? 0 : 1;
            $mentett_nev = isset($_SESSION['login']) ? $_SESSION['login'] : $nev;

            $sql = "INSERT INTO uzenetek (nev, email, uzenet, vendeg) VALUES (:nev, :email, :uzenet, :vendeg)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ':nev' => $mentett_nev,
                ':email' => $email,
                ':uzenet' => $szoveg,
                ':vendeg' => $vendeg
            ));
            
            $visszajelzes = "Sikeres üzenetküldés!";
        } catch (PDOException $e) {
            $visszajelzes = "Hiba történt az adatbázis mentés során.";
        }
    } else {
        $visszajelzes = "Helytelenül kitöltött űrlap!";
    }
}
?>