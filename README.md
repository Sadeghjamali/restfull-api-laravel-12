# RESTful API Practice Project — Laravel 12

A learning project for exploring RESTful API development with Laravel 12.

## Tech Stack

- PHP
- Laravel 12
- Laravel Sanctum
- Eloquent ORM
- JSON-based HTTP endpoints

## Current API Resources

The route definitions include endpoints for the following resources:

- Buyers — list and detail
- Sellers — list and detail
- Categories — resource routes excluding HTML create/edit forms
- Products — list and detail
- Transactions — list and detail
- Users — resource routes excluding HTML create/edit forms

## Requirements

- PHP 8.2 or later
- Composer
- Node.js and npm
- A supported database

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/Sadeghjamali/restfull-api-laravel-12.git
   cd restfull-api-laravel-12
   ```

2. Install dependencies and create the environment file:

   ```bash
   composer install
   cp .env.example .env
   php artisan key:generate
   ```

3. Configure your database in `.env`.

4. Run database migrations:

   ```bash
   php artisan migrate
   ```

5. Start the development server:

   ```bash
   php artisan serve
   ```

6. Send requests to the endpoints defined in `routes/api.php`, using an API client such as Postman.

## Learning Goals

- Defining API resource routes
- Working with Laravel controllers and Eloquent models
- Returning data from HTTP endpoints
- Understanding API authentication and authorization

## Security Note

This repository is for learning purposes. Verify endpoint authorization, request validation, and error handling before connecting the API to sensitive data or deploying it publicly.

## Repository

https://github.com/Sadeghjamali/restfull-api-laravel-12
