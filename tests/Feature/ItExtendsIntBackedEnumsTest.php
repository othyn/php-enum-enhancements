<?php

namespace Othyn\Tests\Feature;

use Othyn\Tests\Fixtures\TestIntBackedEnum;
use PHPUnit\Framework\TestCase;

class ItExtendsIntBackedEnumsTest extends TestCase
{
    public function test_it_can_produce_a_value_array_for_an_int_backed_enum(): void
    {
        $this->assertSame(
            TestIntBackedEnum::valueArray(),
            [1, 2, 3, 4, 5]
        );
    }

    public function test_it_can_produce_a_value_list_for_an_int_backed_enum(): void
    {
        $this->assertSame(
            TestIntBackedEnum::valueList(),
            '1, 2, 3, 4, 5'
        );
    }

    public function test_it_can_produce_a_value_list_with_a_custom_separator_for_an_enum(): void
    {
        $this->assertSame(
            TestIntBackedEnum::valueList(separator: ':'),
            '1:2:3:4:5'
        );
    }
}
