## Incoders PHP Developer Test

### Before Up
Crie um arquivo `.env` com base no `.env-example` com o comando `cp .env-example .env` e defina as credenciais de acesso à caixa de e-mail

### Up
`docker-compose up`
### Install Dependencies
`docker exec -it incoders-php-fpm composer install`
### Run Fake API
`docker exec -it incoders-php-fpm php -S localhost:9001 -t incoders-api/`
### Run
`docker exec -it incoders-php-fpm php app.php`

### Output

* **Envio de dados do cliente para API**

Será criado um arquivo `.txt` no diretório `/incoders-api/output/` com os dados do cliente para cada e-mail processado apenas para simular a persistência de dados

* **Download dos anexos**

Serão salvos no diretório `/nfse/` os arquivos `.xml` anexos ao e-mail processado

### Tests
`docker exec -it incoders-php-fpm vendor/bin/phpunit`
