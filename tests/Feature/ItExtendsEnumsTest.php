<?php

namespace Othyn\Tests\Feature;

use Othyn\Tests\Fixtures\TestEnum;
use PHPUnit\Framework\TestCase;

class ItExtendsEnumsTest extends TestCase
{
    public function test_it_can_produce_a_value_array_for_an_enum(): void
    {
        $this->assertSame(
            TestEnum::valueArray(),
            ['Alpha', 'Bravo', 'Charlie', 'Delta', 'Echo']
        );
    }

    public function test_it_can_produce_a_value_list_for_an_enum(): void
    {
        $this->assertSame(
            TestEnum::valueList(),
            'Alpha, Bravo, Charlie, Delta, Echo'
        );
    }

    public function test_it_can_produce_a_value_list_with_a_custom_separator_for_an_enum(): void
    {
        $this->assertSame(
            TestEnum::valueList(separator: ':'),
            'Alpha:Bravo:Charlie:Delta:Echo'
        );
    }
}
