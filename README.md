# Basic Laravel scafold application with Inertiajs

![](https://user-images.githubusercontent.com/12722517/81354751-cf956e80-90a2-11ea-9edf-ba9a87a1d9d5.png)

## Instalation

Install application dependencies.

```shell script
composer create-project rocketslab/laravel-inertiajs-template <project-name>
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
