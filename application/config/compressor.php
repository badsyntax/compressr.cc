<?php defined('SYSPATH') or die('No direct access allowed.');
/*
 * Compressor configuration
 */
return array(
	'compressors' => array(
		'closure' => 'Closure compiler',
		'yui' => 'YUI compressor',
		'uglify' => 'Uglify',
		//'packer' => 'PACKER',
		//'all' => 'All'
	),
	'options_closure_compilation_levels' => array(
		'WHITESPACE_ONLY' => 'WHITESPACE_ONLY',
		'SIMPLE_OPTIMIZATIONS' => 'SIMPLE_OPTIMIZATIONS',
		'ADVANCED_OPTIMIZATIONS' => 'ADVANCED_OPTIMIZATIONS',
	),
	'options_closure_warning_levels' => array(
		'QUIET' => 'QUIET',
		'DEFAULT' => 'DEFAULT',
		'VERBOSE' => 'VERBOSE'
	)
);
