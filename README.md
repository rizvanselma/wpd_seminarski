# Laravel app seminarski

Potrebno je imati Docker instalisan kako bi se pokrenuo projekat.

Github url: https://github.com/rizvanselma/wpd_seminarski

## Postavljanje projekta
```bash
cp .env.example .env
npm install
composer install
docker compose build
```

## Pokretanje projekta
```bash
docker compose up
```

## Zaustavljanje projekta
```bash
docker compose down
```

## DB Dump
Nalazi se unutar `__dockerfiles__` direktorija, i automatski se kopira u kontenjer baze pri buildanju app-a.

Ukoliko zelite "cistu" bazu, izbrisite `01-db.sql` i ukucajte:
```bash
php artisan migrate
```

i (opcionalno)
```bash
php artisan db:seed
```
