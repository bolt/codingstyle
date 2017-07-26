<?php

namespace Bolt\CsFixer;

/**
 * Bolt's rules.
 *
 * @author Carson Full <carsonfull@gmail.com>
 */
class Rules implements \IteratorAggregate
{
    private $rules = [
        '@Symfony'       => true,
        '@Symfony:risky' => true,
    ];

    private $riskyRules = [
        '@Symfony:risky' => true,
    ];

    private $php56Rules = [
        '@PHP56Migration' => true,
    ];

    private $php70Rules = [
        '@PHP70Migration' => true,
    ];
    private $php70RulesRisky = [
        '@PHP70Migration:risky' => true,
    ];

    private $php71Rules = [
        '@PHP71Migration' => true,
    ];
    private $php71RulesRisky = [
        '@PHP71Migration:risky' => true,
    ];

    private $includeRisky = false;
    private $includePhp56 = false;
    private $includePhp70 = false;
    private $includePhp71 = false;

    /**
     * Create Rules.
     *
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    /**
     * Include Bolt's risky rules.
     *
     * @return $this
     */
    public function risky()
    {
        $this->includeRisky = true;

        return $this;
    }

    /**
     * Include PHP 5.6 rules.
     *
     * @return $this
     */
    public function php56()
    {
        $this->includePhp56 = true;

        return $this;
    }

    /**
     * Include PHP 7.0 (and below) rules.
     *
     * @return $this
     */
    public function php70()
    {
        $this->php56();
        $this->includePhp70 = true;

        return $this;
    }

    /**
     * Include PHP 7.1 (and below) rules.
     *
     * @return $this
     */
    public function php71()
    {
        $this->php70();
        $this->includePhp71 = true;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        $rules = $this->rules;

        if ($this->includePhp56) {
            $rules += $this->php56Rules;
        }
        if ($this->includePhp70) {
            $rules += $this->php70Rules;
        }
        if ($this->includePhp71) {
            $rules += $this->php71Rules;
        }

        if ($this->includeRisky) {
            $rules += $this->riskyRules;

            if ($this->includePhp70) {
                $rules += $this->php70RulesRisky;
            }
            if ($this->includePhp71) {
                $rules += $this->php71RulesRisky;
            }
        }

        return new \ArrayIterator($rules);
    }
}
