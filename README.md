# [Project Name]

## Required

- PHP >= 7.3
- MySQL 5.7.x
- Laravel 8.12

## Architecture Overview

### Packaging Rules

List components in source code and explain it.

Example:

```
.
├── app - contains the core code
│             ├── Console - contains all of the custom commands
│             ├── Contracts - contains interface
│             ├── Enums
│             ├── Exceptions
│             ├── Helpers
│             ├── Http
│             │             ├── Controllers       
│             │             └── Middleware
│             │             └── Requests
│             │             └── Resources
│             ├── Models - contains all of entities.
│             ├── Providers -
│             ├── Repositories -
│             ├── Services -
│             ├── UseCases -
├── bootstrap
├── config
├── database
├── Designs
├── OpenApi
├── public
├── resources
├── routes - contains all of the route definitions for application
├── storage
│             └── app
│             └── framework
│             └── logs - Logging
└── tests
    ├── Feature
    └── Unit - Unit test

```
Flow Request

```plantuml
|Client|
start
:Gửi request;
|#AntiqueWhite|Route|
:Xác định routes;
|Middleware|
:Lọc các HTTP requests;
|FormRequest|
:Validation request;
|Controller|
:Điều hướng request;
|UseCase|
:Xử lý request;
|Services|
:Xử lý logic;
|Repository|
:Query database;
|Models|
:Xử lý query;
:Trả data query;
|Repository|
:Trả data query;
|Services|
:Trả data xử lý;
|UseCase|
:gom thông tin data từ các service;
:Trả data hoàn chỉnh;
|Controller|
:Trả response;
|Middleware|
:Lọc các response;
|Client|
stop

```

### Create packages

Guilde to generate packages for projects

Example:

- Generate models

```bash
php artisan make:model User
```
## Rules
Define rules for steps of process as naming convention, filename convention...
Can split separate file, link to it
### Designs
- Sequence and Activity diagram: /Designs
- API design
### Database
- Database design
### API

### Logging
[Logging Design](./logging.md)

### Auth

### Cache Design

### Coding

### Git flow
[Reference](Link driver)


## Get started

### Set up `app`

- Clone repository from git

```console
git clone git@git.hblab.vn:lead_mkt/project_name.git
```
- Create .env
```
cp .env.example .env
```
- Update database connection info in environment file

```console
DB_HOST=mysql
```

- Run docker

```console
docker-compose up -d
```

- Install dependencies library

```console
docker-compose exec app composer install
```

- Generate application key

```console
docker-compose exec app php artisan key:generate
```

- Migrate database

```console
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
```

- Finish open http://localhost/
### Run up app

Go back to `app` directory.

- Run up app:

```console
docker-compose up -d
```

- Stop app

```console
docker-compose down
```

## [Thrid-party service]

## Unit test(optional)

## Document page

- Backlog : 
- Sonar :

## CI/CD
