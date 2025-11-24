
# Instrucciones de Ejecución

## Requisitos
- PHP 8.x  
- Composer  
- MySQL o MariaDB  
- Postman  

## Instalación
```bash
composer install

````

## Ejecutar .sql para crear usuario de la DB

Ejecutar el archivo SQL incluido en database/userQuery.sql


## Migraciones

```bash
php artisan migrate

```


## Importar colección de Postman

1. Abrir **Postman**.
2. Haz clic en **Import**.
3. Selecciona el archivo en la carpeta raíz:

   ```
   collection.json
   ```

## Probar la API

```bash
php artisan serve
```

Luego utiliza en Postman la colección importada; cada endpoint ya tiene su método, URL y parámetros configurados.

```
```
