# SimpleRoles

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]


SimpleRoles is a simple way to have roles in your laravel projects.

![preview](/preview.png)

## Installation

Via Composer

``` bash
$ composer require merodiro/simple-admin
```

Run the command to publish the package migration

```bash
php artisan vendor:publish --provider="Merodiro\SimpleRoles\SimpleRolesServiceProvider"
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
    'role'      => \Merodiro\SimpleRoles\Middleware\RoleMiddleware::class,        
];
```

## Usage
add roles to `roles` array in simple-roles config file first

### Set Role

```php
$user->setRole('admin');
```

### Remove Role

```php
$user->removeRole();
```

### Has Role
```php
if($user->hasRole('admin')){
    // do something
}
```

### Blade Templates
to show content to admins only

```php
@role('admin')
    <h3>this is visible to admins only</h3>
@endrole
```
to show different content to admins and non-admins users

```php
@role('admin')
    <h3>this is visible to admins only</h3>
@else
    <h3>this is visible to non admins only</h3>
@endrole
```

### middleware

you can use middleware to limit accessing a certain route to admins only

```php
Route::get('/admin', function () {
    ...
})->middleware('role:admin');
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
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/merodiro/simple-admin.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/merodiro/simple-admin.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/merodiro/simple-admin.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/merodiro/simple-admin
[link-travis]: https://travis-ci.org/merodiro/simple-admin
[link-scrutinizer]: https://scrutinizer-ci.com/g/merodiro/simple-admin/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/merodiro/simple-admin
[link-downloads]: https://packagist.org/packages/merodiro/simple-admin
[link-author]: https://github.com/merodiro
[link-contributors]: ../../contributors
