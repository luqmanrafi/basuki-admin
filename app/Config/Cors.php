<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Cross-Origin Resource Sharing (CORS) Configuration
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
 */
class Cors extends BaseConfig
{
    /**
     * The default CORS configuration.
     *
     * @var array{
     *      allowedOrigins: list<string>,
     *      allowedOriginsPatterns: list<string>,
     *      supportsCredentials: bool,
     *      allowedHeaders: list<string>,
     *      exposedHeaders: list<string>,
     *      allowedMethods: list<string>,
     *      maxAge: int,
     *  }
     */
    public array $default = [
        'allowedOrigins'         => ['*'], // For development. For production, specify your frontend domain e.g., ['https://my-app.com']
        'allowedOriginsPatterns' => [],
        'supportsCredentials'    => false,
        'allowedHeaders'         => ['X-API-KEY', 'X-Requested-With', 'Content-Type', 'Accept', 'Authorization'],
        'exposedHeaders'         => [],
        'allowedMethods'         => ['GET', 'POST', 'OPTIONS', 'PUT', 'DELETE'],
        'maxAge'                 => 7200,
    ];
}
