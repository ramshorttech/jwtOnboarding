# jwt-auth Register login

##  API (Laravelv Framework)

```bash
$ https://github.com/ramshorttech/jwtOnboarding.git
# Create/Run docker
$ cd jwt-auth && composer install
$ cp .env.example .env
$ ./vendor/bin/sail up -d
$ ./vendor/bin/sail artisan key:generate
$ ./vendor/bin/sail artisan migrate
```

##  Frontend NuxtJS

```bash
$ cd client
$ yarn && yarn dev
```