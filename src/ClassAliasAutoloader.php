<?php

namespace Laravel\Tinker;

use Psy\Shell;

class ClassAliasAutoloader
{
    /**
     * @var array
     */
    protected $classes = [];

    /**
     * @var \Psy\Shell
     */
    protected $shell;
    
    /**
     * Constructor
     *
     * @param \Psy\Shell $shell
     * @param string $classMapPath
     * @return void
     */
    public function __construct(Shell $shell, $classMapPath)
    {
        $this->shell = $shell;

        $vendorDir = dirname(dirname($classMapPath));
        $classFiles = require $classMapPath;

        foreach ($classFiles as $fqcn => $path) {
            if (false === strpos($fqcn, '\\') || 0 === strpos($path, $vendorDir)) {
                continue;
            }

            $className = last(explode('\\', $fqcn));
            if (!isset($this->classes[$className])) {
                $this->classes[$className] = $fqcn;
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
     * @param string $findClass
     * @return void
     */
    public function aliasClass($findClass)
    {
        if (false !== strpos($findClass, '\\')) {
            return;
        }

        $fqcn = isset($this->classes[$findClass])
            ? $this->classes[$findClass]
            : false;
        
        if ($fqcn) {
            $this->shell->writeStdout("[!] Aliasing '$findClass' to '$fqcn' for this Tinker session.\n");
            class_alias($fqcn, $findClass);
        }
    }
}
