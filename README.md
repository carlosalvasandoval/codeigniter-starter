
![](https://bytebucket.org/carlosalva/codeigniter-starter/raw/1ace9e464eba8e8df8b3b4de4a2ff21bd76beec7/assets/img/sample.PNG)

![](https://bitbucket.org/carlosalva/codeigniter-starter/raw/185db8cf4a2f2401108ae94558d8c43a776c8d4c/assets/img/sample2.PNG)

**About**

This is a codeigniter starter, in which you can find a CRUD example with different ui components of how they should be used.

For the crud I used some javascript plugins and bootstrap 4 components. If you look at the CRUD controller in detail you can see that it is optimized, I think it is the correct way you should develop it (of course improvements are welcome.)

Likewise I have improved the datatable library in php to make the use of jquery datatables easier.

As a template I've used a responsive dashboard made in bootstrap 4 so that you have your admin dashboard ready. Some codeigniter helpers:

- helper customized
- language
- form helpers
- validations
- migrations
- query builder
- etc

TODO:

- Make codeigniter support NameSpaces
- Crud login

**Instructions**

1. The development environments are managed by environment variables. You must copy the file to the root
`.sample.htaccess` and then rename it to` .htaccess`. In line 20 approx. you would see
`SetEnv CI_ENV development` where `development` is the environment the application will run.

2. In `application / config` you should create a folder and name it like the environment that you manage
(i.e development, testing or production).

3. Copy and rename the files `config.sample.php` and` database.sample.php`
(`config.php` and` database.php` respectively) in the folder
corresponding to the configured environment. example `config / development / database.php` and` config / development / config.php`.
Do not forget to change the values ​​according your needs.

4. After creating and configuring your database, execute the migrations by going local URL  i.e `localhost/codeigniter-starter/migrate`

5. Check in your database. it should have created 2 tables `crud` and` migrations`.

6. To optimize your js and css files you can run `gulp` which will allow you to minify the css, scss and js files.
   In order to run gulp you must have node.js installed on your pc. Once installed, in your console you go to the project path and execute
   `npm install` which will download all the libraries needed for optimization actions. Likewise, if you like to manage files scss (sass)
    instead of pure css gulp he will convert them for you. 
Additionally if you like to use ecmascript 6 to code the front end , gulp will convert it to regular javascript.
    Once executed npm install you must execute the `gulp watch` or` gulp watch_dev` command in console for production and development environments respectively. 
All the files (css, scss, js ) will be copied to the `dist` folder so keep this in mind when including any style or script in any view.


*******************
**handle javascript**
*******************

The same structure of the `controllers` folder should be imitated. For example
if the controller was called `Crud` and it has `index` function, then if you want add a particular javascript for that view you should
 create a folder in `assets` containing the javascript with the same name of the function, thus remaining,
`assets/js/crud/index.js`. If the js file follows the same structure as the controller/function, you do not need to declare it within the view
since the helper will do it for you automatically, by the other side, if the file is named differently and does not follow the structure, there if you must include it in the view.

*Example:*
Sometimes when you need to rehuse the same javascript file for 1 or many views
you can put a generic name and include it in the footer of the view using the helper
`<? php prepend_js (base_url ('assets/js/crud/create_edit.js'))?>`

*********
**Resources icluded**
*********

-  [DataTables](https://datatables.net/)
-  [CodeIgniter](https://codeigniter.com)
-  [Bootstrap 4](https://getbootstrap.com/)
-  [Font awesome 5](https://fontawesome.com/)
-  [Side bar](https://bootstrapious.com/p/bootstrap-sidebar)


*********
**Credits**
*********

-  [Carlos Alva Sandoval](https://www.linkedin.com/in/carlosalva/)



================================================================TRADUCCIÓN AL ESPAÑOL===================================================================

**Acerca de**

Este es un starter de codeigniter, en el podras encontrar un CRUD de ejemplo con diferentes elementos de cómo deben usarse.

Para el crud utilicé algunos plugins de javascript, componentes bootstrap 4.
Si observas el controlador CRUD a detalle podras ver que esta optimizado, considero es  la forma correcta como debes programarlo 
(por supuesto se acepta mejoras.)

Asi mismo he mejorado la librería datatable en php para que sea sencillo el uso de datatables jquery.

Como plantilla he utilizado un dashboard responsive hecho en bootstrap 4 para que tengas listo tu dashboard administrativo.
Algunos helpers de codeigniter:
- helper customizado
- language
- form helpers
- validations
- migrations
- query builder
- etc

POR HACER:

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

6. Para optimizar tus archivos js y css puedes ejecutar `gulp` el cual te permitirá minificar los archivos css, scss y js.
   Para que puedas ejecutar gulp debes tener instalado node.js en tu pc. Una vez instalado en tu consola vas a la ruta del proyecto y ejecutas
   `npm install` el cual te descargara todas las librerias necesarias para las acciones de optimización. Asi mismo, si te gusta gestionar archivos scss (sass) 
    en vez de css puro gulp lo convertira por tí. adicionalmente si te gusta usar ecmascript 6 para programar el front end pues gulp lo convertirá a javascript regular.
    una vez ejecutado npm install debes ejecutar el comando `gulp watch` o `gulp watch_dev` para ambientes de producttion y desarrollo respectivamente. Veras que todos los archivos 
    de las carpetas css, scss, js seran copiados a la carpeta `dist` asi que ten encuenta esto al momento de de incluir algún estilo o script en alguna vista. 
 

*******************
**Manejo de javascript**
*******************

Se debe imitar la misma estructura de la carpeta `controllers`. Por ejemplo
si el controlador se llamase `Crud`  y este tuviese una  function `index`
para agregar un archivo javascript que ejecute una funcionalidad particular de esta vista,
deberas crear una carpeta en `assets` conteniendo el javascript con el mismo nombre de la función, quedando asi,
`assets/js/crud/index.js`. Si el archivo js sigue la misma estructura que el controller/funcion no necesitas declararlo dentro de la vista 
ya que el helper lo hara por ti automaticmente;por otro lado si el archivo se llama de diferente forma y no sigue la estructura, ahi si debes incluirlo en la vista.

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