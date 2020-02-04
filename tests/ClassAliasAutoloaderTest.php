<?php

namespace Laravel\Tinker\Tests;

use Laravel\Tinker\ClassAliasAutoloader;
use Mockery;
use PHPUnit\Framework\TestCase;
use Psy\Shell;

class ClassAliasAutoloaderTest extends TestCase
{
    public function setUp(): void
    {
        $this->classmapPath = __DIR__.'/fixtures/vendor/composer/autoload_classmap.php';
    }

    public function tearDown(): void
    {
        $this->loader->unregister();
    }

    public function testCanAliasClasses()
    {
        $this->loader = ClassAliasAutoloader::register(
            $shell = Mockery::mock(Shell::class),
            $this->classmapPath
        );

        $shell->shouldReceive('writeStdout')
            ->with("[!] Aliasing 'Bar' to 'App\Foo\Bar' for this Tinker session.\n")
            ->once();

        $this->assertTrue(class_exists('Bar'));
        $this->assertInstanceOf(\App\Foo\Bar::class, new \Bar);
    }

    public function testCanExcludeNamespacesFromAliasing()
    {
        set_config('tinker.dont_alias', ['App\Baz']);

        $this->loader = ClassAliasAutoloader::register(
            $shell = Mockery::mock(Shell::class),
            $this->classmapPath
        );

        $shell->shouldNotReceive('writeStdout');

        $this->assertFalse(class_exists('Qux'));
    }

    public function testVendorClassesAreExcluded()
    {
        $this->loader = ClassAliasAutoloader::register(
            $shell = Mockery::mock(Shell::class),
            $this->classmapPath
        );

        $shell->shouldNotReceive('writeStdout');

        $this->assertFalse(class_exists('Three'));
    }

    public function testVendorClassesCanBeWhitelisted()
    {
        set_config('tinker.alias', ['One\Two']);

        $this->loader = ClassAliasAutoloader::register(
            $shell = Mockery::mock(Shell::class),
            $this->classmapPath
        );

        $shell->shouldReceive('writeStdout')
            ->with("[!] Aliasing 'Three' to 'One\Two\Three' for this Tinker session.\n")
            ->once();

        $this->assertTrue(class_exists('Three'));
        $this->assertInstanceOf(\One\Two\Three::class, new \Three);
    }
}
