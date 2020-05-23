<?php

return PhpCsFixer\Config::create()
    ->setRules(array(
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'yoda_style' => false,
    ))
    ->setRiskyAllowed(true)
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__.'/src')
    )
;
