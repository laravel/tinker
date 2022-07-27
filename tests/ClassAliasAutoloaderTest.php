<?php

namespace Laravel\Tinker\Tests;

use Laravel\Tinker\ClassAliasAutoloader;
use Mockery;
use PHPUnit\Framework\TestCase;
use Laravel\Tinker\Shell;
use Symfony\Component\Console\Output\BufferedOutput;

class ClassAliasAutoloaderTest extends TestCase
{
    protected function setUp(): void
    {
        $this->classmapPath = __DIR__.'/fixtures/vendor/composer/autoload_classmap.php';
    }

    protected function tearDown(): void
    {
        $this->loader->unregister();
    }

    public function testCanAliasClasses()
    {
        $this->loader = ClassAliasAutoloader::register(
            $shell = Mockery::mock(Shell::class),
            $this->classmapPath
        );

        $output = new BufferedOutput();
        $shell->shouldReceive('getOutput')->once()->andReturn($output);

        $this->assertTrue(class_exists('Bar'));
        $this->assertInstanceOf(\App\Foo\Bar::class, new \Bar);
        $this->assertStringContainsString('Aliasing [Bar] to [App\Foo\Bar].', $output->fetch());
    }

    public function testCanExcludeNamespacesFromAliasing()
    {
        $this->loader = ClassAliasAutoloader::register(
            $shell = Mockery::mock(Shell::class),
            $this->classmapPath,
            [],
            ['App\Baz']
        );

        $shell->shouldNotReceive('getOutput');

        $this->assertFalse(class_exists('Qux'));
    }

    public function testVendorClassesAreExcluded()
    {
        $this->loader = ClassAliasAutoloader::register(
            $shell = Mockery::mock(Shell::class),
            $this->classmapPath
        );

        $shell->shouldNotReceive('getOutput');

        $this->assertFalse(class_exists('Three'));
    }

    public function testVendorClassesCanBeWhitelisted()
    {
        $this->loader = ClassAliasAutoloader::register(
            $shell = Mockery::mock(Shell::class),
            $this->classmapPath,
            ['One\Two']
        );

        $output = new BufferedOutput();
        $shell->shouldReceive('getOutput')->once()->andReturn($output);

        $this->assertTrue(class_exists('Three'));
        $this->assertInstanceOf(\One\Two\Three::class, new \Three);
        $this->assertStringContainsString('Aliasing [Three] to [One\Two\Three].', $output->fetch());

    }
}
