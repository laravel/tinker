<?php

namespace Laravel\Tinker;

use Psy\Shell;
use Illuminate\Support\Str;

class ClassAliasAutoloader
{
    /**
     * The shell instance.
     *
     * @var \Psy\Shell
     */
    protected $shell;

    /**
     * All of the discovered classes.
     *
     * @var array
     */
    protected $classes = [];

    /**
     * Create a new alias loader instance.
     *
     * @param  \Psy\Shell  $shell
     * @param  string  $classMapPath
     * @return void
     */
    public function __construct(Shell $shell, $classMapPath)
    {
        $this->shell = $shell;

        $vendorPath = dirname(dirname($classMapPath));

        $classes = require $classMapPath;

        foreach ($classes as $class => $path) {
            if (! Str::contains($class, '\\') || Str::startsWith($path, $vendorPath)) {
                continue;
            }

            $name = class_basename($class);

            if (! isset($this->classes[$name])) {
                $this->classes[$name] = $class;
            }
        }
    }

    /**
     * Register the SPL autoloader
     *
     * @return void
     */
    public function registerAutoloader()
    {
        spl_autoload_register([$this, 'aliasClass']);
    }

    /**
     * Find the closest class by name
     *
     * @param  string  $class
     * @return void
     */
    public function aliasClass($class)
    {
        if (Str::contains($class, '\\')) {
            return;
        }

        $fullName = isset($this->classes[$class])
            ? $this->classes[$class]
            : false;

        if ($fullName) {
            $this->shell->writeStdout("[!] Aliasing '{$class}' to '{$fullName}' for this Tinker session.\n");

            class_alias($fullName, $class);
        }
    }

    /**
     * Handle the destruction of the instance.
     *
     * @return void
     */
    public function __destruct()
    {
        spl_autoload_unregister([$this, 'aliasClass']);
    }
}
