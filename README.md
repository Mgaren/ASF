# ASF

### Prerequisites

1. Check composer is installed
2. Check yarn & node are installed

### Install

1. Clone the current repository.
2. In MySQL, create a database `ASF` and create a new user and gives it the rights.
3. In the project directory, create a `.env.local` (copy the `.env` content) and modified the line 32:
   set: `db_user`
   `db_password`
   `db_name`
5. Execute this command:
```
# Install dependencies
composer install

yarn install
yarn encore dev

# Create Database
symfony console d:d:c

# Make migrations
symfony console d:m:m
```
