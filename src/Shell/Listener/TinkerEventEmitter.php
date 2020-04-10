<?php

namespace Laravel\Tinker\Shell\Listener;

use Illuminate\Contracts\Events\Dispatcher;
use Laravel\Tinker\Events\AfterLoop;
use Psy\ExecutionLoop\AbstractListener;
use Psy\Shell;

class TinkerEventEmitter extends AbstractListener
{
    /**
     * @var Dispatcher
     */
    protected $dispatcher;

    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function afterLoop(Shell $shell)
    {
        $this->dispatcher->dispatch(new AfterLoop());
    }

    public static function isSupported()
    {
        return true;
    }
}
