<?php
interface IConnectInfo{
	const HOST = "localhost";
	const UNAME = "root";
	const DBNAME = "thinkphp";
	const PW = "root";
	function testConnection();
}