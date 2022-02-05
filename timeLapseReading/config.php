<?php if(!defined('PLX_ROOT')) exit;

	# Control du token du formulaire
	plxToken::validateFormToken($_POST);
	
    if(!empty($_POST)) {
        $plxPlugin->setParam('nbWords', $_POST['nbWords'], 'numeric'); 
        $plxPlugin->setParam('frontText', $_POST['frontText'], 'string'); 
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
	$var['frontText'	] = $plxPlugin->getParam('frontText'	)=='' ? $plxPlugin->getLang('L_AVERAGE_READING_TIME') 				: $plxPlugin->getParam('frontText'		);
	$var['formatInfos'	] = $plxPlugin->getParam('formatInfos'	)=='' ? '<span class="tempsLecture">#_estimateReadingTime</span>'	: $plxPlugin->getParam('formatInfos'	);
?>

<style>form {
	width: max-content;
	margin:1em;
}
form fieldset {
	display:grid;
	grid-template-columns:repeat(2,auto);
	gap: 1em;
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
code{
	color:blue;
	padding:0.2rem 0.1rem;
	background:cornsilk;
}
input[type="submit"], button{
	margin-inline-end: auto;
	background:tomato;
}
button:not(:hover) {
	background:initial;
	color:initial
}</style>
<form action="parametres_plugin.php?p=<?php echo $plugin ?>" method="post">
<fieldset>
<legend>Configuration</legend>
    <label><?php echo $plxPlugin->getLang('L_NB_WORDS_PER_MIN') ?>	:</label> <input type="text" name="nbWords" size="4" value="<?php  echo $var['nbWords'		] ?>" />
    <label><?php echo $plxPlugin->getLang('L_DISPLAY_TEXT') 	?>	:</label> <input type="text" name="frontText" size="50" value="<?php  echo $var['frontText'	] ?>" />
    <label><?php echo $plxPlugin->getLang('L_FORMAT_INFOS') ?>		:</label> <textarea name="formatInfos" cols="55" rows="1"><?php  echo $var['formatInfos'	] ?></textarea>
    <label><?php echo $plxPlugin->getLang('L_TPL_NB_MIN') ?>		:</label> <input type="text" name="nbMin" size="10" value="<?php  echo $var['nbMin'			] ?>" />
    <label><?php echo $plxPlugin->getLang('L_TPL_NB_SEC') ?>		:</label> <input type="text" name="nbSec" size="10" value="<?php  echo $var['nbSec'			] ?>" />
    <label><?php echo $plxPlugin->getLang('L_TPL__SHOW_NB_SEC') ?>	:</label> <?php plxUtils::printSelect('nbShowSec',array('1'=>L_YES,'0'=>L_NO),$var['nbShowSec']); ?>
	<?php echo plxToken::getTokenPostMethod() ?>
	<label><?php echo $plxPlugin->getLang('L_SAVE_TO_UPDATE') ?>	:</label><input type="submit" name="submit" value="<?php $plxPlugin->lang('L_SAVE') ?>" />
	<label><?php echo $plxPlugin->getLang('L_PLUGIN_DEFAULT_SETTING') ?>	:</label><button id="reset"><?php echo $plxPlugin->getLang('L_RESET_TO_DEFAULT') ?></button>
	</fieldset>
</form>


<script>
(function () {
 let defautSettings = {nbWords: 220 , nbMin: ' min ' , nbSec: ' sec ', nbShowSec: 1 , frontText : ' <?php $plxPlugin->lang("L_AVERAGE_READING_TIME") ?> ', formatInfos: '<span class="tempsLecture">#_estimateReadingTime</span>'};
 let resetFields= document.querySelectorAll('input[type="text"], textarea, select');
function reset() {
	for (i=0; i < resetFields.length;i++) {
		resetFields[i].value= defautSettings[resetFields[i].getAttribute('name')]
	}
}
document.querySelector("#reset").addEventListener ("click", reset, false);	
})();
</script>