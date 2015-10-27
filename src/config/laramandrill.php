<?php
 
return [

	/**
	 * Set your your api key
	 * you can find or generate one at https://mandrillapp.com/settings/api
	 */
	'api_key' => 'your api key here',

	/**
	 * Set to false to disable verifying SSL certificate or pass full path string where certificate file is located
	 * example for Windows: 'C:\Program Files (x86)\Git\bin\curl-ca-bundle.crt'
	 */
	'verify' => true,

	/**
	 * json (default)
	 * xml
	 * yaml
	 * php
	 */
	'output' => 'json',

    /*
     * Set the Mandrill API base URL
     */
    'api_base_url' => 'https://mandrillapp.com/api/1.0/'


];