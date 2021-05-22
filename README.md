<p align="center"><a href="https://devitm.com" target="_blank"><img src="https://desarrollotecnologicodemorelos.com/wp-content/uploads/2020/04/logo_DevITM-sinslogan.png" width="400"></a></p>

## About Clasificado de anuncios de carros "CAC"

CAC es una plataforma digital web que se encarga de el anuncio de cualquier automóvil que nuestros anunciantes registrados deseen publicar para que más adelante ellos los puedan vender, teniendo como principal meta la seguridad de aquellos usuarios que estén interesados por alguna de nuestras publicaciones.

Los requerimientos que necesitas para tener la configuración de entorno adecuada en su sistema local son:

* [Apache]
* [PHP]
* [MariaDB]
* [Laravel](https://laravel.com/docs/7.x) en cualquiera de su versión de la 7
* [Composer](https://getcomposer.org/download/)
* La última versión de [NodeJS](https://nodejs.org/en/download/package-manager/)

También existen varias opciones distintas que se pueden utilizar para poner en marcha un entorno de desarrollo local, en este proyecto se pueden usar:

* Docker
* Apache

# Instalación Docker
En está instalación estaremos usando el SO Linux, en la siguiente tabla se mostrarán las versiones existentes, para que se localice la versión correcta para su SO, así podrá descargarlos y ejecutar el instalador para esa versión:

### Linux
| OS Versión    | Instrucciones Detalldas   |
|---------------|-------------------------- |
| Ubuntu 18.04+ | [Instrucciones](https://docs.docker.com/engine/install/ubuntu/)
| Fedora 25+    | [Instrucciones](https://docs.docker.com/engine/install/fedora/)

## Clonar Repositorio
Para clonar repositorio necesitar ingresar el siguiente comando en tu terminal 
` git <link> `: ` git clone https://github.com/AndreaNAguilarHidalgo/clasificado-carros.git `,
ó si quieres renombrar la carpeta en la que se hará la clonación coloca después del link el nombre que quieras
` git <link> nameApp `: ` git clone https://github.com/AndreaNAguilarHidalgo/clasificado-carros.git nameApp `

Después de tener ya la carpeta con el proyecto cambiamos los permisos 
` sudo chown -R www-data.www-data /var/www/html/nameApp `
` sudo chmod -R 755 /var/www/html/nameApp `
` sudo chmod -R 777 /var/www/html/nameApp/storage `

entramos a la carpeta en donde se encuentra el proyecto ` /nameApp ` y copiamos el archivo ` .env.example `

` cp .env.example .env `

Ya teniendo el archivo ` .env ` debemos modificar los siguientes campos ` DB_DATABASE, DB_USERNAME, DB_PASSWORD ` para que
la Base de Datos funcione correctamente.

Después de esto corremos el siguiente comando para que se descarguen todas las depedencias de nuestra aplicación
`composer install`,

Ya instalado composer siguiendo en la carpeta del proyecto corremos el siguienete comando:
` php artisan key:generate ` para que en el archivo ` .env ` la variable ` APP_KEY ` contenga está key
### Nota:
Si estás trabajando con apache, debes crear el archivo .conf en tu carpeta ` sites-available ` y modificarlo

` sudo nano /etc/apache2/sites-available/nameApp.conf `

<VirtualHost *:80>
	ServerAdmin webmaster@localhost.com
	ServerName server.name.com
	DocumentRoot /var/www/html/nameApp/public
	<Directory /var/www/html/nameApp>
	    Options Indexes FollowSymLinks
	    AllowOverride All
	    Require all granted
	</Directory>
</VirtualHost>

Guardamos los cambios y creamos un enlace sibólico 

` sudo ln -s /etc/apache2/sites-available/nameApp.conf /etc/apache2/sites-enabled/nameApp.conf `

Y reiniciamos Apache
` sudo systemctl restart apache2 `
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
