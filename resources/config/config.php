<?php

return [

    /*
     * The Google Tag Manager id, should be a code that looks something like "gtm-xxxx".
     */
    'id' => env('GOOGLE_TAG_MANAGER_ID', ''),

    /*
     * Enable or disable script rendering. Useful for local development.
     */
    'enabled' => env('GOOGLE_TAG_MANAGER_ENABLED', true),

    /*
     * If you want to use some macro's you 'll probably store them
     * in a dedicated file. You can optionally define the path
     * to that file here and we will load it for you.
     */
    'macroPath' => env('GOOGLE_TAG_MANAGER_MACRO_PATH', ''),

    /*
     * The key under which data is saved to the session with flash.
     */
    'sessionKey' => env('GOOGLE_TAG_MANAGER_SESSION_KEY', '_googleTagManager'),

    /*
     * Configure how Tag Manager works between development and production and other server environments.
     * @see https://support.google.com/tagmanager/answer/6311518
     */
    'environment' => [
        'enabled' => env('GOOGLE_TAG_MANAGER_ENV_ENABLED', false),

        'gtmAuth' => env('GOOGLE_TAG_MANAGER_AUTH'), // required when environmentEnabled = true
        'gtmPreview' => env('GOOGLE_TAG_MANAGER_PREVIEW'), // required when environmentEnabled = true
        'gtmCookiesWin' => env('GOOGLE_TAG_MANAGER_COOKIES_WIN'), // required when environmentEnabled = true
    ],
];
