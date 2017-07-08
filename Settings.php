<?php
namespace Df\ZohoBI;
/**
 * 2017-07-06
 * @see \Dfe\ZohoCRM\Settings
 * @see \Dfe\ZohoInventory\Settings
 */
abstract class Settings extends \Df\Zoho\Settings {
	/**
	 * 2017-07-07
	 * Note 1:
	 * «In Zoho Books / Zoho Inventory, your business is termed as an organization.
	 * If you have multiple businesses, you simply set each of those up as an individual organization.
	 * Each organization is an independent Zoho Books / Zoho Inventory Organization
	 * with it’s own organization ID, base currency, time zone, language, contacts, reports, etc.
	 * The parameter `organization_id` along with the organization ID
	 * should be sent in with every API request to identify the organization.
	 * The `organization_id` can be obtained from the `GET /organizations` API’s JSON response.»
	 * https://www.zoho.eu/books/api/v3/#organization-id
	 * https://www.zoho.eu/inventory/api/v1/#organization-id
	 * Note 2: The result is a natural number like «2723074» or «649147519».
	 * @used-by \Df\ZohoBI\API\Client::commonParams()
	 * @return int
	 */
	final function organization() {return intval($this->v());}
}