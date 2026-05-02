<?php
$uzenet = array();
$kepek = array();
$MAPPA = './images/';
$TIPUSOK = array ('.jpg', '.png');
$MEDIATIPUSOK = array('image/jpeg', 'image/png');
$DATUMFORMA = "Y.m.d. H:i";
$MAXMERET = 500 * 1024;

if (isset($_POST['kuld'])) {
    if (isset($_SESSION['login'])) {
        $fajlok = $_FILES["fajlok"];
        for($i = 0; $i < count($fajlok["name"]); $i++) {
            if ($fajlok['error'][$i] == 4) {
                $uzenet[] = "Nem töltött fel fájlt!";
            } elseif ($fajlok['error'][$i] == 1 || $fajlok['error'][$i] == 2 || $fajlok['size'][$i] > $MAXMERET) {
                $uzenet[] = "Túl nagy állomány: " . $fajlok['name'][$i];
            } elseif (!in_array($fajlok['type'][$i], $MEDIATIPUSOK)) {
                $uzenet[] = "Nem megfelelő típus: " . $fajlok['name'][$i];
            } else {
                $vegsoHely = $MAPPA . strtolower($fajlok['name'][$i]);
                if (file_exists($vegsoHely)) {
                    $uzenet[] = "Már létezik: " . $fajlok['name'][$i];
                } else {
                    move_uploaded_file($fajlok['tmp_name'][$i], $vegsoHely);
                    $uzenet[] = 'Sikeres feltöltés: ' . $fajlok['name'][$i];
                }
            }
        }
    }
}

$olvaso = opendir($MAPPA);
while (($fajl = readdir($olvaso)) !== false) {
    if (is_file($MAPPA . $fajl)) {
        $vege = strtolower(substr($fajl, strlen($fajl)-4));
        if (in_array($vege, $TIPUSOK)) {
            $kepek[$fajl] = filemtime($MAPPA . $fajl);
        }
    }
}
closedir($olvaso);
arsort($kepek);
?>