<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Console Commands
    |--------------------------------------------------------------------------
    |
    | This option allows you to add additional Artisan commands that should
    | be available within the Tinker environment. Once the command is in
    | this array you may execute the command in Tinker using its name.
    |
    */

    'commands' => [
        // App\Console\Commands\ExampleCommand::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Alias Blacklist
    |--------------------------------------------------------------------------
    |
    | Typically, Tinker automatically aliases classes as you require them in
    | Tinker. However, you may wish to never alias certain classes, which
    | you may accomplish by listing the classes in the following array.
    |
    */

    'dont_alias' => [
        'App\Nova',
    ],

    /*
    |--------------------------------------------------------------------------
    | Alias Whitelist
    |--------------------------------------------------------------------------
    |
    | Tinker will not automatically alias classes in your vendor namespaces.
    | However, you may wish to allow this for certain classes, which you
    | may accomplish by listing the classes in the following array.
    |
    */

    'alias' => [
        //
    ],

];
