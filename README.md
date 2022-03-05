# SAMS

This source code is under development. No release yet.

### How to deploy

- Install [composer](https://getcomposer.org/)
- Install [Git](https://git-scm.com/)
- Install [php](https://www.php.net/manual/en/install.php)

On Git Terminal,

#### Clone this repo

```
git clone https://github.com/haikal-dev/SAMS.git SAMS
```

#### change directory to SAMS

```
cd SAMS/
```

#### copy .env.example and renamed it to .env

```
copy .env.example .env
```

#### Install dependencies

```
composer update
```

#### Generate new key

```
php artisan key:generate
```

#### Upload database table using Laravel Migration

```
php artisan migrate
```

#### Your server will running on http://localhost:8000 after run this command

```
php artisan serve
```