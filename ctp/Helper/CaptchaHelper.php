<?php
/*
CakePHP captcha Helper for Captcha Component :: Cakecaptcha
Version		:	1.0
Author		:	Ramandeep Singh
Website		:	http://www.designaeon.com
Created 	:	12 july 2012
compatible	:	cakePHP1.3

Description	:
This Helper is used with cakePHP captcha component to generate captchas.

*/
App::uses('AppHelper', 'View/Helper');
class CaptchaHelper extends AppHelper{

	public $helpers = array('Html', 'Form');
	private $captchaerror;	
	private $view;
	public function __construct(View $view, $settings = array())
	{
		parent::__construct($view, $settings);
		$this->view=$view;
		//$this->view->viewVars = ClassRegistry::getObject('view')->viewVars['captchaerror'];
if (isset($view->viewVars['captchaerror'])) $this->captchaerror=$view->viewVars['captchaerror'];
		//debug($view->viewVars['captchaerror']);
	}

	// function __construct($settings = array()){
		// if(isset(ClassRegistry::getObject('view')->viewVars['captchaerror'])){
			// $this->viewVars = ClassRegistry::getObject('view')->viewVars['captchaerror'];
			// $this->captchaerror=$this->viewVars;
			// debug($this->viewVars);
			// }
		// else{
			// $this->captchaerror=false;
			// debug($this);
			// }		
	
	// }

	function input($controller=null){
		if(is_null($controller)) { 
            $controller = $this->view->params['controller']; 			
        } 
		$output=$this->writeCaptcha($controller);
		return $output;
	}
	protected function writeCaptcha($controller) { ?>
            
            <div class="col-xs-5 inline left">
                
                <?php
                echo $this->view->Html->image($this->Html->url(array(
                    'controller'=>$controller,
                    'action'=>'captcha'),true),
                    array(
                        'id'=>'cakecaptcha',
                        'class' => 'inline center col-xs-12 left')
                    );
                    if($this->captchaerror) {
                        echo "<div class='error'><div class='error-message'>".$this->captchaerror."</div>";
                    }
                ?>
                
            </div>
            
            <?php
                //debug($this->viewVars);		
                echo $this->Form->input('cakecaptcha',array(
                    'div' => array('class' => 'fm_input fm_text col-xs-6 center inline last left'),
                    'class' => 'input col-xs-12 center inline',
                    'id'=>'captcha-form',
                    'name'=>'data[cakecaptcha][captcha]',
                    'placeholder'=>'Captcha',
                    'label'=>false
                ));
            if($this->captchaerror) {echo "</div>";} ?>

            <a href="#captcha" onclick="document.getElementById('cakecaptcha').src='<?php echo $this->view->Html->url(array('controller'=>$controller,'action'=>'captcha')); ?>?'+Math.random(); document.getElementById('captcha-form').focus();" id="change-image" class="col-xs-12">Not readable? Change text.</a>

    <?php } 
    
} ?>