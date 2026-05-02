<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=gyakorlat7', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

    $muvelet = isset($_GET['muvelet']) ? $_GET['muvelet'] : '';
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['uj_csapat'])) {
            $sql = "INSERT INTO klub (csapatnev) VALUES (:csapatnev)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(':csapatnev' => $_POST['csapatnev']));
            header("Location: ?oldal=crud");
            exit;
        } elseif (isset($_POST['modosit_csapat'])) {
            $sql = "UPDATE klub SET csapatnev = :csapatnev WHERE id = :id";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(':csapatnev' => $_POST['csapatnev'], ':id' => $_POST['id']));
            header("Location: ?oldal=crud");
            exit;
        }
    } else {
        if ($muvelet == 'torles' && $id > 0) {
            $sql = "DELETE FROM klub WHERE id = :id";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(':id' => $id));
            header("Location: ?oldal=crud");
            exit;
        }
    }

    $klub_szerkeszt = null;
    if ($muvelet == 'modositas' && $id > 0) {
        $sql = "SELECT * FROM klub WHERE id = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $klub_szerkeszt = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    $sql = "SELECT * FROM klub ORDER BY id ASC";
    $stmt = $dbh->query($sql);
    $klubok = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Adatbázis hiba történt a művelet során.";
}
?>