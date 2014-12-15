<?php
// template class - creates a template/view object
class Template{

	protected $template;  //path to template
	protected $vars = array();  //variables passed in
	
	
	public function __construct($template){
		$this->template = $template;
	}
	
	
	 //get template variables
	public function __get($key){
		return $this->vars[$key];
	}
	
	
	//set template variables
	public function __set($key, $value){
		$this->vars[$key] = $value;
	}
	
	
	//convert object to string
	public function __toString(){
		extract($this->vars);
		chdir(dirname($this->template));
		ob_start();
		
		include basename($this->template);
		
		return ob_get_clean();
	}
	
	
}