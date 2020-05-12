#Test project



#First start

### Start

`docker-compose up -d`


### Create .env

`docker-compose exec app cp .env.example .env`

### Create key

`docker-compose exec app php artisan key:generate`

### Run migration

`docker-compose exec app php artisan migrate`
