Bug reproducer
==============

You need a Postgres Database : `docker run --rm -it -e POSTGRES_PASSWORD=creds -e POSTGRES_USER=creds -p 5552:5432 postgres:11`

Run on PHP > 7.3
```
composer install
php bin/console doc:mig:mig -n
php vendor/bin/simple-phpunit
```
