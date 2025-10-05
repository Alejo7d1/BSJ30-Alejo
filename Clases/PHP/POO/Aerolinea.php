<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widht-device-widht, initial-scale=1.0">
    <title>Practica CRUD Aerolinea</title>
</head>
<body style="background-color: gray;">
    <h1>Holiwis bienvenido a Aerolineas PP</h1>

    <form action="" method="$_POST">
        <label for="nombre_aerolinea">Nombre Aerolinea: </label>
        <input type="text" name="nombre_aerolinea" required>
        <label for="nombre_aerolinea">Cantidad Aviones: </label>
        <input type="text" name="cantidad_aviones" required>
        <label for="nombre_aerolinea">Tipo de Aerolinea: </label>
        <select type="text" name="tipo_aerolinea" required>
                <option value="Privado">Privado</option>
                <option value="Comercial">Comercial</option>
                <option value="Carga">Carga</option>
                <option value="Nacional">Nacional</option>
        </select>        
        <button type="submit">Crear</button>
    </form>
        
    </form>
</body>
</html>