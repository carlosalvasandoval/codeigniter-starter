
![](https://bytebucket.org/carlosalva/codeigniter-starter/raw/90060387beb47155f7671d07c040412bc1f44ca8/assets/img/sample.PNG)

###################
Instrucciones
###################

1. los ambientes de desarrollo se maneja por variables de entorno. Debes copiar en la raiz el archivo 
`.sample.htaccess` y luego renombrarlo a `.htaccess` dentro de el veras linea 20 aprox. 
SetEnv CI_ENV development  donde development es el ambiente que se ejecutara la aplicación

2. En `application/config` deberas crear una carpeta con el ambiente que manejes 
(development, testing o production). 

3. Copia y renombra los archivos `config.sample.php` y `database.sample.php` 
(`config.php` y `database.php` respectivamente)en la carpeta 
correspondiente al ambiente configurado. ejemplo `config/development/database.php` y `config/development/config.php`. 
No olvides cambiarle los valores según tu nececidad.

4. Despues de crear y configurar tu base de datos ejecuta las migraciones ingresando a `localhost/codeigniter-starter/migrate`

5. Revisa en tu base de datos se debió haber creado 2 tablas `crud` y `migrations`.
 

*******************
Manejo de javascript
*******************

Se debe imitar la misma estructura de la carpeta `controllers`. Por ejemplo
si el controlador se llamase `Crud`  y este tuviese una  function `index`
para agregar un archivo javascript que ejecute una funcionalidad particular de esta vista,
deberas crear una carpeta en `assets` conteniendo el javascript con el mismo nombre de la función, quedando asi,
`assets/js/crud/index.js`.

En ocasiones cuando necesitas reutilizar el mismo archivo javascript para 1 o muchas vistas
puedes poner un nombre generico e incluirlo al pie de página de la vista usando el helper  
`<?php prepend_js(base_url('assets/js/crud/create_edit.js')) ?>`

*********
Recursos
*********

-  [DataTables](https://datatables.net/)
-  [CodeIgniter](https://codeigniter.com)
-  [Bootstrap 4](https://getbootstrap.com/)
-  [Font awesome 5](https://fontawesome.com/)


*********
Créditos
*********

-  [Carlos Alva Sandoval](https://www.linkedin.com/in/carlosalva/)