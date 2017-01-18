# tinyMCE Newslink
##Backend Plugin f�r Contao 3

Mit diesem Plugin lassen sich im Backend beim Gebrauch des tinyMCE rte �ber einen Button Newsbeitr�ge verlinken. Bei der Auswahl eines Newsbeitrages wird in der Textarea ein Inserttag in der Form {{news::*}} eingef�gt.

![Backend](manual/image3.JPG?raw=true "Backend")

## Installation
Nach der Installation m�ssen die beiden Dateien
system/config/tinymcenewslink.dcaconfig.php in system/config/dcaconfig.php  und 
system/config/tinymcenewslink.tinyCustom.php in system/config/tinyCustom.php
umbenannt werden, oder die bereits bestehenden Dateien entsprechend angepasst werden.

Die Datei tinymcenewslink.tinyCustom.php enth�lt neben den 4 tinymce_newslink-plugin-Einstellungen die Contao Standardkonfiguration des rte-Editors, welche nach der Installation von Contao in der Datei system/config/tinyMCE.php hinterlegt ist. Sie k�nnen hier auch weitere Einstellungen t�tigen. Speichern Sie danach die neue Datei als tinyCustom.php. Passen Sie dann noch die DCA-Konfiguration in der Datei system/config/dcaconfig.php an, damit Contao zuk�nftig die neue Konfigurationsdatei l�dt.
https://docs.contao.org/books/manual/3.2/de/07-contao-anpassen/tinymce-anpassen.html

In system/config/tinyCustom.php die gelb markierten 4 Einstellungen, die f�r das tinymce_newslink-plugin notwendig sind.
![tinyCustom.php](manual/image1.JPG?raw=true "tinyCustom.php")


in system/config/dcaconfig.php muss auf die tinyCustom.php Konfigurationsdatei verwiesen werden.
![dcaconfig.php](manual/image2.JPG?raw=true "dcaconfig.php")