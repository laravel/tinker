<?php

namespace Laravel\Tinker;

use Psy\Shell;

class ClassAliasAutoloader
{
    /**
     * @var  array
     */
    protected $classes = [];

    /**
     * @var  Shell
     */
    protected $shell;
    
    /**
     * Constructor
     *
     * @param  Shell  $shell
     * @param  string  $classMapPath
     */
    public function __construct(Shell $shell, $classMapPath, $includeVendor = false)
    {
        $this->shell = $shell;

        $vendorDir = dirname(dirname($classMapPath));
        $classFiles = require $classMapPath;

        foreach ($classFiles as $fqcn => $path) {
            if (false === strpos($fqcn, '\\')) {
                continue;
            }

            if (!$includeVendor && 0 === strpos($path, $vendorDir)) {
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
     */
    public function registerAutoloader()
    {
        spl_autoload_register([$this, 'aliasClass']);
    }
    
    /**
     * Find the closest class by name
     *
     * @param string $findClass
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
