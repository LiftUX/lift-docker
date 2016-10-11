# Lift Docker Base

**Version:** 0.1.0-alpha

### What is this?
This is a repository starter for local WordPress development using Docker.

### Requirements
- Docker for Mac/Windows

### What's Inside
- nginx:latest
- phpfpm:latest (php7)
- mysql:latest
- memcached (with a d) object cache
- mailhog
- xdebug
- composer
- wp-cli

### Getting started
1. Clone this Repo
2. cd into the cloned directory
3. Set environmental variables in `.env` file
4. Run `docker-compose up -d`
5. Update your hosts file consistent with this example: `127.0.0.1 localhost wordpress.lift`
6. Go to http://wordpress.lift and hopefully everything just worked.

## Test that things are working
1. SSH into the php container `docker exec -it php /bin/bash`
2. Ensure wp-cli is setup `wp --info`
3. Ensure cron can loop back to WordPress `wp cron test`
4. Ensure the object cache can persist data `wp cache set foo bar` then, `wp cache get foo`

## Tools
- Access Mailhog at http://wordpress.lift:8081

## Theme Development
1. Add a new theme folder to `code/themes` or require it with `composer.json`
2. Activate it from the admin
3. Make an awesome theme!

## Plugin Development
1. Add a new plugin folder to `code/plugins` or require it with composer.json
2. Activate it from the admin
3. Make an awesome plugin!

### Useful Commands
- List containers: `docker ps -a`
- SSH into a container: `docker exec -it nginx /bin/bash`
- Bring the environment down: `docker-compose down`
- Bring the environment down and remove orphaned containers: `docker-compose down --remove-orphans`
- Restart a container: `docker-compose restart nginx`
- Rebuild containers: `docker-compose up -d --build`
- View logs from a container: `docker-compose logs proxy`

### Other Commands
_Use these at your own risk_
- Stop all containers: `docker stop $(docker ps -aq)` _All containers, not just this environment's_
- Kill all containers: `docker rm $(docker ps -aq)`
- Destroy all container images: `docker rmi -f $(docker images -q)`
- Destroy all mounted volumes: `docker volume rm $(docker volume ls |awk '{print $2}')`

### Todo
- Create a workflow where full project manifests are stored in a composer.json
- Add PHPunit container attached to a separate mysql container
- Add node.js container with npm and webpack and preconfigured build scripts
- Add PHP CodeSniffer
- Add deploy scripts
- Add CI scripts