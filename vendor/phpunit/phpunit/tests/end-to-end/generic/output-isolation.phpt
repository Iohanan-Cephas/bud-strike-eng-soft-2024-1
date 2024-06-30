--TEST--
phpunit --process-isolation --filter testExpectOutputStringFooActualFoo ../../_files/OutputTestCase.php
--FILE--
<?php declare(strict_types=1);
$_SERVER['argv'][] = '--do-not-cache-result';
$_SERVER['argv'][] = '--no-configuration';
$_SERVER['argv'][] = '--process-isolation';
$_SERVER['argv'][] = '--filter';
$_SERVER['argv'][] = 'testExpectOutputStringFooActualFoo';
$_SERVER['argv'][] = __DIR__ . '/../../_files/OutputTestCase.php';

require_once __DIR__ . '/../../bootstrap.php';
PHPUnit\TextUI\Command::main();
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and contributors.

.                                                                   1 / 1 (100%)

Time: %s, Memory: %s

OK (1 test, 1 assertion)
