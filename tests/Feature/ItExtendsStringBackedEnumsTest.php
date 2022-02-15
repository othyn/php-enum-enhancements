<?php

namespace Othyn\Tests\Feature;

use Othyn\Tests\Fixtures\TestStringBackedEnum;
use PHPUnit\Framework\TestCase;

class ItExtendsStringBackedEnumsTest extends TestCase
{
    public function test_it_can_produce_a_value_array_for_a_string_backed_enum(): void
    {
        $this->assertSame(
            TestStringBackedEnum::valueArray(),
            ['alpha', 'bravo', 'charlie', 'delta', 'echo']
        );
    }

    public function test_it_can_produce_a_value_list_for_a_string_backed_enum(): void
    {
        $this->assertSame(
            TestStringBackedEnum::valueList(),
            'alpha, bravo, charlie, delta, echo'
        );
    }

    public function test_it_can_produce_a_value_list_with_a_custom_separator_for_an_enum(): void
    {
        $this->assertSame(
            TestStringBackedEnum::valueList(separator: ':'),
            'alpha:bravo:charlie:delta:echo'
        );
    }
}
