## install laravel

## path setting
```
vi ~/.bashrc
```
in ~/.bashrc file write this
```
export PATH="~/.config/composer/vendor/bin:$PATH"
```
```
source ~/.bashrc
```


## laravel init
```
composer install
```

## make sqlite
```
touch database/database.sqlite
```

## .env setting for sqlite connection
```
DB_CONNECTION=sqlite
#DB_HOST=127.0.0.1
#DB_PORT=3306
#DB_DATABASE=ddd
#DB_USERNAME=root
#DB_PASSWORD=
```

## init default schema setting
```
php artisan migrate
```
