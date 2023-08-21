#!/bin/bash

#if already have docker-compose.yml and .env, then skip copy from example 
if [ -f "docker-compose.yml" ]; then
    echo "docker-compose.yml already exists"
else
    echo "Coping docker-compose.yml.example to docker-compose.yml"
    cp docker-compose.yml.example docker-compose.yml
fi

if [ -f ".env" ]; then
    echo ".env already exists"
else
    echo "Coping .env.example to .env"
    cp .env.example .env
fi

#navigate to application directory
# shellcheck disable=SC2164
cd app
if [ -f ".env" ]; then
    echo ".env already exists"
else
    echo "Coping .env.example to .env"
    cp .env.example .env
fi
# shellcheck disable=SC2103
cd ..

#docker 
#up containers
echo "Starting containers"
docker-compose up -d

#composer dependencies
echo "Installing composer dependencies"
docker-compose exec framexapp composer install --prefer-source

#up containers
echo "Re-start containers"
docker-compose restart