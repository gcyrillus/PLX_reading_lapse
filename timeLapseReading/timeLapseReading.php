<?php
  class timeLapseReading extends plxPlugin {	 
	
    public function __construct($default_lang) {
	
		# appel du constructeur de la classe plxPlugin (obligatoire)
		parent::__construct($default_lang);
    }
		
		#desc hook function
		public function showReadingtime() {
            global $plxMotor;
            $words=str_word_count(strip_tags($plxMotor->plxRecord_arts->f('chapo') . $plxMotor->plxRecord_arts->f('content')));
            echo'<p class="tempsLecture">';
            echo $plxMotor->plxPlugins->aPlugins["timeLapseReading"]->lang('L_AVERAGE_READING_TIME')     ;     
            $seconds =  $words / (220/60) ;
            if (gmdate("i", $seconds) <=0) { echo $plxMotor->plxPlugins->aPlugins["timeLapseReading"]->lang('L_LESS_TAN_A_MINUTE')  ;}
            else {
			echo  ' '.gmdate("i", $seconds).' Min:'.gmdate("s",$seconds).' Sec' ;
            }
            echo '</p>'     ; 
		}
}
?>	