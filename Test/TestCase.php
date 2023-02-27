<?php
namespace Dfe\ZohoBI\Test;
use Dfe\ZohoBI\App;
use Dfe\ZohoBI\API\Facade;
/**
 * 2017-07-07
 * @see \Dfe\ZohoBooks\Test\TestCase
 * @see \Dfe\ZohoInventory\Test\TestCase
 */
abstract class TestCase extends \Dfe\Zoho\Test\TestCase {
	/**
	 * 2017-07-07
	 * @used-by \Dfe\ZohoBooks\Test\Basic::t02_organizations()
	 * @used-by \Dfe\ZohoBooks\Test\Basic::t03_invalid()
	 * @used-by \Dfe\ZohoBooks\Test\Basic::t04_currencies()
	 * @used-by \Dfe\ZohoInventory\Test\Basic::t02_organizations()
	 * @used-by \Dfe\ZohoInventory\Test\Basic::t03_invalid()
	 * @used-by \Dfe\ZohoInventory\Test\Basic::t04_currencies()
	 */
	final protected function f():Facade {return $this->app()->f();}

	/**
	 * 2017-07-07
	 * @used-by self::f()
	 */
	private function app():App {return App::s($this);}
}