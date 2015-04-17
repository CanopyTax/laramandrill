<?php namespace Beanstalkhq\Laramandrill;

use GuzzleHttp\Client;

class Laramandrill
{
    protected $apiKey;

    /**
     * __construct
     */
    public function __construct()
    {
        $this->apiKey = config('laramandrill.api_key');
    }

    public static function request($httpVerb, $callName, array $arguments)
    {
        // Validations
        if (!self::_validateRequestVerb($httpVerb)) {
            throw new \Exception("You must pass a proper verb: get, head, post, put, delete or options");
        }
        // Setup
        $api_key = config('laramandrill.api_key');
        $verify = config('laramandrill.verify');
        $output = config('laramandrill.output');
        $api_base_url = config('laramandrill.api_base_url');

        // determine endpoint
        $client = new Client(['base_url' => $api_base_url]);
        $client->setDefaultOption('verify', $verify);
        $endpoint = $callName . '.' . $output;

        // build payload
        $arguments['key'] = $api_key;
        $httpVerb = strtolower($httpVerb);

        try {
            $response = $client->{$httpVerb}($endpoint, ['headers' => ['User-Agent' => 'laramandrill/1.0', 'Content-Type' => 'application/json',], 'json' => $arguments,]);
        } catch (RequestException $e) {
            echo $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                echo $e->getResponse() . "\n";
            }
        }
        return $response->getBody();
    }

    /**
     * _validateRequestVerb
     * @param $verb
     * @return bool
     */
    public static function _validateRequestVerb($verb)
    {
        return in_array($verb, ['get', 'head', 'post', 'put', 'delete', 'options']);
    }
}