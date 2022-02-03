<?php if(!defined('PLX_ROOT')) exit;

	# Control du token du formulaire
	plxToken::validateFormToken($_POST);
	
    if(!empty($_POST)) {
        $plxPlugin->setParam('nbWords', $_POST['nbWords'], 'numeric'); 
        $plxPlugin->saveParams();
		header('Location: parametres_plugin.php?p='.$plugin);
	exit;
    }
	$var['nbWords'] = $plxPlugin->getParam('nbWords')=='' ? '220' 	: $plxPlugin->getParam('nbWords');
?>
<style>
form {
	width: max-content;margin:auto; ;
}
legend{background:ivory;}
</style>
<form action="parametres_plugin.php?p=<?php echo $plugin ?>" method="post">
<fieldset>
<legend>Configuration Plugin <big><?php echo $plugin ?></big></legend>
    <?php echo $plxPlugin->getLang('L_NB_WORDS_PER_MIN') ?>: <input type="text" name="nbWords" value="<?php  echo $var['nbWords'] ?>" />
	<?php echo plxToken::getTokenPostMethod() ?>
	<input type="submit" name="submit" value="<?php $plxPlugin->lang('L_SAVE') ?>" />
	</fieldset>
</form>

