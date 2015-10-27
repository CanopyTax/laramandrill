laramandrill
============

Laravel Mandrill plugin!

Version 1.x - For Laravel 4.x

Version 2.x - For Laravel 5.x

This plugin for laravel is based heavily on the plugin by [MichMich](https://github.com/MichMich/laravel-mandrill) but made for composer and some other goodies.

This package is a simple wrapper for working w/ the [Mandrill API](http://mandrillapp.com/api/docs/).

## Install ##

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `CanopyTax/laramandrill`.

	"require": {
		"CanopyTax/laramandrill": "~2.0"
	}

Next, update Composer from the Terminal:

    composer update

Once this operation completes, the final step is to add the service provider. Open `config/app.php`, and add a new item to the providers array.

    'CanopyTax\Laramandrill\LaramandrillServiceProvider'

Add this line to `aliases` array in your `config/app.php`

    'Laramandrill' => 'CanopyTax\Laramandrill\Facades\Laramandrill'

Lastly you need to add your Mandrill API key. Generate the config file and edit it inside {root}/config/laramandrill.php

## Usage ##

Call the desired method and pass the params as a single array.  Don't worry about passing the API key.

```php
$response = Laramandrill::request('post', 'messages/send', array(
	'message' => array(
		'html' => 'Body of the message.',
		'subject' => 'Subject of the message.',
		'from_email' => 'monkey@somewhere.com',
		'to' => array(array('email'=>'foo@bar.com')),
	),
));
```
