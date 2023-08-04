
![](https://github.com/php-kchat/kchat/blob/master/public/logo/3.svg)

# KChat
#### Aplicación Basada en chat con PHP.

## Requerimientos

* Servidor web Apache o Nginx
* MySQL 5.7
* PHP version >= 8.0
    * Extensiones requeridas :
        * ctype
        * curl
        * dom
        * fileinfo
        * filter
        * hash
        * json
        * libxml
        * mbstring
        * openssl
        * pcre
        * phar
        * session
        * tokenizer
        * xml
        * xmlwriter

## Manual de instalación

#### Descarga los archivos de Kchat

#### Usando git

```
git clone https://github.com/php-kchat/kchat.git
```

#### Instalar Composer

```
composer install
```

> O a través de

[Download Zip](https://github.com/php-kchat/kchat/archive/refs/heads/master.zip)
and Extract to your Web Directory

#### Instalar Composer

```
composer install
```

> OR

#### Usar Composer

```
composer create-project php-kchat/kchat
```

### Corre el siguiente comando para completar la instalación

Crea ``.env`` si no existe.
```
cp .env.example .env
```

Configura los settings de la base de datos en ``.env``
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

Genera una ``APP_KEY`` en ``.env``:
```
php artisan key:generate
```

Crea tablas:
```
php artisan migrate
```

Otorga permisos en:

- storage/*
- bootstrap/cache/*
- public/images/*

Crea tu primer usuario y logeate

#### Maintainers

- [Ganesh Kandu](https://github.com/GaneshKandu)
	- [Linkedin](https://www.linkedin.com/in/ganeshkandu/)
