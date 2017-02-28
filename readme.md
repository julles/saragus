# Saragus App

Simple CRUD News

## Cara Instal



Cloning Projectna hela mang , make git asupken seukrip iyeu

``` sh
git clone https://github.com/julles/saragus.git
```

terus asup ka project na , make cmd 
``` sh
cd path/to/file/saragus
```

 jalanken composer na 
``` sh
composer install
```

copy file .env.example dengan ngaran .env doang , terus ubah koneksi databasena sesuai selara
``` sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=saragus
DB_USERNAME=rezaganteng
DB_PASSWORD=
```

last : 
jalanken seukrip iye 
``` sh
php artisan migrate
```
``` sh
php artisan serve
```

buka project na di browser : locaslhot:8000 (delapan rebu)

#license

https://reza.mit-license.org/
