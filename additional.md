# Additional: Container Docker & Laravel Artisan
================

- NginX, php-fpm & Oracle: docker-compose-nginx-oracle.yaml
- NginX, php-fpm & PostgreSQL: docker-compose-nginx-pgsql.yaml
- NginX & php-fpm: docker-compose-nginx.yaml
- php-cli "built-in web server" & Oracle: docker-compose-oracle.yaml
- php-cli "built-in web server" & PostgreSQL: docker-compose-pgsql.yaml
- php-cli "built-in web server": docker-compose.yaml

## Commands Docker
```bash
docker-compose up --help

docker-compose --file docker-compose.yaml up --detach --force-recreate --build --renew-anon-volumes --remove-orphans
docker-compose --file docker-compose.yaml up --force-recreate --build --renew-anon-volumes --remove-orphans

docker-compose down --help

docker-compose --file docker-compose.yaml down --volumes --remove-orphans

docker exec -it --user ${UID}:${GID} php-cli bash
docker exec -it --user ${UID}:${GID} php-fpm bash
docker exec -it --user ${UID}:${GID} php-apache bash

# force delete container
docker container rm -f pgsql adminer pgadmin4 php-cli
docker container rm -f pgsql adminer php-cli redmine
docker container rm -f mysql adminer php-cli redmine
docker container rm -f pgsql adminer nginx php-fpm
docker container rm -f oracle php-cli
docker container rm -f oracle nginx php-fpm
# pgsql & mysql
docker volume rm -f homestead_dbdata homestead_dbdata_admin homestead_files
# oracle
docker volume rm -f homestead_dbdata homestead_dbs homestead_files

```
## Artisan
```bash
sed -i "s/'timezone'.*/'timezone' => env('APP_TZ', 'UTC'),/" config/app.php
sed -i "s/'locale'.*/'locale' => env('APP_LOCALE', 'en'),/" config/app.php
sed -i "s/'fallback_locale'.*/'fallback_locale' => env('APP_FALLBACK', 'en'),/" config/app.php
sed -i "s/'faker_locale'.*/'faker_locale' => env('APP_FAKER', 'en_US'),/" config/app.php
sed -i "s/.*APP_URL.*/&\\n\nAPP_TZ=America\/Manaus\nAPP_LOCALE=pt_BR\nAPP_FALLBACK=pt_BR\nAPP_FAKER=pt_BR/" .env

./artisan clear-compiled --verbose && ./artisan cache:clear --verbose && ./artisan config:clear --verbose && ./artisan event:clear --verbose && ./artisan optimize:clear --verbose && ./artisan route:clear --verbose && ./artisan view:clear --verbose

./artisan ide-helper:generate && ./artisan ide-helper:meta

./artisan optimize
```
## Artisan Authentication
```bash
# Swap the front-end scaffolding for the application
./artisan ui --verbose --auth -- [bootstrap, vue, react]
# Scaffold the authentication controllers
./artisan ui:controllers --verbose
# Scaffold basic login and registration views and routes
./artisan ui:auth --verbose --force --views -- [bootstrap, vue, react]

# npm install --save @fortawesome/fontawesome-free
npm install --save-dev @fortawesome/fontawesome-free
npm install && npm run dev
```
## Storage - Create the symbolic link using relative paths
```bash
composer require symfony/filesystem
./artisan storage:link --verbose --relative
```
## Migrations & Seeders
```bash
composer require doctrine/dbal

./artisan migrate:fresh --verbose --force --seed
./artisan migrate:fresh --verbose --drop-views --force --seed
./artisan migrate:fresh --verbose --force && ./artisan db:seed --verbose --force

./artisan migrate:refresh --verbose --force --seed
./artisan migrate:refresh --verbose --force && ./artisan db:seed --verbose --force
DB_HOST=mysql ./artisan migrate:rollback --verbose && DB_HOST=mysql ./artisan migrate --verbose --pretend > .docker/mysql/mysql.sql

./artisan make:migration create_people_table
./artisan make:migration create_groups_table --table=groups --create=groups
./artisan make:migration create_groups_table
./artisan make:migration create_group_user_table
./artisan make:migration create_permissions_table
./artisan make:migration create_roles_table
./artisan make:migration create_permission_role_table
./artisan make:migration create_role_user_table
./artisan make:migration create_organizations_table

./artisan make:seeder UserSeeder
```
## Generate a resource controller for the given model.
```bash
./artisan make:controller --verbose --force --resource -- Admin/UserController
./artisan make:controller --verbose --force --resource -- Admin/PermissionController
./artisan make:controller --verbose --force --resource -- Admin/RoleController

./artisan make:controller --verbose --force --resource --model=App\\Models\\User -- UserController

./artisan make:controller --verbose --force --api -- Api\\AuthController
./artisan make:controller --verbose --force --api -- Api\\JWTAuthController
./artisan make:controller --verbose --force --api -- Api\\UserController
./artisan make:controller --verbose --force --api -- App\\Modules\\Api\\Routes\\Controllers\\RouteController
```
## Create a new middleware class
```bash
./artisan make:middleware --verbose Locale
```
## Crie um novo arquivo de migração, um novo controlador de recursos para o modelo.
## laravel ^5.6 --all Generate a migration, factory, and resource controller for the model
```bash
./artisan make:model --verbose --force --migration -- App\\Models\\Role
./artisan make:model --verbose --force --migration -- App\\Models\\Permission
./artisan make:model --verbose --force --migration -- App\\Models\\PermissionRole
./artisan make:model --verbose --force --migration -- App\\Models\\RoleUser
./artisan make:model --verbose --force --migration -- App\\Models\\PermissionUser


./artisan make:model --verbose --force --all -- App\\Models\\Intern
./artisan make:model --verbose --force --migration --seed --factory --controller --resource -- App\\Models\\Intern
./artisan make:model --verbose --force --migration --seed --factory --controller --api -- App\\Models\\Intern

./artisan make:model --verbose --force --migration --seed --factory --controller --api -- App\\Models\\Setup
./artisan make:model --verbose --force --migration --seed --factory --controller --api -- App\\Models\\Person
./artisan make:model --verbose --force --migration --seed --factory --controller --api -- App\\Models\\Group
./artisan make:model --verbose --force --migration --seed --factory --controller --api -- App\\Models\\Role
./artisan make:model --verbose --force --migration --seed --factory --controller --api -- App\\Models\\Permission
./artisan make:model --verbose --force --migration --seed --factory --controller --api -- App\\Models\\Organization
```
## api generate
## composer require rodrixcornell/apigenerate
```bash

docker exec -it --user ${UID}:${GID} php-cli bash -c './artisan generate:api --verbose --con=mysql'

./artisan generate:api --verbose --con=mysql
./artisan generate:api --verbose --relation=true --table=users
./artisan generate:api --verbose --relation=true --table=organizations
./artisan generate:api --verbose --relation=true --table=failed_jobs
./artisan generate:api --verbose --relation=true --table=users --module=Api
./artisan generate:api --verbose --relation=true --table=users --route=my-users-route
./artisan generate:api --verbose --relation=true --table=users --route=my-users-route --module=Api
./artisan generate:api --verbose --relation=true --table=groups --route=groups
./artisan generate:api --verbose --relation=true --table=groupuser --route=groupuser
```
## [Laravel IDE Helper](https://github.com/barryvdh/laravel-ide-helper)

