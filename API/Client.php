<?php
namespace Df\ZohoBI\API;
use Df\Core\Exception as DFE;
/**
 * 2017-07-06
 * A common functionality for Zoho Books and Zoho Inventory.
 * Zoho Books and Zoho Inventory are closer to each other than to Zoho CRM.
 * @see \Dfe\ZohoBooks\API\Client 
 * @see \Dfe\ZohoInventory\API\Client
 */
abstract class Client extends \Df\Zoho\API\Client {
	/**
	 * 2017-07-06
	 * @used-by \Df\ZohoBI\API\Client::uriBase()
	 * @see \Dfe\ZohoBooks\API\Client::version()
	 * @see \Dfe\ZohoInventory\API\Client::version()
	 * @return int
	 */
	abstract protected function version();

	/**
	 * 2017-07-05
	 * @override
	 * @see \Df\API\Client::headers()
	 * @used-by \Df\API\Client::p()
	 * @return array(string => string)
	 */
	final protected function headers() {return ['Authorization' => "Zoho-authtoken {$this->ss()->token()}"];}

	/**
	 * 2017-07-05
	 * @override
	 * @see \Df\API\Client::uriBase()
	 * @used-by \Df\API\Client::p()
	 * @return string
	 */
	final protected function uriBase() {return sprintf(
		"https://%s.zoho.com/api/v{$this->version()}", df_zoho_app($this)->titleLc()
	);}

	/**
	 * 2017-07-06
	 * @see \Df\API\Client::responseValidatorC()
	 * @used-by \Df\API\Client::p()
	 * @return string
	 */
	final protected function responseValidatorC() {return \Df\ZohoBI\API\Validator::class;}
}