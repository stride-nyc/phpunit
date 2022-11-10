<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework\Constraint;

use function array_reduce;
use function array_shift;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;

#[CoversClass(LogicalAnd::class)]
#[Small]
final class LogicalAndTest extends BinaryOperatorTestCase
{
    public static function getOperatorName(): string
    {
        return 'and';
    }

    public static function getOperatorPrecedence(): int
    {
        return 22;
    }

    public function evaluateExpectedResult(array $input): bool
    {
        $initial = (bool) array_shift($input);

        return array_reduce($input, static fn ($carry, bool $item): bool => $carry && $item, $initial);
    }
}
