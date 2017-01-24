<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */

// This plugin requires https://github.com/markocupic/tinymce_plugin_builder
if ($GLOBALS['TL_CONFIG']['useRTE'])
{
    // Add stylesheet
    $GLOBALS['TL_CSS'][] = 'system/modules/tinymce_newslink/assets/css/newslink.css';

    // Add a plugin to the tinymce editor
    $GLOBALS['TINYMCE']['SETTINGS']['PLUGINS'][] = 'newslink';

    // Add a button to the toolbar in tinymce editor
    $GLOBALS['TINYMCE']['SETTINGS']['TOOLBAR'][] = 'newslink';

    // Add a new config row to the tinymce.init method (json_encoded array from a PHP class)
    $GLOBALS['TINYMCE']['SETTINGS']['CONFIG_ROW']['newslink_news_data'] = json_encode(TinymceNewslink\TinymceNewslink::getContaoNewsArchivesAsJSON());

    // Add a new config row to the tinymce.init method (json_encoded array from a language file)
    $GLOBALS['TINYMCE']['SETTINGS']['CONFIG_ROW']['newslink_language_data'] = json_encode($GLOBALS['TL_LANG']['TINYMCE']['NEWSLINK']);
}
