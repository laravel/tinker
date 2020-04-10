<?php

namespace Laravel\Tinker\Shell;

use Laravel\Tinker\Shell\Listener\TinkerEventEmitter;
use Psy\Shell;

class TinkerShell extends Shell
{
    protected function getDefaultLoopListeners()
    {
        return array_merge(parent::getDefaultLoopListeners(), [
            new TinkerEventEmitter(),
        ]);
    }
}
