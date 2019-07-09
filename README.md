# Pillier de cave

## Installation
```shell
composer install
```

Créer le fichier .env.local

```shell
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```
