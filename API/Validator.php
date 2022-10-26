<?php
namespace Df\ZohoBI\API;
/**
 * 2017-07-06
 * An error response looks like:
 *	{
 * 		"code": 5,
 * 		"message": "Invalid URL Passed"
 *	}
 * A successful response looks like:
 *	{
 *		"code": 0,
 *		"message": "success",
 *		"<data key>": <data>
 *	}
 * https://www.zoho.eu/books/api/v3/#response
 * https://www.zoho.eu/inventory/api/v1/#response
 * @used-by \Df\ZohoBI\API\Client::responseValidatorC()
 */
final class Validator extends \Df\API\Response\Validator {
	/**
	 * 2017-07-06
	 * @override
	 * @see \Df\API\Exception::short()
	 * @used-by \Df\API\Client::_p()
	 */
	function short():string {return $this->r()['message'];}

	/**
	 * 2017-07-06
	 * @override
	 * @see \Df\API\Response\Validator::valid()
	 * @used-by \Df\API\Client::_p()
	 */
	function valid():bool {return 0 === $this->r()['code'];}
}