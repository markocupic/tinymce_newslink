<?php

// Put your custom configuration here
// Enable custom configuration for tinyMCE rte
$GLOBALS['TL_DCA']['tl_content']['fields']['text']['eval']['rte'] = 'tinyCustom';
$GLOBALS['TL_DCA']['tl_news']['fields']['teaser']['eval']['rte'] = 'tinyNewsCustom';
$GLOBALS['TL_DCA']['tl_gmk_mitarbeiter']['fields']['publications']['eval']['rte'] = 'tinyCustom';