<h2>Aide du plugin</h2>
	
<h3>Configuration</h3>
<p>La configuration se réduit au nombre de mots par minute que vous estimé qu'il sera necessaire pour lire l'article en entier.</p>
<p> Selon le profil de vos lecteurs ou les sujets de votre blog. Une valeur entre 150 et 300 refletera une vitesse de lecture, - de jeune écolier ou de vive voix, - d'un tutoriel ou  d'un roman par exemples.</p>
<p> Vous pouvez modifier cette valeur à partir de la page de configuration du plugin accessible depuis l'administration. Sans modification de votre part, le temps de lecture est basé sur 220 mots lus à la minute.</p>
<h3>Affichage Dans le théme</h3>
<p>Pour afficher le temps de lecture estimé d'un article, il vous faut inserer dans le fichier du théme le code suivant:
<code>&lt;?php if (eval($plxMotor->plxPlugins->callHook('showReadingtime'))) return; ?></code> à l'endroit ou vous voulez le faire apparaitre.</p>
<p>Ex: Dans le fichier <code>home.php</code> du théme par défaut, vous pouvez l'inserer juste derrier le titre de l'article.<small><i>(extrait du code du fichier ci-dessous)</i></small>
<pre><code>&lt;header>
	&lt;span class="art-date">
		&lt;time datetime="&lt;?php $plxShow->artDate('#num_year(4)-#num_month-#num_day'); ?>">
			&lt;?php $plxShow->artDate('#num_day #month #num_year(4)'); ?>
		&lt;/time>
	&lt;/span>
	&lt;h2>
		&lt;?php $plxShow->artTitle('link'); ?>
	&lt;/h2>
<b style="color:green">&lt;!--  insertion du code --></b><b style="color:tomato">&lt;?php if (eval($plxMotor->plxPlugins->callHook('showReadingtime'))) return; ?></b><b style="color:green">&lt;!--  insertion du code --></b>
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
<style>h2 {
  text-align: center;
  color: hotpink;
}
h3 {
  color: #6AA6CE;
  border-bottom: solid;
  width: max-content;
  padding-inline-end: 1.5em;
  border-inline-end: solid transparent 6px;
}
p {
  padding: 0 1em;
}
code, pre {
  background: ivory;
}</style>