<?php
namespace Dfe\ZohoBI;
use Dfe\ZohoBI\API\Facade as F;
/**
 * 2017-07-06
 * @see \Dfe\ZohoBooks\App
 * @see \Dfe\ZohoInventory\App
 * @method Settings ss()
 */
abstract class App extends \Dfe\Zoho\App {
	/**
	 * 2017-07-07
	 * @used-by \Dfe\ZohoBI\Source\Organization::fetch()
	 */
	final function f():F {return F::s($this);}
}