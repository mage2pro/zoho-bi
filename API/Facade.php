<?php
namespace Df\ZohoBI\API;
use Df\Core\Exception as DFE;
use Df\ZohoBI\API\Client as C;
use Df\ZohoBI\App;
use \Df\ZohoBI\Settings;
/**
 * 2017-07-06
 * @see \Dfe\ZohoBooks\API\Facade
 * @see \Dfe\ZohoInventory\API\Facade
 */
abstract class Facade {
	/**
	 * 2017-07-07
	 * [Zoho Books] How to get the list of enabled currencies by API? https://mage2.pro/t/4144
	 * https://www.zoho.eu/books/api/v3/#Currency_List_Currencies
	 * https://www.zoho.eu/inventory/api/v1/#Currency_List_Currency
	 * @return array(array(string => mixed))
	 */
	final function currencies() {return $this->p(__FUNCTION__, 'settings');}

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
	final function organizations() {return $this->p(Client::ORG);}

	/**
	 * 2017-07-06
	 * @param string $path
	 * @param string $ns [optional]
	 * @param array(string => mixed) $p [optional]
	 * @param string|null $method [optional]
	 * @return array(string => mixed)
	 * @throws DFE
	 */
	final function p($path, $ns = '', array $p = [], $method = null) {return C::i(
		$this, df_cc_path($ns, $path), $p, $method
	)->p()[$path];}

	/**
	 * 2017-07-07
	 * @return App
	 */
	private function app() {return App::s($this);}

	/**
	 * 2017-07-07
	 * @return Settings
	 */
	private function ss() {return $this->app()->ss();}

	/**
	 * 2017-07-07
	 * @used-by \Df\ZohoBI\App::f()
	 * @param string|object $c
	 * @return self
	 */
	final static function s($c) {return dfs_con($c);}
}