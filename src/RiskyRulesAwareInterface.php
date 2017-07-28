<?php

namespace Bolt\CsFixer;

/**
 * An object implementing this interface can be passed to {@see \Bolt\CsFixer\Config::addRules}
 * to automatically allow risky rules.
 *
 * @author Carson Full <carsonfull@gmail.com>
 */
interface RiskyRulesAwareInterface
{
    /**
     * Whether risky rules have been included.
     *
     * @return bool
     */
    public function isRisky();
}
