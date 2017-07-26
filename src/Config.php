<?php

namespace Bolt\CsFixer;

/**
 * A CS Fixer Config that is easier to configure.
 *
 * @author Carson Full <carsonfull@gmail.com>
 */
class Config extends \PhpCsFixer\Config
{
    /**
     * Add directories to scan.
     *
     * @param string[] $dirs Directory paths
     *
     * @throws \InvalidArgumentException if one of the directories does not exist
     *
     * @return $this
     */
    public function in(...$dirs)
    {
        $this->getFinder()->in($dirs);

        return $this;
    }

    /**
     * Add to the current rules. Overrides existing rules.
     *
     * See {@see setRules} for the format of these rules.
     *
     * @param iterable $rules
     *
     * @return $this
     */
    public function addRules($rules)
    {
        if ($rules instanceof RiskyRulesAwareInterface && $rules->isRisky()) {
            $this->setRiskyAllowed(true);
        }

        if ($rules instanceof \Traversable) {
            $rules = iterator_to_array($rules);
        }

        if (!is_array($rules)) {
            throw new \InvalidArgumentException('Expected rules to be an iterable.');
        }

        $rules = array_replace($this->getRules(), $rules);

        $this->setRules($rules);

        return $this;
    }
}
