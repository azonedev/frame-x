# Frame-X

A PHP Micro MVC Framework with Docker Containerization

## Prerequisites

- [Docker](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-compose-on-ubuntu-20-04)
- [Docker Compose](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-compose-on-ubuntu-20-04)

## Installation

To install the application, follow the steps below:

1. Clone the repository:

   ```
   git clone https://github.com/azonedev/frame-x.git
   ```

2. Navigate to the cloned directory:

   ```
   cd frame-x
   ```

3. Run the installation script:

   ```
   sh install.sh
   ```
   or
   ```
   ./install.sh
   ```

The installation script checks for the existence of `docker-compose.yml` and `.env` files, and copies them from the example files if they do not exist. The command also installs after the docker containers up composer dependencies and restarts the containers.

## Usage

To start the containers, run the following command:

```
docker-compose up -d
```

### The containers can be accessed at:

Application Browse On : 
```
http://localhost:8023
```

For database `external` access the environment variables are valid if you don't change the default values:
  - SERVER = `localhost`
  - PORT = `3306`
  - DB_DATABASE = `framex`
  - USER = `root`
  - DB_PASSWORD = `fR@m12X`
  - Connection Type = `MySQL (TCP/IP)`

To stop the containers, run the following command:

```
docker-compose down
```

## Services

The following services are included in the `docker-compose.yml` file:

- Nginx: serves the  application
- PHP: the main application container
- MySQL: stores the application data

## Volumes

The `./data` directory is used to store persistent data for the MySQL database.

## Application Structure
```
- frame-x/
   - app/
      - app/
         - Controllers
         - Core
            - Application Bootstrap, Config, DB connection, Base Model, Router, View
         - Exceptions
         - Models
         - RequestValidators
         - Services
      - public/
         - index.php
      - views/
         - submissions/
            - index.php
      - env
   - .data (local docker volume)
   - .docker (docker configs)
      - nginx
      - php
   - .env
   - docker-compose.yml
   - install.sh (install app)
```
## Contributing

Feel free to contribute to this repository by creating issues and pull requests.
