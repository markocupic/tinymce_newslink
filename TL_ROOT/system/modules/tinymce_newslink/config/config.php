<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */


if ($GLOBALS['TL_CONFIG']['useRTE'])
{

    $GLOBALS['TL_CSS'][] = 'system/modules/tinymce_newslink/assets/css/newslink.css';

    $GLOBALS['TINYMCE']['SETTINGS']['TOOLBAR'][] = 'newslink';
    $GLOBALS['TINYMCE']['SETTINGS']['PLUGINS'][] = 'newslink';
    $GLOBALS['TINYMCE']['SETTINGS']['CONFIG_ROW']['test_string'] = "'This is a test string, and you have to quote it with a single quote.'";
    $GLOBALS['TINYMCE']['SETTINGS']['CONFIG_ROW']['newslink_news_data'] = json_encode(TinymceNewslink\TinymceNewslink::getContaoNewsArchivesAsJSON());
    $GLOBALS['TINYMCE']['SETTINGS']['CONFIG_ROW']['newslink_language_data'] = json_encode($GLOBALS['TL_LANG']['TINYMCE']['NEWSLINK']);

}
