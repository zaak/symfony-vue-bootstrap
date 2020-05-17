Symfony + VUE Bootstrap
=======================

This bootstrap code is a simple TODO app that persistently stores data in a SQLite database.

## Usage

 1. `git clone git@github.com:zaak/symfony-vue-bootstrap.git`
 2. `cd symfony-vue-bootstrap`
 3. `composer install`
 4. `yarn install`
 5. `symfony serve`
 
 That's it. At this point, if you go to http://localhost:8000/, you should see a simple working TODO application.

## Preconfigured features

 - Symfony 5 base
 - Doctrine ORM + SQLite database
 - Twig
 - Webpack Encore + VUE
 - Maker Bundle

## Useful commands

 - `yarn build` - Builds the production version of assets.
 - `yarn dev` - Builds the development version of assets.
 - `yarn watch-hmr` - Starts webpack dev server in watch mode and enables Hot Module Replacement. This is very convenient when working with VUE as you see the changes almost immediately, you don't even have to refresh the browser window. [Read more](https://symfony.com/doc/current/frontend/encore/dev-server.html).
 - `composer cs-fix` - Fixes the code style.
