<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widht-device-widht, initial-scale=1.0">
    <title>Practica de variables reservadas</title>
</head>
<body>
    <h1>Holiwis</h1>
    <h2>Practica de variables reservadas</h2>

    <form action="procesamientodatos.php" method="POST">
        <label>Nombres</label>
        <input type="text" require name="nombre">
        <label>Edad</label>
        <input type="text" require name="edad">
        <label>Email</label>
        <input type="text" require name="email">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
