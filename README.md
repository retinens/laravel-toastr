# Bootstrap 5 flash messages for your Laravel app

[![Latest Version on Packagist](https://img.shields.io/packagist/v/retinens/laravel-toastr.svg?style=flat-square)](https://packagist.org/packages/retinens/laravel-toastr)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/retinens/laravel-toastr/run-tests?label=tests)](https://github.com/retinens/laravel-toastr/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/retinens/laravel-toastr/Check%20&%20fix%20styling?label=code%20style)](https://github.com/retinens/laravel-toastr/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/retinens/laravel-toastr.svg?style=flat-square)](https://packagist.org/packages/retinens/laravel-toastr)

This package provides an easy interface for using Toastr.js messages in your Laravel app.

## Installation

You can install the package via composer:

```bash
composer require retinens/laravel-toastr
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-toastr-config"
```

This is the contents of the published config file:

```php
return [
    /*
     * Defines the default auto_hide parameter
     */
    'auto_hide' => false,

    /*
     * Defines the position of the toast on the window
     */

    // "top" or "bottom"
    "position_y" => 'bottom',
    // "start" or "end"
    "position_x" => 'end',
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-toastr-views"
```


## Usage

Toastr should be imported in your assets and available in the window variable.

For example, in your `app.js` file:

```js
import * as toastr from 'toastr'
window.toastr = toastr
```

```scss
@import '~toastr/build/toastr.scss';
```


Include the component in your blade base template, after all the scripts.

```html
<x-toastr/>
```

Then, in your controller, call the `toastr()` method to create a toast message.

```php
public function update()
{
    //do stuff
    toastr('Post edited!');
    return redirect(route('posts.index'));
}
```

The toast method accepts the title and level as optional arguments :

```php
toastr('message','level','title')
```

There are a few quick methods to modify the toast:

- `toastr()->success('Message')`: Set the toast level as "success".
- `toastr()->info('Message')`: Set the toast level as "info".
- `toastr()->error('Message')`: Set the toast level as "danger".
- `toastr()->warning('Message')`: Set the toast level as "warning".


- `toastr()->title('Message',"Toast title")`: Set the toast title.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Lucas Houssa](https://github.com/WhereIsLucas)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
