<?php
  class timeLapseReading extends plxPlugin {	 
	
    public function __construct($default_lang) {
	
		# appel du constructeur de la classe plxPlugin (obligatoire)
		parent::__construct($default_lang);

		# déclaration des hooks
		$this->addHook('IndexBegin', 'IndexBegin');
		$this->addHook('showReadingtime', 'showReadingtime');

        # droits pour accèder à la page config.php du plugin
		$this->setConfigProfil(PROFIL_ADMIN);
    }


        # désactive de force la compression gzip 
        public function  IndexBegin() {
            echo '<?php ';
			?>
			$plxMotor->aConf['gzip'] ='0';
            ?>
			<?php           
        }		


		public function showReadingtime() {
			#valeur par défaut si plugin non configuré
				$var['nbWords'] = $this->getParam('nbWords')=='' ? '220' 	: $this->getParam('nbWords');
				$var['nbMin'] = $this->getParam('nbMin')=='' ? ' min ' 	: $this->getParam('nbMin');
				$var['nbSec'] = $this->getParam('nbSec')=='' ? ' sec ' 	: $this->getParam('nbSec');
				$var['nbShowSec'] = $this->getParam('nbSec')=='' ? 1 	: $this->getParam('nbShowSec');
				$var['frontText'] = $this->getParam('frontText') =='' ? $plxMotor->plxPlugins->aPlugins["timeLapseReading"]->getLang('L_AVERAGE_READING_TIME') : $this->getParam('frontText');
				$var['formatInfos'] = $this->getParam('formatInfos')=='' ? '<span class="tempsLecture">#_estimateReadingTime</span>': $this->getParam('formatInfos');
				$format = $var['formatInfos'];

			#récuperation contenu article et comptage
				global $plxMotor;

				#comptage des mots
					$words=str_word_count(strip_tags($plxMotor->plxRecord_arts->f('chapo') . $plxMotor->plxRecord_arts->f('content')));

			#calcul moyenne/sec    
				$perSeconds =  ceil($words / ($var['nbWords']/60)) ;


			#extraction durée
				$minReading =gmdate("i", $perSeconds);
				$secReading =gmdate("s", $perSeconds);	

			#template secondes =  $tplSec
				 if (gmdate("s", $perSeconds) > 0 && $var['nbShowSec'] == 1 ) {$tplSec = gmdate("s",$perSeconds).$var['nbSec']  ;}
				 else {$tplSec = ""; }

			#template minutes =  $tplMin
				 if (gmdate("i", $perSeconds) <=0) {$tplMin = $var['frontText'].' '. $plxMotor->plxPlugins->aPlugins["timeLapseReading"]->getLang('L_LESS_TAN_A_MINUTE')  ;
				 $tplSec = "";}
				 else {$tplMin = $var['frontText'].' '.ltrim(gmdate("i", $perSeconds),'0') . $var['nbMin']; }


			#generation template affichage 
				$readingTinfos =  $tplMin . $tplSec ;
				if($format =='') {$format='<span class="tempsLecture"> #_estimateReadingTime </span>';}
				$infosToPrint= preg_replace('#\#_estimateReadingTime#is', $readingTinfos, $format);

			#affichage temps lecture estimé
				echo $infosToPrint; 
		}
}
?>
