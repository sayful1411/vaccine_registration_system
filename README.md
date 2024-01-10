
  

# Vaccine Registration System

  

This is a vaccine registration site where users can register for vaccines. In this project I used ***task scheduling***. User can register by entering his name, email, NID, phone number and selecting vaccine center. According to the vaccine center limit every person is notified by **9 pm**. In this case, three statuses have been determined for each person. These are: **vaccinated**, **not vaccinated**, **scheduled**

  
  

# How you setup and run this project -

  

> step 1: clone repo

  

https://github.com/sayful1411/vaccine_registration_system.git

  

> step 2: go to this project

  

```bash

cd vaccine_registration_system

```

> step 3: edit .env.example to .env

> step 4: run composer install

  

```bash

composer install

```

> step 5: generate a new key

```bash

php artisan key:generate

```

>  **Important** I used SQLite database. So you don't need to setup a database connection. You can find the database in ***database/database.sqlite***

> step 6: run migration

  

```bash

php artisan migrate --seed

```

> step 7: run project

```bash

php artisan serve

```
> step 8: run queue and task scheduling

```bash

php artisan queue:work

php artisan  schedule:work
