<?php
defined('TYPO3_MODE') or die();

call_user_func(function () {
// initialize static extension templates
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('contagged', 'static/', 'Content parser');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('contagged', 'static/examples/',
        'Experimental Setup');
});
