# SAMS

This source code is under development. No release yet.

### How to deploy

- Install [composer](https://getcomposer.org/)
- Install [Git](https://git-scm.com/)

On Git Terminal,

```
git clone https://github.com/haikal-dev/SAMS.git SAMS
cd SAMS/
copy .env.example .env
composer update
php artisan key:generate
```

Your server will running on http://localhost:8000 after run this command

```
php artisan serve
```