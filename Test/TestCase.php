<?php
namespace Df\ZohoBI\Test;
use Df\ZohoBI\App;
use Df\ZohoBI\API\Facade;
/**
 * 2017-07-07
 * @see \Dfe\ZohoBooks\T\TestCase
 * @see \Dfe\ZohoInventory\T\TestCase
 */
abstract class TestCase extends \Df\Zoho\Test\TestCase {
	/**
	 * 2017-07-07
	 * @return App
	 */
	final protected function app() {return App::s($this);}

	/**
	 * 2017-07-07
	 * @return Facade
	 */
	final protected function f() {return $this->app()->f();}
}