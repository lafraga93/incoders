[![Build Status](https://travis-ci.com/lafraga93/incoders.svg?token=F151pxsdoT3qniXoG3Ne&branch=master)](https://travis-ci.com/lafraga93/incoders)
[![BCH compliance](https://bettercodehub.com/edge/badge/lafraga93/incoders?branch=master)](https://bettercodehub.com/)
[![StyleCI](https://github.styleci.io/repos/227192193/shield?branch=master)](https://github.styleci.io/repos/227192193)

## Incoders PHP Developer Test

### Before Up
Crie um arquivo `.env` com base no `.env-example` com o comando `cp .env-example .env` e defina as credenciais de acesso à caixa de e-mail através das respectivas variáveis e o **critério de filtro** através da variável `criteria` que será utilizado na busca por mensagens na caixa

Este parâmetro já está definido por padrão como `UNSEEN` (não lidos), considerando que essa caixa será utilizada apenas para recebimento de e-mails de notas fiscais

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

Será criado um arquivo `.txt` no diretório `incoders-api/output/` com os dados do cliente para cada e-mail processado apenas para simular a persistência de dados

* **Download dos anexos**

Serão salvos no diretório `nfse/` os arquivos `.xml` anexos ao e-mail processado

### Tests
`docker exec -it incoders-php-fpm vendor/bin/phpunit`
