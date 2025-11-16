<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>

<h1>Biblioteca Teca tatatata</h1>

<?php if (!empty($data["resultado"])): ?>
    <div class="card">
        <strong>Resultado:</strong> <?= $data["resultado"] ?>
    </div>
<?php endif; ?>

<div class="card">
    <h2>Agregar nuevo libro</h2>
    <form method="POST">
        <input type="hidden" name="accion" value="agregar">
        <div class="form-group">
            <input type="number" name="idLibro" placeholder="ID del libro" required>
        </div>
        <div class="form-group">
            <input type="text" name="titulo" placeholder="Título del libro" required>
        </div>
        <div class="form-group">
            <input type="text" name="autor" placeholder="Autor" required>
        </div>
        <div class="form-group">
            <input type="text" name="categoria" placeholder="Categoría" required>
        </div>
        <button type="submit">Agregar Libro</button>
    </form>
</div>

<div class="card">
    <h2>Buscar libros</h2>
    <form method="POST">
        <input type="hidden" name="accion" value="buscar">
        <input type="text" name="query" placeholder="Buscar...">
        <select name="campo">
            <option value="titulo">Título</option>
            <option value="autor">Autor</option>
            <option value="categoria">Categoría</option>
        </select>
        <button type="submit">Buscar</button>
    </form>
</div>

<div class="card">
    <h2>Listado de libros</h2>
    <ul>
        <?php foreach ($data["libros"] as $libro): ?>
            <li class="libro-item">
                <strong>ID <?= $libro->getId() ?>: <?= $libro->getTitulo() ?></strong> — 
                <?= $libro->getAutor() ?> (<?= $libro->getCategoria() ?>)
                <?php if ($libro->getDisponible()): ?>
                    <span class="estado-disponible">Disponible</span>
                <?php else: ?>
                    <span class="estado-prestado">Prestado</span>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<div class="card">
    <h2>Prestar libro</h2>
    <form method="POST">
        <input type="hidden" name="accion" value="prestar">
        <input type="number" name="idLibro" placeholder="ID del libro">
        <button type="submit">Prestar</button>
    </form>
</div>

<div class="card">
    <h2>Devolver libro</h2>
    <form method="POST">
        <input type="hidden" name="accion" value="devolver">
        <input type="number" name="idLibro" placeholder="ID del libro">
        <button type="submit">Devolver</button>
    </form>
</div>

<div class="card">
    <h2>Editar libro</h2>
    <form method="POST">
        <input type="hidden" name="accion" value="editar">
        <div class="form-group">
            <input type="number" name="idLibro" placeholder="ID del libro" required>
        </div>
        <div class="form-group">
            <input type="text" name="titulo" placeholder="Nuevo título" required>
        </div>
        <div class="form-group">
            <input type="text" name="autor" placeholder="Nuevo autor" required>
        </div>
        <div class="form-group">
            <input type="text" name="categoria" placeholder="Nueva categoría" required>
        </div>
        <button type="submit">Editar Libro</button>
    </form>
</div>

</body>
</html>