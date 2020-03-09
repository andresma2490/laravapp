# Laravapp dockerizado

## Instrucciones

``` bash
# Iniciar los contenedores con
docker-compose up -d --build

# Descargar los archivos necesarios (/vendor)
docker-compose run --rm composer install

# Instalar las dep y ejecutar
docker-compose run --rm npm i # o usar npm local
docker-compose run --rm npm run dev 

# Hacer las migraciones a la BD 
docker-compose run --rm artisan migrate

# acceder a localhost:8080 en el navegador
```


link al repositorio en el que base este entorno de trabajo con docker [aquí](https://github.com/aschmelyun/docker-compose-laravel).


Los contenedores creados y sus puertos son los siguientes:

- **nginx** - `:8080`
- **mysql** - `:3306`
- **php** - `:9000`
- **npm**
- **composer**
- **artisan**