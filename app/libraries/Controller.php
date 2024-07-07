<?php
	//load the model and the view

	class Controller{

		
		
		public function model($model){
		//Require model
			require_once('../app/models/'.$model.'.php');
		//Instantiate model
			return new $model();

		}

		//Load the view
		public function view($view,$data=[]){
		//look for view exist
			if(file_exists('../app/views/'.$view.'.php')){
				require_once('../app/views/'.$view.'.php');
			}
			else{
				die("View does not exist");
			}
		

		}




	}