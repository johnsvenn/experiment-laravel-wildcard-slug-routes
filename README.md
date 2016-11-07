# Laravel Wildcard Slug Routes - proof of concept

(Built with Laravel 5.3)

An example of how to create and use a wildcard route that will capture slugs and route them to the correct controller. This is the kind of functionality often needed in CMS applications where users want the ability to give all public pages SEO friendly URLs.

## How it works

We have a Blog model and a Page model both of which have a slug field. When new records are created an Observer class stores the slug and model name in a Slug model. Validation ensures that slugs are unique in the slug model.

Slugs are created from a modified version of the str_slug() to allow rough and ready multi level slugs by allowing the / character

e.g.

Foo Bar -> /foo-bar

Foo/Bar -> /foo/bar

## Install

- Clone the repository
- Run `composer update`
- Create a .env file in the root of the application add db credentials etc.
- Generate an APP_KEY `php artisan key:generate`
- Set the correct permissions on the `storage` and `/bootstrap/cache` directories
- Run `php artisan migrate`

## Todo

As this is just a quick proof of concept lots of additional functionality would be needed in real life.

- Add edit functionality 
- Cache the Slug model
- Allow slug to route to specific controller methods rather than just controllers


