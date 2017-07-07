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
	final function organizations() {return $this->p(__FUNCTION__);}

	/**
	 * 2017-07-06
	 * @param string $path
	 * @param array(string => mixed) $p [optional]
	 * @param string|null $method [optional]
	 * @return array(string => mixed)
	 * @throws DFE
	 */
	final function p($path, array $p = [], $method = null) {return C::i($this, $path, $p, $method)->p()[$path];}

	/**
	 * 2017-07-07
	 * @used-by \Df\ZohoBI\App::f()
	 * @param string|object $c
	 * @return self
	 */
	final static function s($c) {return dfcf(function($c) {return df_new(df_con_heir($c, __CLASS__));}, [$c]);}
}