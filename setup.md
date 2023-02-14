## Requirements

Before you start, make sure you have the following installed on your machine:
- Git (https://git-scm.com/)
- Composer (https://getcomposer.org/download/)
- Docker
- Symfony CLI (https://symfony.com/download)
- PHP 8.x w/ extensions (see `symfony check:requirements`)<br/>
  *Default extensions needed are:  `Ctype`, `iconv`, `PCRE`, `Session`, `SimpleXML` & `Tokenizer`*


## Getting the environment running

### Get Git set up & the project files on your PC
1. Fork our repository, you can find it here: https://github.com/databrydge/popcorn-time
2. Clone your own forked repository onto your PC
3. **Make sure to checkout into a different branch (`git checkout -b my-branch-name`)**

---
### Setting up symfony to run locally
- Open a terminal and navigate to your local project folder
- Attach the domain to your proxy: `symfony proxy:domain:attach popcorntime` (can change popcorntime to anything you want)
- Install the certificate: `symfony server:ca:install`
- Run the proxy service: `symfony proxy:start`
- Start the server: `symfony server:start` (add `-d` if you want it daemonized)

---
### Setting up the database & the docker service (on Linux & Mac OS)

- Open a terminal and navigate to your local project folder
- Run: `sudo docker-compose up` (`sudo` not needed on mac) to install and run your docker environment <br/>
  *(add `-d` if you want to run it daemonized)*
- Run the migrations: `symfony console doctrine:migrations:migrate` to setup the database
- Run the fixtures/seeders: `symfony console doctrine:fixtures:load` to fill the database with dummy data
- Your docker is now setup, for the old school users, I added a phpmyadmin image, so you can still access that @ `127.0.0.1:8180`

#### For windows users
You have the option to run the docker in a WSL2 container run it through the UI inside windows, or you can decide not to use the docker at all & use some software solution to run the databases locally like WAMP or something similar. Whichever way you want to run it on windows is up to you.

All the credentials for the database connection can be found inside the `.env` file, inside the `DATABASE_URL` constant. Simply setup your wamp to reflect that or change the credentials in the string. <br/>
**Small note, if you are using default WAMP setup, know that the default MySQL port is going to be `3306` not `3309` as currently used in the `.env`**