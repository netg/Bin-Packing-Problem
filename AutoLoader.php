<?php

/**
 * A basic PSR style autoloader
 */
class AutoLoader
{
	protected $dir;
	protected $ext;

	public function __construct($dir, $ext = '.php')
	{
		$this->dir = rtrim($dir, DIRECTORY_SEPARATOR);
		$this->ext = $ext;
	}

	public static function register($dir, $ext = '.php')
	{
		$autoloader = new static($dir, $ext);
		spl_autoload_register([$autoloader, 'load']);

		return $autoloader;
	}

	public function load($class)
	{
		$dir = $this->dir;

		if ($ns = $this->get_namespace($class)) {
			$dir .= DIRECTORY_SEPARATOR.str_replace('\\', DIRECTORY_SEPARATOR, $ns);
		}

		$inc_file = $dir.DIRECTORY_SEPARATOR.$this->get_class($class).$this->ext;

		if (file_exists($inc_file)) {
			require_once $inc_file;
		}
	}

	// Borrowed from github.com/borisguery/Inflexible
	protected static function get_class($value)
	{
		$className = trim($value, '\\');

		if ($lastSeparator = strrpos($className, '\\')) {
			$className = substr($className, 1 + $lastSeparator);
		}

		return $className;
	}

	// Borrowed from github.com/borisguery/Inflexible
	public static function get_namespace($fqcn)
	{
		if ($lastSeparator = strrpos($fqcn, '\\')) {
			return trim(substr($fqcn, 0, $lastSeparator + 1), '\\');
		}

		return '';
	}
}
