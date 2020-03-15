# Laravapp dockerizado

## Instrucciones

``` bash
# Iniciar los contenedores con
docker-compose up -d --build

# Descargar los archivos necesarios (/vendor)
docker-compose run --rm composer install

# Instalar las dep y ejecutar
docker-compose run --rm npm i
docker-compose run --rm npm run dev 

# Hacer las migraciones a la BD 
docker-compose run --rm artisan migrate

# acceder a localhost:8000 en el navegador
```


link al repositorio en el que base este entorno de trabajo con docker [aquí](https://github.com/aschmelyun/docker-compose-laravel).


Los contenedores creados y sus puertos son los siguientes (puede modificarlos si desea):

- **nginx** - `:8000`
- **mysql** - `:3306`
- **php** - `:9000`
- **phpMyAdmin** - `:8001`
- **npm**
- **composer**
- **artisan**


## Posible fallo

Es muy probable que al acceder al localhost:8000 se encuentre con lo siguiente

![Imagen de la excepción](https://raw.githubusercontent.com/andresma2490/laravapp/master/.img/err.png)

este es uno de los issues que tiene el repo original ([ver más](https://github.com/aschmelyun/docker-compose-laravel/issues/5)) y como dice, la "solución" hasta ahora es dar los permisos a las siguientes carpetas con los comandos:

``` bash
sudo chmod 777 -R storage/
sudo chmod 777 -R bootstrap/cache/
```

...en caso de no estar en una maquína propia, puede correr un contenedor mapeando las carpetas y otorgar los permisos (claro, asumiendo que su sesión tenga agregado su usuario al grupo de docker)

``` bash
#ej
docker run -it --rm -v "$(pwd)":/app ubuntu:18.04
cd app/ 
```
