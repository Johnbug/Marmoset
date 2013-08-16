<?php
	/**
	* some public method
	*/
	class PublicAction extends Action{
		
		function __construct(){
			# code...
		}

		public function verify(){
			import('ORG.Util.Image');
    		Image::buildImageVerify();
		}

	}
?>