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
	'TinymceNewslink',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'TinymceNewslink\TinymceNewslink' => 'system/modules/tinymce_newslink/classes/TinymceNewslink.php',
));
