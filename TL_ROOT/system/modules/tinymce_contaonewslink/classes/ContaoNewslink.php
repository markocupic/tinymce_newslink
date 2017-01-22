<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 22.01.2017
 * Time: 21:36
 */

namespace TinyMceContaoNewslink;


class ContaoNewslink
{
    /**
     * Get all News items as json_encoded array
     * @author Marko Cupic
     * @return string
     */
    public static function getContaoNewsArchivesAsJSON(){
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
                if(isset($arrNews['archive_' . $oArchive->id]))
                {
                    $arrArchives[] = array('value' => $oArchive->id, 'text' => htmlspecialchars(utf8_decode_entities(strtoupper($oArchive->title))));
                }
            }
        }
        return array('archives' => $arrArchives, 'news' => $arrNews);
    }
}