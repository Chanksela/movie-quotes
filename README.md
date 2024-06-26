# **Movie Quotes Assignment**

First assignment in Redberry bootcamp. This is a movie quotes app, where you can register and add/edit movies & quotes.

#

## **Table of Contents**

<!-- TODO -->

- [Prerequisites](#prerequisites)
- [Tehc Stack](#tech-stack)
- [Start Locally](#getting-started)
- [Seeding](#seeding)

#

## **Prerequisites**

- PHP
- NPM
- Composer
- Mysql
- Spatie

#

## **Tech Stack**

- Laravel 9
- CS Fixer
- Tailwind
- Spatie Translatable

#

## **Start Locally**

1\. Clone git repository:

```bash
git clone https://github.com/RedberryInternship/kakha-chankseliani-movie-quotes.git
```

2\. Install composer dependencies

```bash
composer install
```

3\. Instal npm dependencies

```bash
npm install
```

4\. Copy env.example in .env and generate key

```bash
cp .env.example .env
php artisan key:generate
```

5\. Create database

```mysql
create database DB_NAME;
```

6\. Change this fields in .env to connect to your database

```env
DB_CONNECTION=mysql

DB_DATABASE=DB_NAME
DB_USERNAME=USERNAME
DB_PASSWORD=PASSWORD

FILESYSTEM_DISK=public
```

7\. Migrate tables

```bash
php artisan migrate
```

8\. Create storage link

```bash
php artisan storage:link
```

9\. Register user via artisan command

```bash
php artisan register:user
```

10\. Run the server from project folder

```bash
php artisan serve
```

11\. After this you can log in with created user and add movies&quotes.

#

## **Seeding**

### **Optional**

You can fill tables with fake data via artisan command

```bash
php artisan db:seed
```

**OR DO IT WHEN MIGRATING TABLES**

```bash
php artisan migrate --seed
```

**This will show dummy data when entering the app, even if you haven't registered and added any movie and quotes**
