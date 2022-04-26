## GUESTBOOK

### Stack:
- LARAVEL
- NGINX
- MYSQL
- CENTRIFUGO

### Commands:
```shell
cp .env.example .env

docker-compose run --rm backend composer install

docker-compose up -d

docker-compose logs -f
```

**OPENAPI DOCUMENTATION:**

`http://localhost/api`

**OPENAPI SPECIFICATION:**

Can be imported to postman or insomnia

`http://localhost/api/spec`

**WEBSOCKETS:**

`ws://localhost:8080/connection/websocket`

Tested with [postman](https://www.postman.com/). Get connection token from api (register, login, me). 

Auth:
```json
{"params":{"token":"your-connection-token"},"id":1}
```

Subscribe:
```json
{"method":1,"params":{"channel":"messages"},"id":2}
```

### TESTS

```shell
php artisan test
```