<?php

namespace Laravel\Tinker\Tests;

use Illuminate\Support\Collection;
use Laravel\Tinker\TinkerCaster;
use PHPUnit\Framework\TestCase;

class TinkerCasterTest extends TestCase
{
    public function testCanCastCollection()
    {
        $caster = new TinkerCaster;

        $result = $caster->castCollection(new Collection(['foo', 'bar']));

        $this->assertSame([['foo', 'bar']], array_values($result));
    }
}
