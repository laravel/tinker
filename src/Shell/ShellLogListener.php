<?php

namespace Laravel\Tinker\Shell;

use Psy\ExecutionLoop\AbstractListener;
use Psy\Shell;

class ShellLogListener extends AbstractListener
{
    /**
     * Listen for code execution.
     *
     * @param  \Psy\Shell  $shell
     * @param  string  $code
     * @return void
     */
    public function onExecute(Shell $shell, $code)
    {
        \Log::debug('Tinker session code run', ['code' => $code]);
    }

    /**
     * Determines if this log listener is supported.
     *
     * @return bool
     */
    public static function isSupported(): bool
    {
        return true; //implement a proper check
    }
}
