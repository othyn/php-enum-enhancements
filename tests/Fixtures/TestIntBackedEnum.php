<?php

namespace Othyn\Tests\Fixtures;

use Othyn\PhpEnumEnhancements\Traits\EnumEnhancements;

enum TestIntBackedEnum: int
{
    use EnumEnhancements;

    case One   = 1;
    case Two   = 2;
    case Three = 3;
    case Four  = 4;
    case Five  = 5;
}