## [Laravel Melhores Práticas.](https://www.laravelbestpractices.com).

## Migrate & Seed
- [How to seed your database using PHP laravel](https://www.codementor.io/@chinemeremnwoga/how-to-seed-your-database-using-php-laravel-10mhltm0ts).
- [Como fazer a propagação de banco de dados no Laravel](https://artisansweb.net/database-seeding-laravel).
- [Forçando o faker a falar nossa língua](https://medium.com/@vs0uz4/for%C3%A7ando-o-faker-a-falar-nossa-l%C3%ADngua-72d9ee73244c).
- [Faker é uma biblioteca PHP que gera dados falsos para você](https://github.com/fzaninotto/Faker).

## Localization
- Laravel-lang [https://github.com/caouecs/Laravel-lang](https://github.com/caouecs/Laravel-lang).
- Tradução do Laravel para português brasileiro (pt-BR) [lucascudo/laravel-pt-BR-localization](https://github.com/lucascudo/laravel-pt-BR-localization).
- A Laravel package for multilingual models [Astrotomic/laravel-translatable](https://docs.astrotomic.info/laravel-translatable).

## Laravel OCI8
- Installing Laravel OCI8: [yajra/laravel-oci8](https://yajrabox.com/docs/laravel-oci8/master/installation).
- [Utilizando Laravel e OCI8 em 4+1 passos](https://medium.com/@jhonatanvinicius/utilizando-laravel-e-oci8-em-4-passos-48278c4bb8cf).

## API RESTful
- [Construindo uma API RESTful com Laravel - Parte 1](https://rafaell-lycan.com/2015/construindo-restful-api-laravel-parte-1).
- [Construindo uma API RESTful com Laravel - Parte 2](https://rafaell-lycan.com/2015/construindo-restful-api-laravel-parte-2).
- [Construindo uma API RESTful com Laravel - Parte 3](https://rafaell-lycan.com/2016/construindo-restful-api-laravel-parte-3).

## Laravel and JWT
- [JSON Web Token Authentication for Laravel & Lumen](https://jwt-auth.readthedocs.io/en/docs).
- [Laravel and JWT](https://blog.pusher.com/laravel-jwt).
- [JWT authentication for Lumen 5.4](https://dev.to/ziishaned/jwt-authentication-for-lumen-5-4-3d2m).
- [Build a JWT Authenticated API with Lumen(v5.8)](https://dev.to/ndiecodes/build-a-jwt-authenticated-api-with-lumen-2afm).
- [JWT Auth Guard for Lumen 5.4](https://github.com/gboyegadada/lumen-jwt).
- [Guide for setting up with Lumen? #1102](https://github.com/tymondesigns/jwt-auth/issues/1102).

## Técnicas de Controle de Acesso de Usuários
- [Artigo](https://blog.welrbraga.eti.br/?p=642).
- [Simple RBAC/ACL for Laravel 5.5 caching and permission groups](https://github.com/YaroslavMolchan/rbac).
- [Role based access control for Laravel 5](https://packagist.org/packages/visualappeal/laravel-rbac).
- [Two Best Laravel Packages to Manage Roles/Permissions](https://laravel-news.com/two-best-roles-permissions-packages).
- [Light-weight role-based permissions system for Laravel 6 built in Auth system](https://github.com/kodeine/laravel-acl).
- [Laravel RBAC (Role Based Access Control) Model Relationship](https://stackoverflow.com/questions/24301274/laravel-rbac-role-based-access-control-model-relationship).
- [Laravel authorization and roles permission management](https://medium.com/swlh/laravel-authorization-and-roles-permission-management-6d8f2043ea20).
- [laravel-permission](https://docs.spatie.be/laravel-permission/v3/introduction).

## Categoria de visualização hierárquica
- [Hierarchical Treeview Category Example in Laravel](https://www.codechief.org/article/hierarchical-treeview-category-example-in-laravel).
- [Laravel Treeview | Structure and Display Hierarchical Data Example](https://www.codechief.org/article/laravel-treeview-structure-and-display-hierarchical-data-example).
- [Structure and Display Hierarchical / Multi-level data in Laravel](https://www.5balloons.info/hierarchical-data-laravel-relationship-display).
- [Laravel - Category Treeview Hierarchical Structure Example with Demo](https://www.itsolutionstuff.com/post/laravel-5-category-treeview-hierarchical-structure-example-with-demoexample.html).

## Nesteds
- [Effective tree structures in Laravel 4-5](https://github.com/lazychaser/laravel-nestedset).
- [Nested set in laravel tutorial](https://appdividend.com/2018/04/30/nested-set-in-laravel-tutorial/).
- [Criar menu dynamic usando conjuntos nesteds](https://php.docow.com/criar-menu-dynamic-usando-conjuntos-nesteds.html).
- [Implementing Nested Order Set in MySQL/PHP](https://stackoverflow.com/questions/43201104/implementing-nested-order-set-in-mysql-php).
- [Managing Hierarchical Data in MySQL](http://mikehillyer.com/articles/managing-hierarchical-data-in-mysql).
