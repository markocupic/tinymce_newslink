# tinyMCE Newslink
Backend Plugin für Contao 3

Mit dem Plugin lassen sich im Backend beim Gebrauch des tinyMCE rte über einen Button Newsbeiträge verlinken. Bei der Auswahl eines Newsbeitrages wird in der Textarea ein Inserttag in der Form {{news::*}} eingefügt.

## Installation
Nach der Installation müssen die beiden Dateien
system/config/dcaconfig.dcaconfig.php in system/config/dcaconfig.php  und 
system/config/tinyCustom.tinyCustom.php in system/config/tinyCustom.php
umbenannt werden, oder die bereits bestehenden Dateien entsprechend angepasst werden.

In system/config/tinyCustom.php die gelb markierten 4 Änderungen.
![tinyCustom.php](manual/image1.JPG?raw=true "tinyCustom.php")


in system/config/dcaconfig.php muss auf die tinyCustom.php Konfigurationsdatei verwiesen werden.
![dcaconfig.php](manual/image2.JPG?raw=true "dcaconfig.php")