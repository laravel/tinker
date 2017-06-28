<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Guess fully qualified class names
    |--------------------------------------------------------------------------
    |
    | This option lets tinker try to automatically load the appropriate class
    | without having to type the full namespace. For example, rather than typing
    | `App\User::find(1)` you can just type `User::find(1)`. 
    |
    */

    'guess_fqcn' => false,

    /*
    |--------------------------------------------------------------------------
    | Include vendor/ code when guessing class names
    |--------------------------------------------------------------------------
    |
    | If set to true, Tinker will alias classes installed with Composer. If set
    | to false, anything in your vendor/ directory will be excluded.
    |
    */

    'guess_fqcn_vendor' => false,

];