<?php

namespace Laravel\Tinker\Shell;

use Psy\Shell;

class TinkerShell extends Shell
{
    /**
     * Adds a loop listener.
     *
     * @param \Psy\ExecutionLoop\Listener $listener
     */
    public function addLoopListener(Listener $listener)
    {
        $this->listeners[] = $listener;
    }
}
