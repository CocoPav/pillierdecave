# Pillier de cave

## Installation
```shell
composer install
npm install
```

Créer le fichier .env.local

```shell
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```

Démarrer le serveur et la compilation des assets

```shell
php bin/console server:run
npm run watch
```