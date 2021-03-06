<?php
namespace Df\ZohoBI;
use Df\ZohoBI\API\Facade as F;
/**
 * 2017-07-06
 * @see \Dfe\ZohoBooks\App
 * @see \Dfe\ZohoInventory\App
 * @method Settings ss()
 */
abstract class App extends \Df\Zoho\App {
	/**
	 * 2017-7-07
	 * @return F
	 */
	final function f() {return F::s($this);}
}