<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/src')
    ->in(__DIR__.'/tests');

    return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony'                   => true,
        'no_superfluous_phpdoc_tags' => true,
        'php_unit_method_casing'     => [
            'case' => 'snake_case',
        ],
        'yoda_style' => [
            'equal'            => false,
            'identical'        => false,
            'less_and_greater' => false,
        ],
        'binary_operator_spaces' => [
            'operators' => [
                '=>' => 'align_single_space_minimal',
                '='  => 'align_single_space_minimal',
            ],
        ],
    ])
    ->setLineEnding("\n")
    ->setUsingCache(false)
    ->setRiskyAllowed(true)
    ->setFinder($finder);
