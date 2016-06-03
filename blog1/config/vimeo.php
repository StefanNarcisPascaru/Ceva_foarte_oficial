<?php

/*
 * This file is part of Laravel Vimeo.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Vimeo Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'main' => [
            'client_id' => '226106e64eaba5b268c6ff20e64e0c353358feb1',
            'client_secret' => 'bsegF0/sXRom80d6u7075xoRVon+wVTpmptVQTE3pnttXcXHuCIfbOvAGWK/7EQcXKevvSoKlFjmVd47XvA6AXabUi4KdMi9/sB4ypg8lktBTGkWDfLuFUkDPkw4rcEg',
            'access_token' => '5f2fa118b28ca8d3c075a967e275f283',
        ],

        'alternative' => [
            'client_id' => 'your-client-id',
            'client_secret' => 'your-client-secret',
            'access_token' => null,
        ],

    ],

];
