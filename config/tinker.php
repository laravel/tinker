<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Custom commands
    |--------------------------------------------------------------------------
    |
    | Sometimes, you might want to make certain console commands available in
    | Tinker. This option allows you to do just that. Simply provide a list
    | of commands that you want to expose to Tinker.
    |
    | After registering you can call the commands just like other white listed
    | Artisan commands in Tinker.
    |
    |     >>> quote;
    |
    */

    'commands' => [
        // 'quote' => App\Console\Commands\QuoteCommand::class,
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

    'dont_alias' => [],

];
