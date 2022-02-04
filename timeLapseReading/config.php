<?php if(!defined('PLX_ROOT')) exit;

	# Control du token du formulaire
	plxToken::validateFormToken($_POST);
	
    if(!empty($_POST)) {
        $plxPlugin->setParam('nbWords', $_POST['nbWords'], 'numeric'); 
		$plxPlugin->setParam('nbMin', $_POST['nbMin'], 'string'); 
		$plxPlugin->setParam('nbSec', $_POST['nbSec'], 'string'); 
		$plxPlugin->setParam('nbShowSec', $_POST['nbShowSec'], 'numeric'); 
		$plxPlugin->setParam('formatInfos', $_POST['formatInfos'], 'cdata'); 
        $plxPlugin->saveParams();
		header('Location: parametres_plugin.php?p='.$plugin);
	exit;
    }
	$var['nbWords'		] = $plxPlugin->getParam('nbWords'		)=='' ? '220' 														: $plxPlugin->getParam('nbWords'		);
	$var['nbMin'		] = $plxPlugin->getParam('nbMin'		)=='' ? ' min ' 													: $plxPlugin->getParam('nbMin'			);
	$var['nbSec'		] = $plxPlugin->getParam('nbSec'		)=='' ? ' sec ' 													: $plxPlugin->getParam('nbSec'			);
	$var['nbShowSec'	] = $plxPlugin->getParam('nbShowSec'	)=='' ? 1	 														: $plxPlugin->getParam('nbShowSec'		);
	$var['formatInfos'	] = $plxPlugin->getParam('formatInfos'	)=='' ? '<span class="tempsLecture">#_estimateReadingTime</span>'	: $plxPlugin->getParam('formatInfos'	);
?>
<style>form {
	width: max-content;
	margin:1em;
}
form fieldset {
	display:grid;
	grid-template-columns:repeat(2,auto);
	gap:0.25rem;
	align-items:center;
}
label{
	margin-inline-start: auto;
}
input,
select{
	margin-inline-end: auto;
}
legend{
	background:ivory;
	font-size:1.4em;
}
input[type="submit"]{
	margin-inline-end: auto;
	background:tomato;
}</style>
<form action="parametres_plugin.php?p=<?php echo $plugin ?>" method="post">
<fieldset>
<legend>Configuration</legend>
    <label><?php echo $plxPlugin->getLang('L_NB_WORDS_PER_MIN') ?>	:</label> <input type="text" name="nbWords" size="4" value="<?php  echo $var['nbWords'		] ?>" />
    <label><?php echo $plxPlugin->getLang('L_FORMAT_INFOS') ?>		:</label> <textarea name="formatInfos" cols="55" rows="1"><?php  echo $var['formatInfos'	] ?></textarea>
    <label><?php echo $plxPlugin->getLang('L_TPL_NB_MIN') ?>		:</label> <input type="text" name="nbMin" size="10" value="<?php  echo $var['nbMin'			] ?>" />
    <label><?php echo $plxPlugin->getLang('L_TPL_NB_SEC') ?>		:</label> <input type="text" name="nbSec" size="10" value="<?php  echo $var['nbSec'			] ?>" />
    <label><?php echo $plxPlugin->getLang('L_TPL__SHOW_NB_SEC') ?>	:</label> <?php plxUtils::printSelect('nbShowSec',array('1'=>L_YES,'0'=>L_NO),$var['nbShowSec']); ?>
	<?php echo plxToken::getTokenPostMethod() ?>
	<label><?php echo $plxPlugin->getLang('L_SAVE_TO_UPDATE') ?>	:</label><input type="submit" name="submit" value="<?php $plxPlugin->lang('L_SAVE') ?>" />
	</fieldset>
</form>

