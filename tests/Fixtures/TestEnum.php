<?php

namespace Othyn\Tests\Fixtures;

use Othyn\PhpEnumEnhancements\Traits\EnumEnhancements;

enum TestEnum
{
    use EnumEnhancements;

    case Alpha;
    case Bravo;
    case Charlie;
    case Delta;
    case Echo;
}
