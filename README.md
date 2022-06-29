<h1 align="center">Barezão Imprensa</h1>
> Projeto feito para o campeonato amazonense: "Barezão Imprensa".<br>
> Aplicação construída com Laravel.<br>

## Pré Requisitos
- php >= 7.2
- composer >= 1.8
- npm >= 6.9
- node >= 12.5
- mysql >= 5.7

## Build
- Será necessário criar uma base de dados chamada "barezao_imprensa"

```sh
$ git clone https://github.com/DaviNoronha/barezao-imprensa.git
$ cd barezao-imprensa
$ cp .env.example .env
$ composer install
$ npm install
$ npm run dev
$ php artisan key:generate
$ php artisan storage:link
$ php artisan migrate
$ php artisan db:seed
$ php artisan serve
```

## Aplicação Web
- Um site para gerir um campeonato.
- Dentro dele administradores inscrever times e jogadores para esses times.
- Usuários treinadores/presidentes podem observar os times e seus jogadores mas não editar nada.

## Autor
**Davi Noronha Gato** 

* Github: [@DaviNoronha](https://github.com/DaviNoronha)
