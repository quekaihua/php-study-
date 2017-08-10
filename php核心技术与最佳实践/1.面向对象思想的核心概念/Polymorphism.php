<?php
class employee{
	protected function working(){
		echo "not working";
	}
}
class teacher extends employee{
	public function working(){
		echo "teaching";	
	}
}

class coder extends employee{
	public function working(){
		echo "coding";
	}
}

function doprint($obj){
	if(get_class($obj) == 'employee'){
		echo "Error";
	}else{
		$obj->working();
	}
}

doprint(new teacher());
doprint(new coder());
doprint(new employee());
