<?php

namespace Laravel\Tinker\Shell;

use Laravel\Tinker\Shell\Listener\TinkerEventEmitter;
use Psy\Configuration;
use Psy\Shell;

class TinkerShell extends Shell
{
    /**
     * @var TinkerEventEmitter
     */
    protected $emitter;

    public function __construct(TinkerEventEmitter $emitter, Configuration $config = null)
    {
        // This needs to be set before the call to parent::__construct, as
        // getDefaultLoopListeners is called inside parent::__construct and we
        // need $this->emitter there!
        $this->emitter = $emitter;

        parent::__construct($config);
    }

    protected function getDefaultLoopListeners()
    {
        return array_merge(parent::getDefaultLoopListeners(), [
            $this->emitter,
        ]);
    }
}
