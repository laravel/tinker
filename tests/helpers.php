<?php

$GLOBALS['config'] = [];

function set_config($key, $value)
{
    $GLOBALS['config'][$key] = $value;
}

function config($key)
{
    return $GLOBALS['config'][$key] ?? null;
}
