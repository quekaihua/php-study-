<?php
include_once('Product.php');
include_once('FormatHelper.php');
class TextProduct implements Product{
	private $mfgProduct;

	public function getProperties(){
		$this->mfgProduct = 'This is text.';
		return $this->mfgProduct;
	}
}