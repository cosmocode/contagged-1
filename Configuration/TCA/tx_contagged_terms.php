<?php

use Ppi\Contagged\ItemsProcFunc;

return [
    'ctrl' => [
        'title' => 'LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms',
        'label' => 'term_replace',
        'label_alt' => 'term_main, term_alt',
        'label_alt_force' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l18n_parent',
        'transOrigDiffSourceField' => 'l18n_diffsource',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
            'fe_group' => 'fe_group',
        ],
        'useColumnsForDefaultValues' => 'term_type',
        'iconfile' => 'EXT:contagged/icon_tx_contagged_terms.gif',
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid,l18n_parent,hidden,starttime,endtime,fe_group term_main, term_alt, term_type, term_lang, replacement, desc_short, desc_long, reference, pronunciation, image, imagecaption, imagealt, imagetitle, multimedia, related, link, exclude',
    ],
    'types' => [
        '0' => [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    term_main, term_alt, term_type, term_lang, term_replace, desc_short, desc_long, reference, pronunciation, image, imagecaption, imagealt, imagetitle, multimedia, related, link, exclude,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;language,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    hidden,fe_group,--palette--;;access,
            ',
        ],
    ],
    'palettes' => [
        'language' => [
            'showitem' => '
                sys_language_uid;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:sys_language_uid_formlabel,l18n_parent
            ',
        ],
        'access' => [
            'showitem' => '
                starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,
                endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel,
                --linebreak--,
            ',
        ],
    ],
    'columns' => [
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 30,
            ],
        ],
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ],
                ],
                'default' => 0,
            ]
        ],
        'l18n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_contagged_terms',
                'foreign_table_where' => 'AND tx_contagged_terms.pid=###CURRENT_PID### AND tx_contagged_terms.sys_language_uid IN (-1,0)',
                'default' => 0
            ],
        ],
        'l18n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'default' => 0,
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'default' => 0
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly'
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ]
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly'
        ],
        'fe_group' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.fe_group',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'size' => 5,
                'maxitems' => 20,
                'items' => [
                    [
                        'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.hide_at_login',
                        -1
                    ],
                    [
                        'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.any_login',
                        -2
                    ],
                    [
                        'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.usergroups',
                        '--div--'
                    ]
                ],
                'exclusiveKeys' => '-1,-2',
                'foreign_table' => 'fe_groups',
                'foreign_table_where' => 'ORDER BY fe_groups.title',
                'enableMultiSelectFilterTextfield' => true
            ]
        ],
        'term_main' => [
            'exclude' => true,
            'label' => 'LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms.term_main',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'required',
            ],
        ],
        'term_alt' => [
            'exclude' => true,
            'label' => 'LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms.term_alt',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 5,
            ],
        ],
        'term_type' => [
            'exclude' => true,
            'label' => 'LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms.term_type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'itemsProcFunc' => ItemsProcFunc::class . '->user_addTermTypes',
                'size' => 1,
                'maxitems' => 1,
                'disableNoMatchingValueElement' => 1,
            ],
        ],
        'term_lang' => [
            'exclude' => true,
            'label' => 'LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms.term_lang',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                // TODO Make selectable languages configurable.
                'items' => [
                    ['LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms.term_lang.I.0', ''],
                    ['LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms.term_lang.I.1', 'en'],
                    ['LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms.term_lang.I.2', 'fr'],
                    ['LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms.term_lang.I.3', 'de'],
                    ['LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms.term_lang.I.4', 'it'],
                    ['LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms.term_lang.I.5', 'es'],
                    ['LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms.term_lang.I.6', 'un'],
                ],
                'size' => 1,
                'maxitems' => 1,
            ],
        ],
        'term_replace' => [
            'exclude' => true,
            'label' => 'LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms.term_replace',
            'config' => [
                'type' => 'input',
                'size' => 30,
            ],
        ],
        'desc_short' => [
            'exclude' => true,
            'label' => 'LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms.desc_short',
            'config' => [
                'type' => 'input',
                'size' => 30,
            ],
        ],
        'desc_long' => [
            'exclude' => true,
            'label' => 'LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms.desc_long',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 5,
                'enableRichtext' => true,
                'richtextConfiguration' => 'default'
            ],
        ],
        'reference' => [
            'exclude' => true,
            'label' => 'LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms.reference',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 2,
            ],
        ],
        'pronunciation' => [
            'exclude' => true,
            'label' => 'LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms.pronunciation',
            'config' => [
                'type' => 'input',
                'size' => 30,
            ],
        ],
        'image' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.images',
            'config' => [
                'type' => 'group',
                'internal_type' => 'file',
                'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
                'uploadfolder' => 'uploads/pics',
                'show_thumbs' => '1',
                'size' => 3,
                'autoSizeMax' => 15,
                'maxitems' => 99,
                'minitems' => 0,
            ],
        ],
        'imagecaption' => [
            'exclude' => true,
            'label' => 'LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms.imagecaption',
            'config' => [
                'type' => 'text',
                'cols' => 30,
                'rows' => 3,
            ],
        ],
        'imagealt' => [
            'exclude' => true,
            'label' => 'LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms.imagealt',
            'config' => [
                'type' => 'text',
                'cols' => 20,
                'rows' => 3,
            ],
        ],
        'imagetitle' => [
            'exclude' => true,
            'label' => 'LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms.imagetitle',
            'config' => [
                'type' => 'text',
                'cols' => 20,
                'rows' => 3,
            ],
        ],
        'multimedia' => [
            'label' => 'LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms.multimedia',
            'config' => [
                'type' => 'group',
                'internal_type' => 'file',
                'allowed' => 'swf,swa,dcr,wav,avi,au,mov,asf,mpg,wmv,mp3,mp4,m4v',
                'uploadfolder' => 'uploads/media',
                'size' => 2,
                'maxitems' => 1,
                'minitems' => 0,
            ],
        ],
        'related' => [
            'exclude' => true,
            'l10n_mode' => 'exclude',
            'label' => 'LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms.related',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => '*',
                'MM' => 'tx_contagged_related_mm',
                'show_thumbs' => 1,
                'size' => 3,
                'autoSizeMax' => 20,
                'maxitems' => 9999,
                'minitems' => 0,
            ],
        ],
        'link' => [
            'exclude' => true,
            'label' => 'LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms.link',
            'config' => [
                'type' => 'input',
                'size' => 28,
                'max' => 255,
                'checkbox' => '',
                'eval' => 'trim',
                'wizards' => [
                    'link' => [
                        'type' => 'popup',
                        'title' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_link_formlabel',
                        'icon' => 'actions-wizard-link',
                        'module' => [
                            'name' => 'wizard_link',
                        ],
                        'JSopenParams' => 'width=800,height=600,status=0,menubar=0,scrollbars=1'
                    ]
                ],
            ],
        ],
        'exclude' => [
            'exclude' => true,
            'label' => 'LLL:EXT:contagged/locallang_db.xml:tx_contagged_terms.exclude',
            'config' => [
                'type' => 'check',
            ],
        ],
    ],
];
