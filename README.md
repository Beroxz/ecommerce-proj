# Laravel 11 + Vue 3.3 with Vite Setup

This guide will help you set up a Laravel 11 project with Vue 3.3 and use Vite as the build tool.

## Prerequisites

- **PHP >= 8.1**: Required for Laravel 11
- **Composer**: For managing PHP dependencies
- **Node.js & npm**: For managing JavaScript dependencies and running Vite
- **MySQL or SQLite**: Database for Laravel

## Installation

### 1. Laravel Installation

1. **Create a new Laravel project**:

   ```bash
   composer create-project laravel/laravel name-project 
   or `composer create-project laravel/laravel name-project:^11.0`

2. Go to the project directory:

   ```bash
   cd name-project

3. Set up the connection to the database:

   Copy .env.example to .env and set the database.
   
   ```bash
   cp .env.example .env

   Edit the database settings in the .env file:
   
   ```.env
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password

4. Generate application key:

   ```bash
   php artisan key:generate

### 2. Installing Vue 3.3 and Vite

1. Install Node dependencies:

   ```bash
   npm install
   npm install vue@3

2. Install Vite and related plugins:

   ```bash
   npm install vite @vitejs/plugin-vue

3. Configure Vite:

   Edit the vite.config.js file:

   ```javascript
   import { defineConfig } from 'vite';
   import vue from '@vitejs/plugin-vue';
   import laravel from 'laravel-vite-plugin';

   export default defineConfig({
      plugins: [
         laravel({
               input: 'resources/js/app.js',
               refresh: true,
         }),
         vue()
      ],
   });

4. Set up the resources/js/app.js file:

   ```javascript
   import { createApp } from 'vue';
   import App from './App.vue';

   createApp(App).mount('#app');

5. Add Vue components to the Blade Template:
   
   Edit the file resources/views/welcome.blade.php or any other file to add the Vue component:
   ```html
   <div id="app"></div>
   @vite('resources/js/app.js')


## Running the project ##

## Run the Laravel server: 
   ```bash
   Run `php artisan serve` 

Accessible at http://localhost:8000

## Run Vite:
   ```bash
   Run `npm run dev`

Accessible at http://localhost:8000


## Version

PHP 8.2.12 (cli) (built: Oct 24 2023 21:15:15) (ZTS Visual C++ 2019 x64)
Copyright (c) The PHP Group
Zend Engine v4.2.12, Copyright (c) Zend Technologies

Laravel Framework 11.23.5

Nodejs v18.20.4

@vitejs/plugin-vue@5.1.3
vue@3.5.5
@vue/server-renderer@3.5.5
