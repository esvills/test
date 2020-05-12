# Test project



# First start

### Start

`docker-compose up -d`

### Create .env

`docker-compose exec app cp .env.example .env`

### Run composer install

`docker-compose exec app composer install`

### Create key

`docker-compose exec app php artisan key:generate`

### Run migration

`docker-compose exec app php artisan migrate`
