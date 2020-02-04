<?php
defined('TYPO3_MODE') or die();

call_user_func(function () {
// Add a field  "exclude this page from parsing" to the table "pages" and "tt_content"
    $tempColumns = [
        "tx_contagged_dont_parse" => [
            "exclude" => 1,
            "label" => "LLL:EXT:contagged/locallang_db.xml:pages.tx_contagged_dont_parse",
            "config" => [
                "type" => "check",
            ]
        ],
    ];

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns("pages", $tempColumns);
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes("pages", "tx_contagged_dont_parse;;;;1-1-1");

});
