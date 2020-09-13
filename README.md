## **Analista Desenvolvimento FullStack PHP MadeiraMadeira**

Desafio: Criar um sistema próprio para etiquetar repositórios do Github.

## **Requerimentos**
- PHP 7.2.5
- Laravel 7.24
- Mysql 8.0
- Docker
- Vue 2.5
- Vuex 3.0

## **Importante**

Verifique o arquivo .env no backend para as configurações de variáveis de ambiente, altere se necessário.
O arquivo env.example é uma cópia exata do .env que roda localmente na minha máquina.
Path: raiz do repositório. 

## **Depois de tudo configurando vamos para o BackEnd**
Instale as dependências do backend, na pasta raiz comando cd backend.

```composer install```

O banco de dados está em docker, após subir você tera dois containers o do banco com o nome **gitapiDatabase**
e outro com nome **backend_adminer_1** com uma interface da base de dados casa prefira. Talvez seja necessário
alterar o item **volume** do arquivo **docker-compose.yml** para o caminho da sua máquina, nome do banco apigit.

```docker-compose up -d```

Migrations

```php artisan migrate```

## **Importante**
Iniciar a API, ficara disponivel no caminho http://127.0.0.1:8000 caso o caminho seja diferente você vai precisar alterar no projeto do front.
Path: **git_api/frontend/src/global.js**

```php artisan serve```

## **Depois de tudo configurando no BackEnd vamos para o FrontEnd**
Na pasta do front instale as dependências.

```npm install```

Iniciar o front

```npm run serve```

## **Abaixo os links para a documentação da API**

1. [Cadastro de usuário](requirements/signup.md)
2. [Login no sistema](requirements/login.md)
3. [Logout no sistema](requirements/logout.md)
4. [Atualização de usuário](requirements/updateUser.md)
5. [Carrega todos os usuários](requirements/load-user.md)
6. [Carrega lista de repositórios](requirements/search-repositorie.md)
7. [Criar tag no repositórios](requirements/create-tag.md)
8. [Lista tags cadastradas no repositórios](requirements/load-tag.md)
9. [Atualiza tags cadastradas no repositórios](requirements/update-tag.md)
10. [Remove tags cadastradas no repositórios](requirements/remove-tag.md)


Checklist Backend:
---

- [x] PHP 7+ (Puro ou ​ um​ Framework);
- [x] MVCS;
- [ ] Factory (Não deu tempo);
- [x] Dependency Injection;
- [x] DDD;

Checklist Frontend:
---

- [x] CSS3;
- [x] HTML 5;
- [x] Vue.js 2+;