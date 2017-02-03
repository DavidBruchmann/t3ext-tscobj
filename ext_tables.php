<?php
defined('TYPO3_MODE') || die ('Access denied.');

// Plugin options
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY . '_pi1'] = 'layout,select_key,pages,recursive';

// Add flexform fields to plugin options
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_pi1'] = 'pi_flexform';

// Add flexform DataStructures
if (version_compare(TYPO3_branch, '8.0', '>=')) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($_EXTKEY . '_pi1', 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_ds_pi1.xml');
} else {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($_EXTKEY . '_pi1', 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_ds_pi1.v7.xml');
}

// Add plugins
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(array(
    'LLL:EXT:tscobj/Resources/Private/Language/locallang_db.xlf:tt_content.list_type_pi1',
    $_EXTKEY . '_pi1'
), 'list_type');

if (TYPO3_MODE === 'BE') {
    $GLOBALS['TBE_MODULES_EXT']['xMOD_db_new_content_el']['addElClasses']['tx_' . $_EXTKEY . '_pi1_wizicon'] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Classes/Controller/Pi1/class.tx_tscobj_pi1_wizicon.php';

    if (version_compare(TYPO3_branch, '8.0', '<')) {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModulePath(
            'wizard_typoscript_browser',
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Modules/Wizards/TyposcriptBrowserWizard/'
        );
    }
}
