<!DOCTYPE html>
<html lang="">
<body>
    <form action="richiestacontroller.php" method="post">
        <input type="date" name="data">
        <input type="text" name="id_macchinario" placeholder="ID Macchinario">
        <select name="tipo_guasto">
            <option value="Elettrico">Elettrico</option>
            <option value="Meccanico">Meccanico</option>
            <option value="ElettricoInformatico">Elettrico Informatico</option>
            <option value="Altro">Altro</option>
        </select>
        <input type="text" name="stato_macchinario" placeholder="Stato Macchinario">
        <input type="text" name="username_operatore" placeholder="Username Operatore">
        <input type="submit" value="Invia Richiesta">
    </form>
</body>
</html>