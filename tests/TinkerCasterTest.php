<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Laravel\Tinker\TinkerCaster;
use Illuminate\Support\Collection;

class TinkerCasterTest extends TestCase
{
    public function testCanCastCollection()
    {
        $caster = new TinkerCaster;

        $result = $caster->castCollection(new Collection(['foo', 'bar']));

        $this->assertSame([['foo', 'bar']], array_values($result));
    }
}
