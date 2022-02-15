<?php

namespace Othyn\Tests\Fixtures;

use Othyn\PhpEnumEnhancements\Traits\EnumEnhancements;

enum TestStringBackedEnum: string
{
    use EnumEnhancements;

    case Alpha   = 'alpha';
    case Bravo   = 'bravo';
    case Charlie = 'charlie';
    case Delta   = 'delta';
    case Echo    = 'echo';
}
