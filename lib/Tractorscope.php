<?php

namespace Tractorscope;

/**
 * Class Tractorscope.
 */
class Tractorscope
{
    /** @var string The Tractorscope API Secret key to be used for requests. */
    public static $apiSecretKey;

    /** @var string The base URL for the Tractorscope API. */
    public static $apiBase = 'https://api.tractorscope.com';

    /** @var string The base URL for the OAuth API. */
    public static $embedBase = 'https://app.tractorscope.com/embed';

    /** @var string The base URL for the Tractorscope API uploads endpoint. */
    public static $shareBase = 'https://app.tractorscope.com/share';

    /**
     * @return string the API secret key used for signing and requests
     */
    public static function getApiSecretKey()
    {
        return self::$apiSecretKey;
    }

    /**
     * Sets the API secret key to be used for signing and requests.
     *
     * @param string $apiKey
     */
    public static function setApiSecretKey($apiSecretKey)
    {
        self::$apiSecretKey = $apiSecretKey;
    }
    
}
