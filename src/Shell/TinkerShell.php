<?php

namespace Laravel\Tinker\Shell;

use Illuminate\Contracts\Events\Dispatcher;
use Laravel\Tinker\Shell\Listener\TinkerEventEmitter;
use Psy\Configuration;
use Psy\Shell;

class TinkerShell extends Shell
{
    /**
     * @var Dispatcher
     */
    protected $dispatcher;

    public function __construct(Dispatcher $dispatcher, Configuration $config = null)
    {
        // This needs to be set before the call to parent::__construct, as
        // getDefaultLoopListeners is called inside parent::__construct and we
        // need $this->dispatcher there!
        $this->dispatcher = $dispatcher;

        parent::__construct($config);
    }

    protected function getDefaultLoopListeners()
    {
        return array_merge(parent::getDefaultLoopListeners(), [
            new TinkerEventEmitter($this->dispatcher),
        ]);
    }
}
