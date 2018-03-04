# SimpleAdmin

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Total Downloads][ico-downloads]][link-downloads]


SimpleAdmin is a simple way to have admin in your laravel 5.5 projects.

if you need more complex roles system you can use [Zizaco/entrus](https://github.com/Zizaco/entrust)

![preview](/preview.jpg)

## Installation

Via Composer

``` bash
$ composer require merodiro/simple-admin
```

Run the command to publish the package migration

Optional only if users table name isn't `users`

```bash
php artisan vendor:publish --provider="Merodiro\SimpleAdmin\SimpleAdminServiceProvider"
```


Migrate database

It assumes that users are in the `users` table, if not you can change the config file

```bash
php artisan migrate
```

add middleware in `app/Http/Kernel.php`

```php
protected $routeMiddleware = [
        ...
        'admin'      => \Merodiro\SimpleAdmin\Middleware\AdminMiddleware::class,
    ];
```

## Usage

To make user as admin set `$user->admin` to `1`

### Blade Templates
to show content to admins only

```php
@admin
    <h3>this is visible to admins only</h3>
@endadmin
```
to show different content to admins and non-admins users

```php
@admin
    <h3>this is visible to admins only</h3>
@else
    <h3>this is visible to non admins only</h3>
@endadmin
```

### middleware

you can use middleware to limit accessing a certain route to admins only

```php
Route::get('/admin', function () {
    ...
})->middleware('admin');
``` 

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security-related issues, please email merodiro@gmail.com instead of using the issue tracker.

## Credits

- [Amr A. Mohammed][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/merodiro/simple-admin.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/merodiro/simple-admin/master.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/merodiro/simple-admin.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/merodiro/simple-admin
[link-travis]: https://travis-ci.org/merodiro/simple-admin
[link-downloads]: https://packagist.org/packages/merodiro/simple-admin
[link-author]: https://github.com/merodiro
[link-contributors]: ../../contributors
