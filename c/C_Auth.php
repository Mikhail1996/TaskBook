<?php

class C_Auth extends C_Base
{
    
	// Конструктор.
	public function __construct(){
		parent::__construct();
	}
	
	public function before(){
		//$this->needLogin = true; // при необходимости авторизации
		parent::before();
	}
	
	public function action_login(){
		$this->title .= '::Авторизация';
		$this->content = $this->Template('v/v_auth.php', array('temp' => 'temp'));	
	}

}
