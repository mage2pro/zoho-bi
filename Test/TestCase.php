<?php
namespace Df\ZohoBI\Test;
use Df\ZohoBI\App;
use Df\ZohoBI\API\Facade;
/**
 * 2017-07-07
 * @see \Dfe\ZohoBooks\Test\TestCase
 * @see \Dfe\ZohoInventory\Test\TestCase
 */
abstract class TestCase extends \Df\Zoho\Test\TestCase {
	/**
	 * 2017-07-07
	 */
	final protected function app():App {return App::s($this);}

	/**
	 * 2017-07-07
	 */
	final protected function f():Facade {return $this->app()->f();}
}