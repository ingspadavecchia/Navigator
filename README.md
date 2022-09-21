# Navigator app

> ### Coding Challenge - Nicolas Spadavecchia

----------

# Getting started

## Installation

Clone the repository

    git clone https://github.com/ingspadavecchia/Navigator.git

Switch to the repo folder

    cd Navigator

Install all the dependencies using Laravel Sail

    ./vendor/bin/sail up -d

Run the database migrations (**Set the database connection in .env before migrating**)

    ./vendor/bin/sail php artisan migrate

You can now access the server at http://localhost

## Local development

There is a `Makefile` file that provide us a single entry point for all day-to-day development tasks, just type `make` on the root of the project to get the list of tasks'

Prerequisites:
* [Docker Compose](https://docs.docker.com/compose/install/)
* Make command | [Make for Windows](https://stackoverflow.com/a/54086635)

## Database seeding

**Populate the database with seed data with relationships.**

Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh

----------
