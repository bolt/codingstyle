<?php

namespace Bolt\Tests\Files;

use Bolt\Tests\AbstractSniffTestCase;

class SideEffectsUnitTest extends AbstractSniffTestCase
{
    protected function getWarningList($filename = null)
    {
        return [
            7 => 1,
        ];
    }
}
