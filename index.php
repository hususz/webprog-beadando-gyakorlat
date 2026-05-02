<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('./includes/config.inc.php');

$oldal = isset($_GET['oldal']) ? $_GET['oldal'] : '';

if ($oldal != "") {
    if (!isset($oldalak[$oldal])) {
        echo "<div style='background:red; color:white; padding:10px;'>HIBA: A(z) '$oldal' nincs benne a config.inc.php tömbjében!</div>";
        $keres = $hiba_oldal;
    } elseif (!file_exists("./templates/pages/{$oldalak[$oldal]['fajl']}.tpl.php")) {
        echo "<div style='background:red; color:white; padding:10px;'>HIBA: A sablon fájl nem létezik: ./templates/pages/{$oldalak[$oldal]['fajl']}.tpl.php</div>";
        $keres = $hiba_oldal;
    } else {
        $keres = $oldalak[$oldal];
    }
} else {
    $keres = $oldalak['/'];
}

include('./templates/index.tpl.php');
?>