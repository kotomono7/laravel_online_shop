# Laravel 10 - Starter Template Toko Online

## Screenshots

![preview img](/preview.png)

## Donwload

Clone Projek

```bash
  git clone https://github.com/kotomono7/laravel_online_shop nama_folder
```

Masuk ke folder dengan perintah

```bash
  cd nama_folder
```

- Copy .env.example menjadi .env kemudia edit database dan api key nya

```bash
    composer install
```

```bash
    php artisan key:generate
```

```bash
    php artisan migrate:fresh --seed
```

```bash
    php artisan storage:link
```

## Login

- email = <admin@admin.com>
- password = 123
