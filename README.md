# PLX_reading_lapse
donne une estimation du temps de lecture d'un article sur une base de 220 Mots/minutes.

- Telechargez l'archive et televersez le dossier **timeLapseReading**  dans le dossier Plugins de votre PluXml.
- Activez le plugin
- Inserer dans vos templates le code suivant ou vous souhaitez voir affiché le temps de lecture estimé: <br>
`<?php if (eval($plxMotor->plxPlugins->callHook('showReadingtime'))) return; ?>`

- Configurer les options et le format d'affichage via l'administration.


#Aide
	
<h3>Configuration</h3>
<dl>
<dt>Le nombre de mots par minute</dt>
<dd><p>Selon le profil de vos lecteurs ou les sujets de votre blog. Une valeur entre 150 et 300 refletera une vitesse de lecture, - de jeune écolier ou de vive voix, - d'un tutoriel ou  d'un roman par exemples.</p>
<p> Vous pouvez modifier cette valeur à partir de la page de configuration du plugin accessible depuis l'administration. Sans modification de votre part, le temps de lecture est basé sur 220 mots lus à la minute.</p></dd>
<dt>Le format d'affichage</dt>
<dd>Par defaut, le temps de lecture, definie par <code>#_estimateReadingTime</code> est inclus dans un <code>&lt;span class="tempsLecture"></code> . <br>
Ceci est modifiable sans oublier ni ne modifier le code d'affichage de base :<code>#_estimateReadingTime</code>.</dd>
<dd><b>Exemple:</b>utiliser un paragraphe au lieu d'un span et ajouter une icone devant: <code>&lt;p>&lt;i class="fa-solid fa-timer">&lt;/i>#_estimateReadingTime&lt;/p></code></dd>
<dt>Afficher une unité de valeur.</dt>
<dd>2 Champs vous permettent de choisir ce que vous souhaiter afficher derriere les minutes et secondes estimées. Par défaut c'est <b>min</b> et <b>sec</b>, vous pouvez vider ces champs pour ne rien afficher ou ne mettre que <b>:</b> pour le champs des minutes par exemple.</dd>
<dt>Afficher les secondes</dt>
<dd>Vous pouvez omettre l'affichage des secondes</dd>
</dl>
<h3>Affichage Dans le théme</h3>
<p>Pour afficher le temps de lecture estimé d'un article, il vous faut inserer dans le fichier du théme le code suivant:
<code>&lt;?php if (eval($plxMotor->plxPlugins->callHook('showReadingtime'))) return; ?></code> à l'endroit ou vous voulez le faire apparaitre.</p>
<p><b>Exemple:</b> Dans le fichier <code>home.php</code> du théme par défaut, vous pouvez l'inserer juste derrier le titre de l'article.<small><i>(extrait du code du fichier ci-dessous)</i></small>
<pre><code>&lt;header>
	&lt;span class="art-date">
		&lt;time datetime="&lt;?php $plxShow->artDate('#num_year(4)-#num_month-#num_day'); ?>">
			&lt;?php $plxShow->artDate('#num_day #month #num_year(4)'); ?>
		&lt;/time>
	&lt;/span>
	&lt;h2>
		&lt;?php $plxShow->artTitle('link'); ?>
	&lt;/h2>
<b style="color:green">&lt;!--  insertion du code --></b><b style="color:tomato">&lt;?php if (eval($plxMotor->plxPlugins->callHook('showReadingtime'))) return; ?></b>
	&lt;div>
		&lt;small>
			&lt;span class="written-by">
				&lt;?php $plxShow->lang('WRITTEN_BY'); ?> &lt;?php $plxShow->artAuthor() ?>
			&lt;/span>
			&lt;span class="art-nb-com">
				&lt;?php $plxShow->artNbCom(); ?>
			&lt;/span>
		&lt;/small>
	&lt;/div></code></pre></p>

<hr>
