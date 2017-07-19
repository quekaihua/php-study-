<?php

include_once('./File.class.php');
try{
	// $file = new File();
	$filename = "./test.php";

	// $res = $file->has($filename);
	// var_dump($res);

	// $data = serialize('test file data.');
	// $file->put($filename, $data);

	// $res = $file->has($filename);
	// var_dump($res);

	// $data = serialize('some value.');
	// $file->append($filename, $data);

	// $file->unlink($filename);
	// var_dump($file->get($filename));
	Storage::connect();
	$res = Storage::has($filename);
	var_dump($filename);
	var_dump($res);

}catch(Exception $e){
	echo $e->getMessage();
}
