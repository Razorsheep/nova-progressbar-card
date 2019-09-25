## Nova ProgressBar Card
[![Latest Version on Packagist](https://img.shields.io/packagist/v/razorsheep/nova-progressbar-card.svg?style=flat-square)](https://packagist.org/packages/razorsheep/nova-progressbar-card)
[![Total Downloads](https://img.shields.io/packagist/dt/razorsheep/nova-progressbar-card.svg?style=flat-square)](https://packagist.org/packages/razorsheep/nova-progressbar-card)
[![License](https://poser.pugx.org/razorsheep/nova-progressbar-card/license)](https://packagist.org/packages/razorsheep/nova-progressbar-card)
[![Build Status](https://img.shields.io/travis/razorsheep/nova-progressbar-card/master.svg?style=flat-square)](https://travis-ci.org/razorsheep/nova-progressbar-card)
[![Quality Score](https://img.shields.io/scrutinizer/g/razorsheep/nova-progressbar-card.svg?style=flat-square)](https://scrutinizer-ci.com/g/razorsheep/nova-progressbar-card)


This package allows you to add progressbar cards to your resources and dashboards in [Nova](https://nova.laravel.com).

<img src="https://github.com/razorsheep/nova-progressbar-card/blob/master/screenshot.png" alt="Example">

#### DISCLAIMER: 
This package is still work in progress. Feel free to help improve it.


* [Requirements](#requirements)
* [Installation](#installation)
* [Basic Usage](#basic-usage)
* [Advanced Options](#advanced-options)

___
## Requirements
* [Laravel v5.8.*](https://laravel.com/docs/5.8)
* [Laravel Nova v2.*](https://nova.laravel.com/docs/2.0/)

___
## Installation
Just run:  
```bash
composer require razorsheep/nova-progressbar-card
```
After this the setup will be complete and you can use the components listed here.

___
## Basic Usage
```php
// in App\Nova\Product
...
use Razorsheep\Nova\Cards\ProgressBar\ProgressBar;
...

/**
 * Get the cards available for the request.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return array
 */
public function cards(Request $request)
{
    return [
        (new ProgressBar)->options(['title' => 'Translations', 'percentage' => 0.5]);
    ];
}

```

___ 
## Advanced Options

### Custom color
```php
public function cards(Request $request)
{
    return [
        (new ProgressBar)->options([
            'title' => 'Translations',
            'percentage' => 0.5,
            'color' => '#123456',
        ]);
    ];
}
```

### Animate Bar Color A -> B
```php
public function cards(Request $request)
{
    return [
        (new ProgressBar)->options([
            'title' => 'Translations',
            'percentage' => 0.5,
            'colorFrom' => '#aaa',
            'colorTo' => '#bbb',
            'animateColor' => true,
        ]);
    ];
}
```

### Stroke Width
```php
public function cards(Request $request)
{
    return [
        (new ProgressBar)->options([
            'title' => 'Translations',
            'percentage' => 0.5,
            'strokeWidth' => 8,
        ]);
    ];
}
```

### Semi Circle Type Progress Bar
```php
public function cards(Request $request)
{
    return [
        (new ProgressBar)->options([
            'title' => 'Translations',
            'percentage' => 0.5,
            'type' => 'semi-circle',
        ]);
    ];
}
```

Feel free to come with suggestions for improvements.
