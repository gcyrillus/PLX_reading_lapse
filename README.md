# PLX_reading_lapse
donne une estimation du temps de lecture d'un article sur une base de 220 Mots/minutes par défaut, cette valeur est configurable.

- Telechargez l'archive et televersez le dossier **timeLapseReading**  dans le dossier Plugins de votre PluXml.
- Activez le plugin
- Inserer dans vos templates le code suivant ou vous souhaitez voir affiché le temps de lecture estimé:

`<?php if(isset($plxShow->plxMotor->plxPlugins->aPlugins["timeLapseReading"])){$plxShow->plxMotor->plxPlugins->aPlugins["timeLapseReading"]->showReadingtime();}  ?>`

