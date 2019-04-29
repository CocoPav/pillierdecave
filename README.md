# Pillier de cave

## Installation
```shell
composer install
```

Créer le fichier .env.local

```shell
php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```