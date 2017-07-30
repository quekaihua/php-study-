<?php
include_once('IConnectInfo.php');

class conSQL implements IConnectInfo{
	private $server = IConnectInfo::HOST;
	private $currentDB = IConnectInfo::DBNAME;
	private $user = IConnectInfo::UNAME;
	private $pass = IConnectInfo::PW;

	public function testConnection(){
		$hookup = new mysqli($this->server, $this->user, $this->pass, $this->currentDB);
		if(mysqli_connect_error()){
			die('bad mojo');
		}

		print "You're hooked up Ace!<br/>" . $hookup->host_info;
		$hookup->close();
	}
}
ini_set("display_errors", "On");  //调试时开启，不返回500错误
error_reporting(E_ALL);
$userConstant = new conSQL();
$userConstant->testConnection();