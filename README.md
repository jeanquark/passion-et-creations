# Passion & Créations - Laravel 8 Vue.js

## Build Setup

```bash
# install dependencies
$ npm install

# start server
$ php artisan serve

# serve with hot reload
$ npm run hot

```

## Authentication

This application makes use of Laravel Sanctum and Laravel fortify for the authentication logic. Fortify's resources can be inspected in the <code>app/Actions</code> directory.

## Auto-deploy

Run <code>npm run prod</code> before push to Github. Auto deploy with Github actions.