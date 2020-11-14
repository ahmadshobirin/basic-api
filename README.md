
# Basic-api Laravel

Repository ini dibuat untuk sampel project webinar MojokertoDev. dibuat dengan
- [Laravel](https://laravel.com).

# Install

### Tools
1. Xampp atau Laragon apa pun yang punya apache dan mysql
2. [Composer](https://getcomposer.org/download/).
3. [Git](https://git-scm.com/downloads)
4. [Postman](https://www.postman.com/downloads/)

### Step
   - Clone repository in

        `git clone https://github.com/ahmadshobirin/basic-api.git`


   - Arahkan ke folder **basic-api**

        `cd basic-api`

   - lengkapi vendor-vendor laravel

        `composer install`


   - copy **.env.example** dan paste dengan name **.env**

        `cp .env.example .env` atau `copy .env.example .env`


   - setting database, sesuikan nama database, user, dan password mysql dengan settingan anda

            DB_CONNECTION=mysql
            DB_HOST=127.0.0.1
            DB_PORT=3306
            DB_DATABASE=basic-api
            DB_USERNAME=root
            DB_PASSWORD=

   - genereate project key

        `php artisan key:generate`
   - genereate jwt key

        `php artisan jwt:secret`
   - run migration and seeder

        `php artisan migrate:fresh --seed`

   - terakhir import collection json ke postman
   ` https://www.getpostman.com/collections/81c75bd3bec7d8c0bf73`

## Terima Kasih
> Be Patient, Code is hard, take ur time!

