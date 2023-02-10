# Welcome to the Databrydge Exercise: Popcorn Time :popcorn:

### Requirements

Before you start, make sure you have the following installed on your machine:
- Composer
- Docker
- PHP 8.x, check composer to see which PHP extensions are needed


### Getting the environment setup

1. fork our repo
2. git clone your newly forked repo

symfony proxy:domain:attach popcorntime
symfony server:ca:install
symfony proxy:start
symfony server:start
-> should see symfony homepage any 6.x version will do.
sudo docker-compose up
-> If everything worked right, you can connect to the mariaDB server, check the docker config file for credentials
-> also for those who still like to use the old school phpmyadmin, I added that too, check 127.0.0.1:8180 (again docker config for credentials)

-> Your playground is ready!