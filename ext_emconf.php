<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Content parser and tagger (Glossar)]',
    'description' => 'This extension parses your content to tag, replace and link specific terms. It is useful to auto-generate a glossary - but not only. See \'ChangeLog\' and WiKi (\'http://wiki.typo3.org/index.php/Contagged\').',
    'category' => 'fe',
    'shy' => 0,
    'version' => '1.9.0-dev',
    'state' => 'excludeFromUpdates',
    'uploadfolder' => 1,
    'createDirs' => 'uploads/tx_contagged/rte/',
    'modify_tables' => 'tt_content,pages',
    'clearcacheonload' => 0,
    'author' => 'Jochen Rau',
    'author_email' => 'jochen.rau@typoplanet.de',
    'author_company' => 'typoplanet',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-9.5.99',
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Ppi\\Contagged\\' => 'Classes',
        ],
        'classmap' => [
            'class.tx_contagged.php',
            'pi1',
            'model'
        ],
    ],
];
