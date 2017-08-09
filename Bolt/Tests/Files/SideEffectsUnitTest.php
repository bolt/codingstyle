<?php

namespace Bolt\Tests\Files;

use Bolt\Tests\AbstractSniffTestCase;

class SideEffectsUnitTest extends AbstractSniffTestCase
{
    protected function getWarningList($filename = null)
    {
        if ($filename === 'SideEffectsUnitTest.inc') {
            return [
                5 => 1,
            ];
        }

        return [];
    }
}
