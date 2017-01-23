<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */

if(TL_MODE == 'BE')
{
    $GLOBALS['TL_CSS'][] = 'system/modules/tinymce_contaonewslink/assets/css/contaonewslink.css';
    // Somehow Contao generates an error if you do not instantiate the class.
    new ContaoNewslink();

    $GLOBALS['TINYMCE']['SETTINGS']['TOOLBAR'][] = 'contaonewslink';
    $GLOBALS['TINYMCE']['SETTINGS']['PLUGINS'][] = 'contaonewslink';
    $GLOBALS['TINYMCE']['SETTINGS']['CONFIG_ROW']['test_string'] = "'This is a test string, and you have to quote it with a single quote.'";
    $GLOBALS['TINYMCE']['SETTINGS']['CONFIG_ROW']['contaonewslink_news_data'] = json_encode(TinyMceContaoNewslink\ContaoNewslink::getContaoNewsArchivesAsJSON());
    $GLOBALS['TINYMCE']['SETTINGS']['CONFIG_ROW']['contaonewslink_language_data'] = json_encode($GLOBALS['TL_LANG']['TINYMCE']['CONTAONEWSLINK']);


    $GLOBALS['TL_HOOKS']['outputBackendTemplate'][] = array('ContaoNewslink', 'outputBackendTemplate');

}
