### Installation Guide for Laravel E-commerce Website

-XAMPP (with PHP 8.1+)
-Composer
-Node.js

1. Install XAMPP with PHP 8.1+
   ใช้แค่ apache กับ mysql
   Configure XAMPP

- เปิดใช้งาน extensions .zip >> config php.ini file located in the xampp/php directory.
  ให้ find หา ;extension=zip เอา ; ออก Save and restart Apache.

2. Install Composer

`https://getcomposer.org/download/` >> Composer-Setup.exe >> เลือก Path ของไฟล์ php.exe located in xampp/php

3. Install Node.js & npm : For managing JavaScript dependencies and running Vite

# Laravel E-commerce Website

E-commerce application built with Laravel, Vue.js, Tailwind.css and Alpine.js. <br>

## Installation

Need MySQL, PHP8.1, Node.js and composer.

### Install Laravel Website + API

1. Download the project
2. Copy `.env.example` into `.env` and configure database
3. Navigate to the project's root directory using terminal
4. Run `composer install`
5. Set the encryption key by executing `php artisan key:generate --ansi`
6. Run migrations `php artisan migrate --seed`
7. Start local server by executing `php artisan serve`

### Install Vue.js Admin Panel

1. Navigate to `backend` folder
2. Run `npm install`
3. Copy `backend/.env.example` into `backend/.env`
4. Make sure `VITE_API_BASE_URL` key in `backend/.env` is set to your Laravel API host (Default: http://localhost:8000)
5. Run `npm run dev`
6. Open Vue.js Admin Panel in browser and login with
   ```
   admin@example.com
   admin123
   ```

## ถ้ามีปัญหา ในการ save image run คำสั่งนี้

`php artisan storage:link`

## ถ้ามีปัญหา เกี่ยวกับ Version stripe

`composer require stripe/stripe-php`

## https://mailtrap.io/

สำหรับ สมัคร vertify email demo

## https://dashboard.stripe.com

สำหรับ สมัคร demo การชำระเงินออนไลน์

code format styles all project
`npm run format`
