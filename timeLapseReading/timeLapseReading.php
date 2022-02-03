<?php
  class timeLapseReading extends plxPlugin {	 
	
    public function __construct($default_lang) {
	
		# appel du constructeur de la classe plxPlugin (obligatoire)
		parent::__construct($default_lang);
        
        # droits pour accèder à la page config.php du plugin
		$this->setConfigProfil(PROFIL_ADMIN);
    }
		
		#desc hook function
		public function showReadingtime() {
        
            $var['nbWords'] = $this->getParam('nbWords')=='' ? '220' 	: $this->getParam('nbWords');
            global $plxMotor;
            $words=str_word_count(strip_tags($plxMotor->plxRecord_arts->f('chapo') . $plxMotor->plxRecord_arts->f('content')));
            echo'<p class="tempsLecture">';
            echo $plxMotor->plxPlugins->aPlugins["timeLapseReading"]->lang('L_AVERAGE_READING_TIME')     ;     
            $seconds =  $words / ($var['nbWords']/60) ;
            if (gmdate("i", $seconds) <=0) { $plxMotor->plxPlugins->aPlugins["timeLapseReading"]->lang('L_LESS_TAN_A_MINUTE')  ;}
            else {
			echo  ' '.ltrim(gmdate("i", $seconds),'0').' Min:'.gmdate("s",$seconds).' Sec' ;
            }
            echo '</p>'     ; 
		}
}
?>	