laramandrill
============

Laravel Mandrill plugin!

This plugin for laravel is based heavily on the plugin by [MichMich](https://github.com/MichMich/laravel-mandrill) but made for composer and some other goodies.

This package is a simple wrapper for working w/ the [Mandrill API](http://mandrillapp.com/api/docs/).

## Install ##

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `CanopyTax/laramandrill`.

	"require": {
		"CanopyTax/laramandrill": "~1.0"
	}

Next, update Composer from the Terminal:

    composer update

Once this operation completes, the final step is to add the service provider. Open `config/app.php`, and add a new item to the providers array.

    'CanopyTax\Laramandrill\LaramandrillServiceProvider'
    
Lastly you need to add your Mandrill API key. Generate the config file and edit it inside {root}/app/config/packages/laramandrill/laramandrill.php

    $ php artisan config:publish CanopyTax/laramandrill


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
