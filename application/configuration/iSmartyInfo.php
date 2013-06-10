<?php

/**
 * Interface ISmartyInfo
 *
 * Contains default settings for Smarty Template Engine
 */

interface iSmartyInfo
{
	const LAYOUT_DIR = "../application/layout";
	const TEMPLATE_DIR= "../application/views";
	const COMPILE_DIR="../compile";
	const CACHE_DIR="../cache";
	//const CONFIG_DIR="../config";
	public function render($view,$param);
}


?>