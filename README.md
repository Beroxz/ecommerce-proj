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
6. Run migrations `php artisan migrate --seed` -> สำหรับเริ่มต้น จะได้ db เปล่า ข้ามได้เลย
7. Start local server by executing `php artisan serve`
8. Run `npm install`

### Install Vue.js Admin Panel

1. Navigate to `backend` folder
2. Run `npm install`
3. Copy `backend/.env.example` into `backend/.env`
4. Make sure `VITE_API_BASE_URL` key in `backend/.env` is set to your Laravel API host (Default: http://localhost:8000)
5. Run `npm run dev`

Web http://localhost:8000
App Backend http://localhost:3000 -> API End Point http://localhost:8000

Run Project
`php artisan serve` -> Run PHP Server - Web
`npm run web` -> Run Nodejs Vite Mix
`npm run dev` -> Setting ใน package.json = `cd backend && npm run dev`

Default User

```
admin@gmail.com
admin123
```

seller1@gmail.com
seller123

seller2@gmail.com
seller123

```
test.cus@gmail.com
1303161as

test.cus@gmail.com
usertest123


## ถ้ามีปัญหา ในการ save image run คำสั่งนี้

`php artisan storage:link`

## ถ้ามีปัญหา เกี่ยวกับ Version stripe

`composer require stripe/stripe-php`

## https://mailtrap.io/

สำหรับ สมัคร vertify email demo

## https://dashboard.stripe.com

สำหรับ สมัคร demo การชำระเงินออนไลน์
login เข้าหน้า dashboard >> Developers -> API keys -> Secret key copy and set to .env

code format styles all project
`npm run format`
```

## .env for Setting Gmail

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com -> Mail ตัวเอง
MAIL_PASSWORD=your_app_specific_password -> ไป Gen ที่ Gmail App Password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="your_email@gmail.com" -> Mail ที่จะแสดงเป็นผู้ส่ง
MAIL_FROM_NAME="${APP_NAME}" -> ชื่อที่แสดงในการส่ง Mail Default ("Perdis Website")

หรือดู `https://www.youtube.com/watch?v=kTcmbZqNiGw`
