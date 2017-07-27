<?php

namespace Bolt\Tests;

use PHP_CodeSniffer\Config;
use PHP_CodeSniffer\Tests\Standards\AbstractSniffUnitTest;
use PHP_CodeSniffer\Util\Tokens;

if (defined('PHP_CODESNIFFER_IN_TESTS') === false) {
    define('PHP_CODESNIFFER_IN_TESTS', true);
}

if (defined('PHP_CODESNIFFER_CBF') === false) {
    define('PHP_CODESNIFFER_CBF', false);
}

if (defined('PHP_CODESNIFFER_VERBOSITY') === false) {
    define('PHP_CODESNIFFER_VERBOSITY', 0);
}

require_once __DIR__ . '/../../vendor/squizlabs/php_codesniffer/autoload.php';

new Tokens();

/**
 * To test `FooSniff.php`:
 * - Create a `FooUnitTest.php` which extends this class. The class/file name needs to be
 *   the sniff name with the `Sniff` suffix replaced with `UnitTest`.
 * - Create a `FooUnitTest.inc` which is the fixture file for the class above. If you want
 *   to use multiple files, they just need to be in the form of `FooUnitTest.*`, and then
 *   you need to check the filename argument of {@see getErrorList} and {@see getWarningList}
 *   to match each file.
 * - Optionally, but recommended, create a `FooUnitTest.inc.fixed`. This corresponds to the
 *   fixture file it is named after and should be how the fixture file looks after running the
 *   sniff.
 *
 * @author Carson Full <carsonfull@gmail.com>
 */
abstract class AbstractSniffTestCase extends AbstractSniffUnitTest
{
    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->standardsDir = realpath(__DIR__ . '/../Sniffs') . '/';
        $this->testsDir = __DIR__ . '/';

        $GLOBALS['PHP_CODESNIFFER_SNIFF_CODES'] = [];
        $GLOBALS['PHP_CODESNIFFER_FIXABLE_CODES'] = [];

        Config::setConfigData('installed_paths', __DIR__ . '/../../', true);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        unset($GLOBALS['PHP_CODESNIFFER_RULESET']);
    }

    /**
     * {@inheritdoc}
     */
    protected function getErrorList($filename = null)
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    protected function getWarningList($filename = null)
    {
        return [];
    }
}
