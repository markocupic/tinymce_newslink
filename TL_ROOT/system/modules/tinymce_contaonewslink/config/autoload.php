<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2017 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'TinyMceContaoNewslink',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'TinyMceContaoNewslink\ContaoNewslink' => 'system/modules/tinymce_contaonewslink/classes/ContaoNewslink.php',
));
