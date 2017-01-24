<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 22.01.2017
 * Time: 21:36
 */

namespace TinymceNewslink;


class TinymceNewslink
{
    /**
     * Get all News items as json_encoded array
     * @author Marko Cupic
     * @return string
     */
    public static function getContaoNewsArchivesAsJSON()
    {
        $arrNews = array();
        $arrArchives = array();
        $oArchive = \NewsArchiveModel::findAll();
        if ($oArchive !== null)
        {
            while ($oArchive->next())
            {

                $oNews = \NewsModel::findByPid($oArchive->id);
                while ($oNews->next())
                {
                    if ($oNews->published)
                    {
                        $arrNews['archive_' . $oArchive->id][] = array('value' => $oNews->id, 'text' => htmlspecialchars(utf8_decode_entities($oNews->headline)));
                    }
                }
                // Do not list archive, if there is no item
                if (isset($arrNews['archive_' . $oArchive->id]))
                {
                    $arrArchives[] = array('value' => $oArchive->id, 'text' => htmlspecialchars(utf8_decode_entities(strtoupper($oArchive->title))));
                }
            }
        }
        return array('archives' => $arrArchives, 'news' => $arrNews);
    }

    /**
     * @param $strBuffer
     * @param $strTemplate
     * @return mixed
     */
    public static function outputBackendTemplate($strBuffer, $strTemplate)
    {

        if ($strTemplate == 'be_main')
        {

            //Plugins
            $tinyMcePluginPattern = '/window.tinymce(.*)tinymce.init(.*)plugins:(.*)\'(.*)\'/sU';
            if(preg_match($tinyMcePluginPattern, $strBuffer, $matches))
            {
                if (isset($GLOBALS['TINYMCE']['SETTINGS']['PLUGINS']))
                {

                    if (is_array($GLOBALS['TINYMCE']['SETTINGS']['PLUGINS']))
                    {
                        if (isset($matches[4]))
                        {
                            $aPlugins = explode(" ", $matches[4]);
                            foreach ($GLOBALS['TINYMCE']['SETTINGS']['PLUGINS'] as $plugin)
                            {
                                $aPlugins[] = $plugin;
                            }
                            $aPlugins = array_unique($aPlugins);
                            $strPlugins = implode(' ', $aPlugins);
                            $strBuffer = str_replace($matches[4], $strPlugins, $strBuffer);
                        }
                    }
                }
            }


            // Toolbar
            $tinyMceToolbarPattern = '/window.tinymce(.*)tinymce.init(.*)toolbar:(.*)\'(.*)\'/sU';
            if(preg_match($tinyMceToolbarPattern, $strBuffer, $matches))
            {
                if (isset($GLOBALS['TINYMCE']['SETTINGS']['TOOLBAR']))
                {

                    if (is_array($GLOBALS['TINYMCE']['SETTINGS']['TOOLBAR']))
                    {
                        if (isset($matches[4]))
                        {
                            $aButtons = explode("|", $matches[4]);
                            $aButtons =  array_map ( function($item){
                                return trim($item);
                            } , $aButtons );
                            foreach ($GLOBALS['TINYMCE']['SETTINGS']['TOOLBAR'] as $button)
                            {
                                $aButtons[] = $button;
                            }
                            $aButtons = array_unique($aButtons);
                            $strButtons = implode(' | ', $aButtons);
                            $strBuffer = str_replace($matches[4], $strButtons, $strBuffer);
                        }
                    }
                }
            }

            // New CONFIG_ROW
            $strRows = "";
            $tinyMceRowPattern = '/window.tinymce(.*)tinymce.init(.*)\({(.*)<\/script>/sU';
            if(preg_match($tinyMceRowPattern, $strBuffer, $matches))
            {
                if (isset($GLOBALS['TINYMCE']['SETTINGS']['CONFIG_ROW']))
                {

                    if (is_array($GLOBALS['TINYMCE']['SETTINGS']['CONFIG_ROW']))
                    {
                        if (isset($matches[3]))
                        {

                            foreach ($GLOBALS['TINYMCE']['SETTINGS']['CONFIG_ROW'] as $key => $row)
                            {
                                $strRows .=  "\n\t" . $key .": " . $row . ",";
                            }

                            $strBuffer = str_replace($matches[3], $strRows . $matches[3], $strBuffer);
                        }
                    }
                }
            }
        }

        return $strBuffer;
    }
}


/*
<script>
setTimeout(function() {
window.tinymce && tinymce.init({
    skin: 'contao',
    selector: '#<?php echo $selector; ?>',
    language: '<?php echo Backend::getTinyMceLanguage(); ?>',
    element_format: 'html',
    document_base_url: '<?php echo Environment::get('base'); ?>',
    entities: '160,nbsp,60,lt,62,gt,173,shy',
    setup: function(editor) {
    editor.getElement().removeAttribute('required');
},
    init_instance_callback: function(editor) {
    if (document.activeElement && document.activeElement.id && document.activeElement.id == editor.id) {
        editor.editorManager.get(editor.id).focus();
    }
    editor.on('focus', function() { Backend.getScrollOffset(); });
},
    file_browser_callback: function(field_name, url, type, win) {
    Backend.openModalBrowser(field_name, url, type, win);
},
    templates: [
      <?php echo Backend::getTinyTemplates(); ?>
],
plugins: 'autosave charmap code fullscreen image importcss link lists paste searchreplace tabfocus table template visualblocks',
browser_spellcheck: true,
tabfocus_elements: ':prev,:next',
importcss_append: true,
importcss_groups: [{title: '<?php echo Config::get('uploadPath'); ?>/tinymce.css'}],
content_css: '<?php echo TL_PATH; ?>/system/themes/tinymce.css,<?php echo TL_PATH . '/' . Config::get('uploadPath'); ?>/tinymce.css',
extended_valid_elements: 'q[cite|class|title],article,section,hgroup,figure,figcaption',
menubar: 'file edit insert view format table',
toolbar: 'link unlink | image | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | undo redo | code'
});
}, 0);
</script>
*/