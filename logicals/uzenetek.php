<?php
if (!isset($_SESSION['login'])) {
    header("Location: ?oldal=belepes");
    exit;
}

$uzenetek_lista = array();

try {
    $dbh = new PDO('mysql:host=localhost;dbname=gyakorlat7', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
    
    $sql = "SELECT nev, email, uzenet, datum, vendeg FROM uzenetek ORDER BY datum DESC";
    $stmt = $dbh->query($sql);
    $uzenetek_lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $uzenetek_lista = array();
}
?>