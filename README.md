# Basic Laravel scafold application with Inertiajs

## Instalation

Install application dependencies.

```shell script
composer install
```

Install client side dependencies and build assets.

```shell script
npm install && npm run dev
```

## Creating new Pages

This template comes with a artisan command to create new Pages.

```shell script
php artisan inertia:page PageName
```

or with a previous path/folder:

```shell script
php artisan inertia:page SomeFolder\\PageName
```
