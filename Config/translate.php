<?php
use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;

function __($fileKey, $parameters = []) {


	$loader = new FileLoader(new Filesystem(), BASE.'/lang');

	$translator = new Translator($loader, "fa");
	return $translator->get($fileKey, $parameters);
}