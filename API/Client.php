<?php
namespace Dfe\ZohoBI\API;
use Df\Core\Exception as DFE;
use Dfe\ZohoBI\Settings;
/**
 * 2017-07-06
 * A common functionality for Zoho Books and Zoho Inventory.
 * Zoho Books and Zoho Inventory are closer to each other than to Zoho CRM.
 * @see \Dfe\ZohoBooks\API\Client 
 * @see \Dfe\ZohoInventory\API\Client
 * @method Settings ss()
 */
abstract class Client extends \Dfe\Zoho\API\Client {
	/**
	 * 2017-07-06
	 * @used-by \Dfe\ZohoBI\API\Client::urlBase()
	 * @see \Dfe\ZohoBooks\API\Client::version()
	 * @see \Dfe\ZohoInventory\API\Client::version()
	 */
	abstract protected function version():int;

	/**
	 * 2017-07-08
	 * @override
	 * @see \Df\API\Client::commonParams()
	 * @used-by \Df\API\Client::__construct()
	 * @return array(string => mixed)
	 */
	final protected function commonParams(string $path):array {return self::ORG === $path ? [] : [
		'organization_id' => $this->ss()->organization()
	];}

	/**
	 * 2017-07-05
	 * @override
	 * @see \Df\API\Client::headers()
	 * @used-by \Df\API\Client::__construct()
	 * @used-by \Df\API\Client::_p()
	 * @return array(string => string)
	 */
	final protected function headers():array {return ['Authorization' => "Zoho-authtoken {$this->ss()->token()}"];}

	/**
	 * 2017-07-05
	 * @override
	 * @see \Df\API\Client::urlBase()
	 * @used-by \Df\API\Client::__construct()
	 * @used-by \Df\API\Client::url()
	 */
	final protected function urlBase():string {return sprintf(
		"https://%s.zoho.com/api/v{$this->version()}", df_zoho_app($this)->titleLc()
	);}

	/**
	 * 2017-07-06
	 * @override
	 * @see \Df\API\Client::responseValidatorC()
	 * @used-by \Df\API\Client::_p()
	 */
	final protected function responseValidatorC():string {return Validator::class;}

	/**
	 * 2017-07-08
	 * @used-by self::commonParams()
	 * @used-by \Dfe\ZohoBI\API\Facade::organizations()
	 * @var string
	 */
	const ORG = 'organizations';
}