<?php
	include "models/ModelRequest.php";
    class ControllerRequest extends Controller 
    {
		use ModelRequest;
        public function index()
        {
            $this->loadView("ViewContact.php");
        }
		public function create(){
			//goi ham modelCreate de create ban ghi
			$a = $this->modelCreate();
			//quay tro lai trang products
			header("location:lien-he.html");
		}
    }
    
?>