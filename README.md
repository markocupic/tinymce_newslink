# tinyMCE Newslink
Backend Plugin f�r Contao 3

Mit dem Plugin lassen sich im Backend beim Gebrauch des tinyMCE rte �ber einen Button Newsbeitr�ge verlinken. Bei der Auswahl eines Newsbeitrages wird in der Textarea ein Inserttag in der Form {{news::*}} eingef�gt.

## Installation
Nach der Installation m�ssen die beiden Dateien
system/config/dcaconfig.dcaconfig.php in system/config/dcaconfig.php  und 
system/config/tinyCustom.tinyCustom.php in system/config/tinyCustom.php
umbenannt werden, oder die bereits bestehenden Dateien entsprechend angepasst werden.

In system/config/tinyCustom.php die gelb markierten 4 �nderungen.
![tinyCustom.php](manual/image1.JPG?raw=true "tinyCustom.php")


in system/config/dcaconfig.php muss auf die tinyCustom.php Konfigurationsdatei verwiesen werden.
![dcaconfig.php](manual/image2.JPG?raw=true "dcaconfig.php")