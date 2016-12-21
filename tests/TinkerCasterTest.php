<?php

namespace Tests;

use PHPUnit_Framework_TestCase;
use Laravel\Tinker\TinkerCaster;
use Illuminate\Support\Collection;

class TinkerCasterTest extends PHPUnit_Framework_TestCase
{
    public function testCanCastCollection()
    {
        $caster = new TinkerCaster;

        $result = $caster->castCollection(new Collection(['foo', 'bar']));

        $this->assertSame([['foo', 'bar']], array_values($result));
    }
}
