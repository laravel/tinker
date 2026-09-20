<?php

namespace Laravel\Tinker\Tests;

use Laravel\Tinker\ClassAliasAutoloader;
use PHPUnit\Framework\TestCase;
use Psy\Shell;
use Symfony\Component\Console\Output\BufferedOutput;

class ClassAliasAutoloaderTest extends TestCase
{
    protected $classmapPath;
    protected $loader;
    protected $shell;
    protected $output;

    protected function setUp(): void
    {
        $this->classmapPath = __DIR__.'/fixtures/vendor/composer/autoload_classmap.php';
        $this->output = new BufferedOutput();
        $this->shell = new Shell();
        $this->shell->setOutput($this->output);
    }

    protected function tearDown(): void
    {
        $this->loader->unregister();
    }

    public function testCanAliasClasses()
    {
        $this->loader = ClassAliasAutoloader::register(
            $this->shell,
            $this->classmapPath
        );

        $this->assertTrue(class_exists('Bar'));
        $this->assertSame("[!] Aliasing 'Bar' to 'App\Foo\Bar' for this Tinker session.\n", $this->output->fetch());
        $this->assertInstanceOf(\App\Foo\Bar::class, new \Bar);
    }

    public function testCanExcludeNamespacesFromAliasing()
    {
        $this->loader = ClassAliasAutoloader::register(
            $this->shell,
            $this->classmapPath,
            [],
            ['App\Baz']
        );

        $this->assertFalse(class_exists('Qux'));
        $this->assertSame('', $this->output->fetch());
    }

    public function testVendorClassesAreExcluded()
    {
        $this->loader = ClassAliasAutoloader::register(
            $this->shell,
            $this->classmapPath
        );

        $this->assertFalse(class_exists('Three'));
        $this->assertSame('', $this->output->fetch());
    }

    public function testVendorClassesCanBeWhitelisted()
    {
        $this->loader = ClassAliasAutoloader::register(
            $this->shell,
            $this->classmapPath,
            ['One\Two']
        );

        $this->assertTrue(class_exists('Three'));
        $this->assertSame("[!] Aliasing 'Three' to 'One\Two\Three' for this Tinker session.\n", $this->output->fetch());
        $this->assertInstanceOf(\One\Two\Three::class, new \Three);
    }
}
