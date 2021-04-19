https://warm-island-40828.herokuapp.com/

Used as an api server for the drugstore-client

# Routing

| Endpoint | Method | Description |
| --- | --- | --- |
| /api | GET | For testing purposes |
| /api/auth/login | POST | Login |
| /api/auth/logout | GET | Logout |
| /api/auth/refresh | GET | Token refresh |
| /api/auth/signup | POST | Registering |
| /api/categories | GET | Fetches all categories |
| /api/categories/{id} | GET | Fetches a single category by its id |
| /api/drugs | GET | Fetches all drugs |
| /api/drugs/{id} | GET | Fetches a single drug by its id |


# Run locally (ddev)

`ddev config --project-type=laravel`

`ddev composer install`

`ddev exec "cat .env.example | sed  -E 's/DB_(HOST|DATABASE|USERNAME|PASSWORD)=(.*)/DB_\1=db/g' > .env"`

`ddev exec "php artisan key:generate"`

`ddev launch`


https://www.ddev.com/ddev-local/ for more info
