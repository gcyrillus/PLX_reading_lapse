# PLX_reading_lapse
donne une estimation du temps de lecture d'un article sur une base de 220 Mots/minutes.

- Telechargez l'archive et televersez le dossier **timeLapseReading**  dans le dossier Plugins de votre PluXml.
- Activez le plugin
- Inserer dans vos templates le code suivant ou vous souhaitez voir affiché le temps de lecture estimé: <br>
`<?php if (eval($plxMotor->plxPlugins->callHook('showReadingtime'))) return; ?>`

- Configurer les options et le format d'affichage via l'administration.


