<h1>Elküldött Üzenetek</h1>

<table style="width: 100%; border-collapse: collapse; margin-top: 20px; background-color: #fff;">
    <tr style="background-color: #FF6600; color: white;">
        <th style="padding: 10px; border: 1px solid #ccc;">Időpont</th>
        <th style="padding: 10px; border: 1px solid #ccc;">Küldő neve</th>
        <th style="padding: 10px; border: 1px solid #ccc;">E-mail</th>
        <th style="padding: 10px; border: 1px solid #ccc;">Üzenet</th>
    </tr>
    <?php foreach ($uzenetek_lista as $uzenet) { ?>
    <tr>
        <td style="padding: 10px; border: 1px solid #ccc; text-align: center;"><?= $uzenet['datum'] ?></td>
        <td style="padding: 10px; border: 1px solid #ccc; font-weight: bold; text-align: center;">
            <?= ($uzenet['vendeg'] == 1) ? 'Vendég' : htmlspecialchars($uzenet['nev']) ?>
        </td>
        <td style="padding: 10px; border: 1px solid #ccc; text-align: center;"><?= htmlspecialchars($uzenet['email']) ?></td>
        <td style="padding: 10px; border: 1px solid #ccc;"><?= nl2br(htmlspecialchars($uzenet['uzenet'])) ?></td>
    </tr>
    <?php } ?>
</table>