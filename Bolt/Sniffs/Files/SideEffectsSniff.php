<?php

namespace Bolt\Sniffs\Files;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

class SideEffectsSniff implements Sniff
{
    public $allowed = [
        'Deprecated',
        'trigger_error',
    ];

    public function register()
    {
        return [T_OPEN_TAG];
    }

    public function process(File $file, $stackPtr)
    {
        $tokens = $file->getTokens();

        $start = 0;
        while (true) {
            list($symbolIndex, $effectIndex) = $this->searchForConflict($file, $start, $file->numTokens - 1, $tokens);

            if ($symbolIndex === null || $effectIndex === null) {
                $file->recordMetric($stackPtr, 'Declarations and side effects mixed', 'no');

                // Ignore the rest of the file.
                return $file->numTokens + 1;
            }

            $start = $file->findEndOfStatement($effectIndex) + 1;

            $symbol = $tokens[$symbolIndex];
            $effect = $tokens[$effectIndex];

            // If line is ignored, try again at next statement
            if (isset($file->getIgnoredLines()[$effect['line']])) {
                continue;
            }

            // If effect is allowed, try again at next statement
            if ($effect['code'] === T_STRING && in_array($effect['content'], $this->allowed)) {
                $start = $file->findEndOfStatement($effectIndex) + 1;
                continue;
            }

            $error = 'A file should declare new symbols (classes, functions, constants, etc.) and cause no other side effects, or it should execute logic with side effects, but should not do both. The first symbol is defined on line %s and the first side effect is on line %s.';
            $data = [
                $symbol['line'],
                $effect['line'],
            ];
            $file->addWarning($error, $effectIndex, 'FoundWithSymbols', $data);
            $file->recordMetric($stackPtr, 'Declarations and side effects mixed', 'yes');

            return $start;
        }
    }

    protected function searchForConflict(File $file, $start, $end, $tokens)
    {
        $sniff = new \PHP_CodeSniffer\Standards\PSR1\Sniffs\Files\SideEffectsSniff();
        $ref = new \ReflectionMethod($sniff, 'searchForConflict');
        $ref->setAccessible(true);

        $result = $ref->invoke($sniff, $file, $start, $end, $tokens);

        return [$result['symbol'], $result['effect']];
    }
}
