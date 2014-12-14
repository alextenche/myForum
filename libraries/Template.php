<?php
class Template{

	protected $template;  //path to template
	protected $vars = array();  //variables passed in
	
	
	
	public function __construct($template){
		$this->template = $template;
	}
	
	public function __get($key){  //get template variables
		return $this->vars[$key];
	}
	
	public function __set($key, $value){  //set template variables
		$this->vars[$key] = $value;
	}
	
	
	public function __toString(){  //convert object to string
		extract($this->vars);
		chdir(dirname($this->template));
		ob_start();
		
		include basename($this->template);
		
		return ob_get_clean();
	}
	
	
	
}

?>