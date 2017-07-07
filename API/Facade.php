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
	 * 2017-07-07
	 * «In Zoho Books / Zoho Inventory, your business is termed as an organization.
	 * If you have multiple businesses, you simply set each of those up as an individual organization.
	 * Each organization is an independent Zoho Books / Zoho Inventory Organization
	 * with it’s own organization ID, base currency, time zone, language, contacts, reports, etc.
	 * The parameter `organization_id` along with the organization ID
	 * should be sent in with every API request to identify the organization.
	 * The `organization_id` can be obtained from the `GET /organizations` API’s JSON response.»
	 * https://www.zoho.eu/books/api/v3/#organization-id
	 * https://www.zoho.eu/inventory/api/v1/#organization-id
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