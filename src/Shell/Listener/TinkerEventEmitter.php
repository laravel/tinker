<?php

namespace Laravel\Tinker\Shell\Listener;

use Psy\ExecutionLoop\AbstractListener;
use Psy\Shell;

class TinkerEventEmitter extends AbstractListener
{
    public function afterLoop(Shell $shell)
    {
        event('tinker.after-loop');
    }

    public static function isSupported()
    {
        return true;
    }
}
