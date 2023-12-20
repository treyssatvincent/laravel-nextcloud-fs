<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__ . '/src')
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@PHP83Migration' => true,
        '@PHP80Migration:risky' => true,

        'no_superfluous_elseif' => true,
        'no_useless_else' => true,
    ])
    ->setRiskyAllowed(true)
    ->setFinder($finder);
