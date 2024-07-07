<?php
	//Core App Class
	

	class Core{

		protected $currentController = 'Pages';
		protected $currentMethod = 'index';
		protected $params = [];

		public function __construct(){
			$url = $this->getUrl();
		
			//look in controller folder to find the controller file
			if(isset($url[0])){
				if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
					$this->currentController = ucwords($url[0]);
					unset($url[0]);
				}
			}
			

			//Require the controller & instantiate the Controller
			require_once('../app/controllers/'.$this->currentController.'.php');
			$this->currentController = new $this->currentController;

			//geting method & checking is that exist in  the controller object
			if(isset($url[1])){
				if(method_exists($this->currentController,$url[1])){
					$this->currentMethod = $url[1];
					unset($url[1]);
				}
			}

			//getting params
			$this->params = $url ? array_values($url) : [];

			call_user_func_array([$this->currentController,$this->currentMethod],$this->params);
		}




		//geting [0]->Controller,[1]->method,[2]->param from Url
		public function getUrl(){
			if(isset($_GET['url'])){

				$url = rtrim($_GET['url'],'/');

				$url = filter_var($url,FILTER_SANITIZE_URL);

				//breaking into an array
				$url = explode('/', $url);

				

				return $url;
			}
		}
	}