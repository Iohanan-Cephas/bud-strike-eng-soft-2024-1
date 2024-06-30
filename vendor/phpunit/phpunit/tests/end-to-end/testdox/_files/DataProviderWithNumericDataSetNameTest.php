<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\TestFixture\TestDox;

use PHPUnit\Framework\TestCase;

final class DataProviderWithNumericDataSetNameTest extends TestCase
{
    /**
     * @dataProvider provider
     */
    public function testSomethingThatWorks(string $a, int $b, float $c, array $d, bool $e): void
    {
        $this->assertTrue(true);
    }

    /**
     * @dataProvider provider
     */
    public function testSomethingThatDoesNotWork(string $a, int $b, float $c, array $d, bool $e): void
    {
        /* @noinspection PhpUnitAssertTrueWithIncompatibleTypeArgumentInspection */
        $this->assertTrue(false);
    }

    public function provider(): array
    {
        return [
            0 => [
                'string',
                0,
                0.0,
                ['key' => 'value'],
                true,
            ],
        ];
    }
}
