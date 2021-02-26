# LaravelProject


## Contents:
- ##### What is Laravel?
- ##### Why Laravel?
- ##### Project Description 
- ##### Features
- ##### How I worked with it 
- ##### Mentions

## What is Laravel?

Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern and based on Symfony. Some of the features of Laravel are a modular packaging system with a dedicated dependency manager, different ways for accessing relational databases, utilities that aid in application deployment and maintenance, and its orientation toward syntactic sugar.

## Why Laravel?

___Personal reasons:___
- So I can learn a new API Framework
- So I can develop my PHP skills

___Objective reasons:___

- Great documentation
- It helps create fast web applications
- The server-client authentication system is fast
- Software testing can be automated
- Routing and caching activities are faster
- The critical security threats & vulnerabilities can be fixed easily

## Project Description
    
A REST API that resembles an online shop which offer details about a product entity with a Frontend web app that consumes the API. The products are stored in the database (sqlite). They can be edited by authors/admins and they can be taken off the site (available:false). The users can be edited only by the admins.

## Features

- Products (Name, Description, Price, Image, Available)
- Products CRUD
- User authentication system (CRUD)
- User roles (user, author, admin)

## How I worked with it?

- Created project via [Composer]
```sh
    composer create-project laravel/laravel LaravelProject
```
- Created authentication system
```sh
    composer require laravel/ui
    php artisan ui vue --auth
```
- Set up Frontend with [node] and [npm]
```sh
    npm install && npm run dev
```
- Created Database
```sh
    // created database.sqlite file in /database
    // changed DB settings in .env
```
- Migrated DB
- For the next steps,you can find all the things you need in the [commits section]

## Mentions

__App Accounts:__
| Role   | Email             | Password  |
|--------|-------------------|-----------|
| User   | user@user.com     | 123456789 |
| Author | author@author.com | 123456789 |
| Admin  | admin@admin.com   | 123456789 |

__Note that this app was tested on:__
- Laravel: 4.1.1
- Node: 14.15.5
- NPM: 7.5.6

__QuickStart:__
```sh
    laravel artisan serve
```

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)


   [Composer]: <https://laravel.com/docs/4.2#install-composer>
   [node]: <https://nodejs.org>
   [npm]: <https://www.npmjs.com>
   [commits section]: <https://github.com/SebastianRichiteanu/LaravelProject/commits/main>

