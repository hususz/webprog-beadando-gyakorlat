<div style="max-width: 1000px; margin: 0 auto; font-family: Arial, sans-serif;">
    <h1 style="text-align: center; margin-bottom: 30px; font-size: 32px;">CRUD OPERATIONS</h1>

    <?php if (isset($_GET['muvelet']) && $_GET['muvelet'] == 'uj') { ?>
        <form method="post" action="?oldal=crud" style="background: #fff; padding: 20px; border: 1px solid #dee2e6;">
            <label style="font-weight: bold;">Klub neve:</label><br>
            <input type="text" name="csapatnev" required style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc;">
            <input type="submit" name="uj_csapat" value="Mentés" style="background: #0d6efd; color: white; border: none; padding: 10px 20px; cursor: pointer; font-size: 16px;">
            <a href="?oldal=crud" style="display: inline-block; margin-left: 10px; padding: 10px 20px; background: #6c757d; color: white; text-decoration: none; font-size: 16px;">Mégse</a>
        </form>
    <?php } elseif (isset($_GET['muvelet']) && $_GET['muvelet'] == 'modositas' && $klub_szerkeszt) { ?>
        <form method="post" action="?oldal=crud" style="background: #fff; padding: 20px; border: 1px solid #dee2e6;">
            <input type="hidden" name="id" value="<?= $klub_szerkeszt['id'] ?>">
            <label style="font-weight: bold;">Klub neve:</label><br>
            <input type="text" name="csapatnev" value="<?= htmlspecialchars($klub_szerkeszt['csapatnev']) ?>" required style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc;">
            <input type="submit" name="modosit_csapat" value="Módosítás" style="background: #0d6efd; color: white; border: none; padding: 10px 20px; cursor: pointer; font-size: 16px;">
            <a href="?oldal=crud" style="display: inline-block; margin-left: 10px; padding: 10px 20px; background: #6c757d; color: white; text-decoration: none; font-size: 16px;">Mégse</a>
        </form>
    <?php } else { ?>
        <a href="?oldal=crud&muvelet=uj" style="display: inline-block; background-color: #0d6efd; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; margin-bottom: 15px; font-size: 16px;">Add Club</a>
        
        <table style="width: 100%; border-collapse: collapse; background: white; border: 1px solid #dee2e6;">
            <tr style="border-bottom: 1px solid #dee2e6;">
                <th style="padding: 15px; text-align: left; border-right: 1px solid #dee2e6;">id</th>
                <th style="padding: 15px; text-align: left; border-right: 1px solid #dee2e6;">Csapatnév</th>
                <th style="padding: 15px; text-align: left;"></th>
            </tr>
            <?php foreach ($klubok as $klub) { ?>
                <tr style="border-bottom: 1px solid #dee2e6;">
                    <td style="padding: 15px; font-weight: bold; border-right: 1px solid #dee2e6;"><?= $klub['id'] ?></td>
                    <td style="padding: 15px; font-weight: bold; border-right: 1px solid #dee2e6;"><?= htmlspecialchars($klub['csapatnev']) ?></td>
                    <td style="padding: 15px;">
                        <a href="?oldal=crud&muvelet=modositas&id=<?= $klub['id'] ?>" style="display: inline-block; background-color: #0d6efd; color: white; padding: 8px 16px; text-decoration: none; border-radius: 4px; margin-right: 5px;">Edit</a>
                        <a href="?oldal=crud&muvelet=torles&id=<?= $klub['id'] ?>" onclick="return confirm('Biztosan törlöd?');" style="display: inline-block; background-color: #dc3545; color: white; padding: 8px 16px; text-decoration: none; border-radius: 4px;">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
</div>