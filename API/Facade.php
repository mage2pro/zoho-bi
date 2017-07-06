<?php
namespace Df\ZohoBI\API;
use Df\Core\Exception as DFE;
use Df\ZohoBI\API\Client as C;
/**
 * 2017-07-06
 * @see \Dfe\ZohoBooks\API\Facade
 * @see \Dfe\ZohoInventory\API\Facade
 */
abstract class Facade {
	/**
	 * 2017-07-06
	 * @return array(array(string => mixed))
	 */
	final static function organizations() {return self::p(__FUNCTION__);}

	/**
	 * 2017-07-06
	 * @param string $path
	 * @param array(string => mixed) $p [optional]
	 * @param string|null $method [optional]
	 * @return array(string => mixed)
	 * @throws DFE
	 */
	final static function p($path, array $p = [], $method = null) {return C::i(
		static::class, $path, $p, $method
	)->p();}
}