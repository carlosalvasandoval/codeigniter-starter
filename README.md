
![](https://bytebucket.org/carlosalva/codeigniter-starter/raw/1ace9e464eba8e8df8b3b4de4a2ff21bd76beec7/assets/img/sample.PNG)

![](https://bitbucket.org/carlosalva/codeigniter-starter/raw/185db8cf4a2f2401108ae94558d8c43a776c8d4c/assets/img/sample2.PNG)

**Acerca de**

Este es un starter de codeigniter, en el podras encontrar un CRUD de ejemplo con diferentes elementos de como deben usarse.

Para el crud utilice algunos plugins de javascript, componentes bootstrap 4.
Si observas el controlador CRUD a detalle podras ver que esta optimizado, considero es  la forma correcta como debes programarlo 
(por supuesto se acepta mejoras.)

Asi mismo he mejorado la librería datatable en php para que sea sencillo el uso de datatables jquery.

Como plantilla he utilizado un dashboard responsive hecho en bootstrap 4 para que tengas listo tu dashboard administrativo.
He usado tecnicas de bootstrap:
- helper customizado
- language
- form helpers
- validations
- migrations
- query builder
- etc

TODO:

- Para optimizar más aun el starter implementaré gulp para que genere archivos minificados de css y javascript y asi cargue aun más rapido la aplicación. 
- incluir liberias de PHP para que soporte Namespaces
- incluir crud login

**Instrucciones**


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
**Manejo de javascript**
*******************

Se debe imitar la misma estructura de la carpeta `controllers`. Por ejemplo
si el controlador se llamase `Crud`  y este tuviese una  function `index`
para agregar un archivo javascript que ejecute una funcionalidad particular de esta vista,
deberas crear una carpeta en `assets` conteniendo el javascript con el mismo nombre de la función, quedando asi,
`assets/js/crud/index.js`. Si el archivo js sigue la misma estructura que el controller/funcion no necesitas declararlo dentro de la vista 
ya que el helper lo hara por ti automaticmente;por oro lado si el archivo se llama de diferente forma y no sigue la estructura, ahi si debes incluirlo en la vista.

*Ejemplo:*
En ocasiones cuando necesitas reutilizar el mismo archivo javascript para 1 o muchas vistas
puedes poner un nombre generico e incluirlo al pie de página de la vista usando el helper  
`<?php prepend_js(base_url('assets/js/crud/create_edit.js')) ?>`

*********
**Recursos Usados**
*********

-  [DataTables](https://datatables.net/)
-  [CodeIgniter](https://codeigniter.com)
-  [Bootstrap 4](https://getbootstrap.com/)
-  [Font awesome 5](https://fontawesome.com/)
-  [Side bar](https://bootstrapious.com/p/bootstrap-sidebar)


*********
**Créditos**
*********

-  [Carlos Alva Sandoval](https://www.linkedin.com/in/carlosalva/)