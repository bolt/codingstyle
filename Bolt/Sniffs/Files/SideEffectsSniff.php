<?php

namespace Bolt\Sniffs\Files;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

class SideEffectsSniff implements Sniff
{
    public function register()
    {
        return [T_OPEN_TAG];
    }

    public function process(File $file, $stackPtr)
    {
        $tokens = $file->getTokens();

        $sniff = new \PHP_CodeSniffer\Standards\PSR1\Sniffs\Files\SideEffectsSniff();
        $ref = new \ReflectionMethod($sniff, 'searchForConflict');
        $ref->setAccessible(true);
        $result = $ref->invoke($sniff, $file, 0, ($file->numTokens - 1), $tokens);

        if ($result['symbol'] !== null && $result['effect'] !== null) {
            $error = 'A file should declare new symbols (classes, functions, constants, etc.) and cause no other side effects, or it should execute logic with side effects, but should not do both. The first symbol is defined on line %s and the first side effect is on line %s.';
            $data = [
                $tokens[$result['symbol']]['line'],
                $tokens[$result['effect']]['line'],
            ];

            //----- Modified from parent (allow calls to "Deprecated" and "trigger_error") --------
            $effect = $tokens[$result['effect']];
            if ($effect['code'] === T_STRING && in_array($effect['content'], ['Deprecated', 'trigger_error'])) {
                return $file->numTokens + 1;
            }
            //----- end modification --------

            $file->addWarning($error, $result['effect'], 'FoundWithSymbols', $data);
            $file->recordMetric($stackPtr, 'Declarations and side effects mixed', 'yes');
        } else {
            $file->recordMetric($stackPtr, 'Declarations and side effects mixed', 'no');
        }

        // Ignore the rest of the file.
        return ($file->numTokens + 1);
    }
}
