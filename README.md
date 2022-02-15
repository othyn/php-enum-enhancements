# PHP Enum Enhancements

[![Tests](https://github.com/othyn/php-enum-enhancements/actions/workflows/phpunit.yml/badge.svg)](https://github.com/othyn/php-enum-enhancements/actions/workflows/phpunit.yml)
[![Code Style](https://github.com/othyn/php-enum-enhancements/actions/workflows/phpcsfixer.yml/badge.svg)](https://github.com/othyn/php-enum-enhancements/actions/workflows/phpcsfixer.yml)
[![GitHub license](https://img.shields.io/github/license/othyn/php-enum-enhancements)](https://github.com/othyn/php-enum-enhancements/blob/main/LICENSE)
[![Love](https://img.shields.io/badge/built%20with-love-red)](https://img.shields.io/badge/built%20with-love-red)

A [Composer](https://getcomposer.org/) package for [PHP](https://www.php.net/) that adds some helpful enum traits to the glorious new PHP [Enum](https://www.php.net/manual/en/language.enumerations.php) type.

The package so far provides;

- A handy trait that extends PHP's native Enum type
- Adds a new static `UnitEnum::valueArray(): array` method that returns all values within an Enum as an equally typed array of Enum values
- Adds a new static `UnitEnum::valueList(string $separator = ', '): string` method that returns all values within an Enum as a comma separated list string

The package is available on Packagist as [othyn/php-enum-enhancements](https://packagist.org/packages/othyn/php-enum-enhancements).

---

## Installation

Hop into your project that you wish to install it in and run the following Composer command to grab the latest version:

```sh
composer require othyn/php-enum-enhancements
```

---

## Usage

For more comprehensive usage examples, you can view the test suite. However I'll show some basic usage examples below.

### Enum: Value Array

```php
<?php

namespace App\Enums;

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

var_dump(TestEnum::valueArray());

// Results in the following being printed:
// array(5) {
//   [0]=>
//   string(5) "Alpha"
//   [1]=>
//   string(5) "Bravo"
//   [2]=>
//   string(7) "Charlie"
//   [3]=>
//   string(5) "Delta"
//   [4]=>
//   string(4) "Echo"
// }
```

### Enum: Value List

```php
<?php

namespace App\Enums;

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

var_dump(TestEnum::valueList());

// Results in the following being printed:
// string(34) "Alpha, Bravo, Charlie, Delta, Echo"

var_dump(TestEnum::valueList(separator: ':'));

// Results in the following being printed:
// string(30) "Alpha:Bravo:Charlie:Delta:Echo"
```

### Backed String Enum: Value Array

```php
<?php

namespace App\Enums;

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

var_dump(TestStringBackedEnum::valueArray());

// Results in the following being printed:
// array(5) {
//   [0]=>
//   string(5) "alpha"
//   [1]=>
//   string(5) "bravo"
//   [2]=>
//   string(7) "charlie"
//   [3]=>
//   string(5) "delta"
//   [4]=>
//   string(4) "echo"
// }
```

### Backed String Enum: Value List

```php
<?php

namespace App\Enums;

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

var_dump(TestStringBackedEnum::valueList());

// Results in the following being printed:
// string(34) "alpha, bravo, charlie, delta, echo"

var_dump(TestStringBackedEnum::valueList(separator: ':'));

// Results in the following being printed:
// string(30) "alpha:bravo:charlie:delta:echo"
```

### Backed Int Enum: Value Array

```php
<?php

namespace App\Enums;

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

var_dump(TestIntBackedEnum::valueArray());

// Results in the following being printed:
// array(5) {
//   [0]=>
//   int(1)
//   [1]=>
//   int(2)
//   [2]=>
//   int(3)
//   [3]=>
//   int(4)
//   [4]=>
//   int(5)
// }
```

### Backed Int Enum: Value List

```php
<?php

namespace App\Enums;

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

var_dump(TestIntBackedEnum::valueList());

// Results in the following being printed:
// string(13) "1, 2, 3, 4, 5"

var_dump(TestIntBackedEnum::valueList(separator: ':'));

// Results in the following being printed:
// string(9) "1:2:3:4:5"
```

---

## Development

Most development processes are wrapped up in an easy to use Docker container.

### Enforcing Style

The projects `.php-cs-fixer.dist.php` config contains the rules that this repo conforms to and will run against the `./src` and `./tests` directory.

For remote style enforcement there is a GitHub Action configured to automatically run `phpcsfixer`.

For local style enforcement there is a composer script `composer style` configured to run `phpcsfixer`.

### Testing

For remote testing there is a GitHub Action setup to automatically run the test suite on the `main` branch or and PR branches.

For local testing there is a Docker container that is pre-built that contains an Alpine CLI release of PHP + PHPUnit + xdebug. This is setup to test the project and can be setup via the following:

```sh
composer docker-build
```

This should trigger Docker Compose to build the image. You can then up the container via the following:

```sh
composer docker-up
```

There are tests for all code written, in which can be run via:

```sh
# PHPUnit with code coverage report
composer test

# PHPUnit with code coverage report, using local phpunit and xdebug
composer test-local
```

In those tests, there are Feature tests for a production ready implementation of the package. There are no Unit tests at present.

You can also easily open a shell in the testing container by using the command:

```sh
composer docker-shell
```

---

## Changelog

Any and all project changes for releases should be documented below. Versioning follows the [SemVer](https://semver.org/) standard.

---

### Version 1.0.1

[[Git Changes]](https://github.com/othyn/php-enum-enhancements/compare/v1.0.0...v1.0.1) README changes.

#### Added

- Everything

#### Changed

- SemVer verbiage and link change in the README.
- Change usage examples in the readme to instead utilise `var_dump` to demonstrate the resulting types within the array returned from `UnitEnum::valueArray()`.
- Utilised the `UnitEnum` base type within the docs in code examples where a test Enum is not present.

#### Fixed

- Everything

#### Removed

- Nothing

---

### Version 1.0.0

[[Git Changes]](https://github.com/othyn/php-enum-enhancements/compare/39afaf2a6a2c2238f1e8180aaa7ab7a33d79940c...v1.0.0) Initial release.

#### Added

- Everything

#### Changed

- Everything

#### Fixed

- Everything

#### Removed

- Nothing
